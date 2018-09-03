<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author Francisco
 */
class user_model extends CI_Model {

    private $id;
    private $user_client_id;
    private $user_name;
    private $user_first_name;
    private $user_last_name;
    private $user_password;
    private $user_add_1;
    private $user_add_2;
    private $user_city;
    private $user_state;
    private $user_zip;
    private $user_phone;
    private $user_email;
    private $user_site;
    private $user_type;
    private $user_date_created;
    private $user_created_by;
    private $user_date_modified;
    private $user_modified_by;

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_user_client_id() {
        return $this->user_client_id;
    }

    public function set_user_client_id($user_client_id) {
        $this->user_client_id = $user_client_id;
    }

    public function get_user_name() {
        return $this->user_name;
    }

    public function set_user_name($user_name) {
        $this->user_name = $user_name;
    }

    public function get_user_first_name() {
        return $this->user_first_name;
    }

    public function set_user_first_name($user_first_name) {
        $this->user_first_name = $user_first_name;
    }

    public function get_user_last_name() {
        return $this->user_last_name;
    }

    public function set_user_last_name($user_last_name) {
        $this->user_last_name = $user_last_name;
    }

    public function get_user_password() {
        return $this->user_password;
    }

    public function set_user_password($user_password) {
        $this->user_password = $user_password;
    }

    public function get_user_add_1() {
        return $this->user_add_1;
    }

    public function set_user_add_1($user_add_1) {
        $this->user_add_1 = $user_add_1;
    }

    public function get_user_add_2() {
        return $this->user_add_2;
    }

    public function set_user_add_2($user_add_2) {
        $this->user_add_2 = $user_add_2;
    }

    public function get_user_city() {
        return $this->user_city;
    }

    public function set_user_city($user_city) {
        $this->user_city = $user_city;
    }

    public function get_user_state() {
        return $this->user_state;
    }

    public function set_user_state($user_state) {
        $this->user_state = $user_state;
    }

    public function get_user_zip() {
        return $this->user_zip;
    }

    public function set_user_zip($user_zip) {
        $this->user_zip = $user_zip;
    }

    public function get_user_phone() {
        return $this->user_phone;
    }

    public function set_user_phone($user_phone) {
        $this->user_phone = $user_phone;
    }

    public function get_user_email() {
        return $this->user_email;
    }

    public function set_user_email($user_email) {
        $this->user_email = $user_email;
    }

    public function get_user_site() {
        return $this->user_site;
    }

    public function set_user_site($user_site) {
        $this->user_site = $user_site;
    }

    public function get_user_type() {
        return $this->user_type;
    }

    public function set_user_type($user_type) {
        $this->user_type = $user_type;
    }

    public function get_user_date_created() {
        return $this->user_date_created;
    }

    public function set_user_date_created($user_date_created) {
        $this->user_date_created = $user_date_created;
    }

    public function get_user_created_by() {
        return $this->user_created_by;
    }

    public function set_user_created_by($user_created_by) {
        $this->user_created_by = $user_created_by;
    }

    public function get_user_date_modified() {
        return $this->user_date_modified;
    }

    public function set_user_date_modified($user_date_modified) {
        $this->user_date_modified = $user_date_modified;
    }

    public function get_user_modified_by() {
        return $this->user_modified_by;
    }

    public function set_user_modified_by($user_modified_by) {
        $this->user_modified_by = $user_modified_by;
    }

    /**
     * @return bool
     */
    public function add_user() {

        $this->db->trans_start();

        $query = "
            INSERT INTO users (
                user_client_id,
                user_name,
                user_first_name,
                user_last_name,
                user_password,
                user_add_1,
                user_add_2,
                user_city,
                user_state,
                user_zip,
                user_phone,
                user_site_id,
                is_active,
                user_date_created,
                user_created_by
            )
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
            ON DUPLICATE KEY UPDATE 
                user_date_modified = now(),
                user_modified_by = ?, 
                user_first_name = ?,
                user_last_name = ?, 
                user_add_1 = ?, 
                user_add_2 = ?, 
                user_city = ?, 
                user_state = ?, 
                user_zip = ?, 
                user_phone = ?, 
                user_site_id = ?
            ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $_POST['user_name'],
            $_POST['first_name'],
            $_POST['last_name'],
            md5('password'),
            $_POST['add1'],
            $_POST['add2'],
            $_POST['city'],
            $_POST['state'],
            $_POST['zip'],
            $_POST['phone'],
            $_POST['site'],
            true, //is active
            date("Y-m-d H:i:s"),
            $this->session->userdata('user_name'),
            $this->session->userdata('user_name'),
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['add1'],
            $_POST['add2'],
            $_POST['city'],
            $_POST['state'],
            $_POST['zip'],
            $_POST['phone'],
            $_POST['site']
            )
        );
        
        $query = "
            DELETE FROM permissions WHERE user_id = ? AND user_client_id = ? AND permission != 'ironMan'
        ";

        $this->db->query(
            $query, array(
            $_POST['user_name'],
            $this->session->userdata('user_client_id')
            )
        );
        
        if (isset($_POST['permission'])) {
            foreach ($_POST['permission'] as $permission) {
                $query = "
                    INSERT INTO permissions (user_id, user_client_id, permission)
                    VALUES (?, ?, ?)
                ";

                $this->db->query(
                    $query, array(
                    $_POST['user_name'],
                    $this->session->userdata('user_client_id'),
                    $permission
                    )
                );
            }
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    /**
     * @param $user
     * @return bool
     */
    public function user_exists($user) {

        $query = "SELECT user_name FROM users WHERE user_name = ?";
        $result = $this->db->query($query, array($user));
        $count = $result->num_rows();

        return $count;
    }

    public function get_user_information() {

        $query = "
            SELECT users.user_name, users.user_first_name, users.user_last_name, sites.site_name as user_site, 
            users.user_phone, users.user_add_1, users.user_add_2, users.user_city, users.user_state, users.user_zip,
            users.is_active, sites.id as site_id
            FROM users 
            LEFT JOIN sites ON users.user_site_id = sites.id 
            WHERE users.user_name = ?  AND users.user_client_id = ?
	";

        $result = $this->db->query(
            $query, array(
            $_POST['user'],
            $this->session->userdata('user_client_id'))
        );

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $user_data['user_name'] = $row->user_name;
                $user_data['user_first_name'] = $row->user_first_name;
                $user_data['user_last_name'] = $row->user_last_name;
                $user_data['user_site'] = $row->user_site;
                $user_data['site_id'] = $row->site_id;
                $user_data['user_phone'] = $row->user_phone;
                $user_data['user_add_1'] = $row->user_add_1;
                $user_data['user_add_2'] = $row->user_add_2;
                $user_data['user_city'] = $row->user_city;
                $user_data['user_state'] = $row->user_state;
                $user_data['user_zip'] = $row->user_zip;
                $user_data['is_active'] = $row->is_active;
            }
        }

        $query = "
			SELECT permission FROM permissions WHERE user_id = ? AND user_client_id = ?
		";

        $result = $this->db->query(
            $query, array(
            $_POST['user'],
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $user_data['permission'][] = $row->permission;
            }
        }

        return $user_data;
    }

    public function delete_user($user_id) {

        $query = "
			UPDATE users SET is_active = ? WHERE user_name = ?
		";

        $result = $this->db->query(
            $query, array(
            0,
            $user_id
            )
        );

        if (!$result) {
            // if query fails
            $message = "Query failed in user_model/delete_user()";
            throw new Exception($message);
        } else {
            return true;
        }
    }

    public function password_change() {

        $query = "UPDATE users "
            . "SET user_password = ?, "
            . "user_date_modified = curdate(), "
            . "user_modified_by = ? "
            . "WHERE user_name = ? "
            . "AND user_client_id = ?";

        $result = $this->db->query(
            $query, array(
            md5($_POST['newpass1']),
            $this->session->userdata('user_name'),
            $this->session->userdata('user_name'),
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query fails
            $message = "Query failed in user_model/password_change()";
            throw new Exception($message);
        } else {
            return true;
        }
    }

}

?>
