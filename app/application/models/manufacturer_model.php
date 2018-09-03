<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manufacturer_model
 *
 * @author Francisco
 */
class manufacturer_model extends CI_Model {

    /**
     *
     * @var int
     */
    private $manufacturer_id;

    /**
     *
     * @var string
     */
    private $manufacturer_name;

    /**
     *
     * @var string
     */
    private $manufacturer_phone;

    /**
     *
     * @var string
     */
    private $manufacturer_email;

    /**
     *
     * @var string
     */
    private $manufacturer_fax;

    /**
     *
     * @var string
     */
    private $manufacturer_add_1;

    /**
     *
     * @var string
     */
    private $manufacturer_add_2;

    /**
     *
     * @var string
     */
    private $manufacturer_city;

    /**
     *
     * @var string
     */
    private $manufacturer_state;

    /**
     *
     * @var string
     */
    private $manufacturer_zip;

    /**
     *
     * @var string
     */
    private $manufacturer_rep;

    /**
     *
     * @var string
     */
    private $manufacturer_rep_email;

    /**
     *
     * @var string
     */
    private $manufacturer_rep_fax;

    /**
     *
     * @var string
     */
    private $manufacturer_rep_phone;

    /**
     * 
     * @return int
     */
    public function getManufacturer_id() {
        return $this->manufacturer_id;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_name() {
        return $this->manufacturer_name;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_phone() {
        return $this->manufacturer_phone;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_email() {
        return $this->manufacturer_email;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_fax() {
        return $this->manufacturer_fax;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_add_1() {
        return $this->manufacturer_add_1;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_add_2() {
        return $this->manufacturer_add_2;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_city() {
        return $this->manufacturer_city;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_state() {
        return $this->manufacturer_state;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_zip() {
        return $this->manufacturer_zip;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_rep() {
        return $this->manufacturer_rep;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_rep_email() {
        return $this->manufacturer_rep_email;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_rep_fax() {
        return $this->manufacturer_rep_fax;
    }

    /**
     *
     * @return string
     */
    public function getManufacturer_rep_phone() {
        return $this->manufacturer_rep_phone;
    }

    /**
     * 
     * @param int $manufacturer_id
     */
    public function setManufacturer_id($manufacturer_id) {
        $this->manufacturer_id = $manufacturer_id;
    }

    /**
     * 
     * @param string $manufacturer_name
     */
    public function setManufacturer_name($manufacturer_name) {
        $this->manufacturer_name = $manufacturer_name;
    }

    /**
     * 
     * @param string $manufacturer_phone
     */
    public function setManufacturer_phone($manufacturer_phone) {
        $this->manufacturer_phone = $manufacturer_phone;
    }

    /**
     * 
     * @param string $manufacturer_email
     */
    public function setManufacturer_email($manufacturer_email) {
        $this->manufacturer_email = $manufacturer_email;
    }

    /**
     * 
     * @param string $manufacturer_fax
     */
    public function setManufacturer_fax($manufacturer_fax) {
        $this->manufacturer_fax = $manufacturer_fax;
    }

    /**
     * 
     * @param string $manufacturer_add_1
     */
    public function setManufacturer_add_1($manufacturer_add_1) {
        $this->manufacturer_add_1 = $manufacturer_add_1;
    }

    /**
     * 
     * @param string $manufacturer_add_2
     */
    public function setManufacturer_add_2($manufacturer_add_2) {
        $this->manufacturer_add_2 = $manufacturer_add_2;
    }

    /**
     * 
     * @param string $manufacturer_city
     */
    public function setManufacturer_city($manufacturer_city) {
        $this->manufacturer_city = $manufacturer_city;
    }

    /**
     * 
     * @param string $manufacturer_state
     */
    public function setManufacturer_state($manufacturer_state) {
        $this->manufacturer_state = $manufacturer_state;
    }

    /**
     * 
     * @param string $manufacturer_zip
     */
    public function setManufacturer_zip($manufacturer_zip) {
        $this->manufacturer_zip = $manufacturer_zip;
    }

    /**
     * 
     * @param string $manufacturer_rep
     */
    public function setManufacturer_rep($manufacturer_rep) {
        $this->manufacturer_rep = $manufacturer_rep;
    }

    /**
     * 
     * @param string $manufacturer_rep_email
     */
    public function setManufacturer_rep_email($manufacturer_rep_email) {
        $this->manufacturer_rep_email = $manufacturer_rep_email;
    }

    /**
     * 
     * @param string $manufacturer_rep_fax
     */
    public function setManufacturer_rep_fax($manufacturer_rep_fax) {
        $this->manufacturer_rep_fax = $manufacturer_rep_fax;
    }

    /**
     * 
     * @param string $manufacturer_rep_phone
     */
    public function setManufacturer_rep_phone($manufacturer_rep_phone) {
        $this->manufacturer_rep_phone = $manufacturer_rep_phone;
    }

    /**
     * 
     * @return \manufacturer_model
     */
    public function get_all_manufacturers() {

        $query = "SELECT DISTINCT 
                m.id,
                m.manufacturer_name,
                m.manufacturer_phone,
                m.manufacturer_email,
                m.manufacturer_fax,
                m.manufacturer_add_1,
                m.manufacturer_add_2,
                m.manufacturer_city,
                m.manufacturer_state,
                m.manufacturer_zip,
                m.manufacturer_rep,
                m.manufacturer_rep_email,
                m.manufacturer_rep_fax,
                m.manufacturer_rep_phone
            FROM
                manufacturers m
            LEFT JOIN 
                client_manufacturer_lkup cml 
            ON 
                cml.manufacturer_id = m.id
            WHERE 
                cml.client_id = ?
            AND 
                m.manufacturer_name <> ''
            ORDER BY manufacturer_name ASC ";

        $result = $this->db->query(
            $query, array($this->session->userdata('user_client_id'))
        );

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {

            $manufacturers = array();

            foreach ($result->result() as $row) {

                $manufacturer = new manufacturer_model();

                $manufacturer->setManufacturer_id($row->id);
                $manufacturer->setManufacturer_name($row->manufacturer_name);
                $manufacturer->setManufacturer_add_1($row->manufacturer_add_1);
                $manufacturer->setManufacturer_add_2($row->manufacturer_add_2);
                $manufacturer->setManufacturer_city($row->manufacturer_city);
                $manufacturer->setManufacturer_state($row->manufacturer_state);
                $manufacturer->setManufacturer_zip($row->manufacturer_zip);
                $manufacturer->setManufacturer_phone($row->manufacturer_phone);
                $manufacturer->setManufacturer_fax($row->manufacturer_fax);
                $manufacturer->setManufacturer_email($row->manufacturer_email);
                $manufacturer->setManufacturer_rep($row->manufacturer_rep);
                $manufacturer->setManufacturer_rep_email($row->manufacturer_rep_email);
                $manufacturer->setManufacturer_rep_phone($row->manufacturer_rep_phone);
                $manufacturer->setManufacturer_fax($row->manufacturer_rep_fax);

                $manufacturers[] = $manufacturer;
            }
        }
        return $manufacturers;
    }

    public function exists() {

        $query = "
			SELECT manufacturer_name
			FROM manufacturers
			LEFT JOIN client_manufacturer_lkup ON client_manufacturer_lkup.manufacturer_id = manufacturers.id
			AND client_manufacturer_lkup.client_id = ?
			WHERE lower( manufacturer_name ) = lower(?)
		";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $_POST['manufacturer_name']
            )
        );

        return ($result->num_rows() > 0) ? true : false;
    }

    public function add_manufacturer() {

        $this->db->trans_start();

        //add manufacturer to manufacturer table
        $query = "
			INSERT INTO manufacturers (
				manufacturer_name,
				manufacturer_add_1,
				manufacturer_add_2,
				manufacturer_city,
				manufacturer_state,
				manufacturer_zip,
				manufacturer_phone,
				manufacturer_fax,
				manufacturer_email,
				manufacturer_rep,
				manufacturer_rep_phone,
				manufacturer_rep_fax,
				manufacturer_rep_email,
				manufacturer_date_created,
				manufacturer_created_by
			)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,curdate(),?)
		";

        $result = $this->db->query(
            $query, array(
            $_POST['manufacturer_name'],
            $_POST['manufacturer_add_1'],
            $_POST['manufacturer_add_2'],
            $_POST['manufacturer_city'],
            $_POST['manufacturer_state'],
            $_POST['manufacturer_zip'],
            $_POST['manufacturer_phone'],
            $_POST['manufacturer_fax'],
            $_POST['manufacturer_email'],
            $_POST['manufacturer_rep_name'],
            $_POST['manufacturer_rep_phone'],
            $_POST['manufacturer_rep_fax'],
            $_POST['manufacturer_rep_email'],
            $this->session->userdata('user_name')
            )
        );

        //add manufacturer to client_manufacturer_lkup table
        $query = "
			INSERT INTO client_manufacturer_lkup (client_id, manufacturer_id)
			VALUES (?,?)
		";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $this->db->insert_id()
            )
        );

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_manufacturer_information() {

        $query = "
	    SELECT
		manufacturers.id,
		manufacturer_name,
		manufacturer_add_1,
		manufacturer_add_2,
		manufacturer_city,
		manufacturer_state,
		manufacturer_zip,
		manufacturer_phone,
		manufacturer_fax,
		manufacturer_email,
		manufacturer_rep,
		manufacturer_rep_phone,
		manufacturer_rep_fax,
		manufacturer_rep_email,
		is_active,
		manufacturer_date_created,
		manufacturer_created_by
	    FROM
		manufacturers
	    LEFT JOIN
		client_manufacturer_lkup ON client_manufacturer_lkup.manufacturer_id = manufacturers.id
	    AND
		client_manufacturer_lkup.client_id = ?
	    WHERE
		lower( manufacturer_name ) = lower(?)
	    ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $_POST['manufacturer_name']
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in manufacturer_model/get_manufacturer_information()";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {
                $manufacturer['manufacturer_id'] = $row->id;
                $manufacturer['manufacturer_name'] = $row->manufacturer_name;
                $manufacturer['manufacturer_add_1'] = $row->manufacturer_add_1;
                $manufacturer['manufacturer_add_2'] = $row->manufacturer_add_2;
                $manufacturer['manufacturer_city'] = $row->manufacturer_city;
                $manufacturer['manufacturer_state'] = $row->manufacturer_state;
                $manufacturer['manufacturer_zip'] = $row->manufacturer_zip;
                $manufacturer['manufacturer_phone'] = $row->manufacturer_phone;
                $manufacturer['manufacturer_fax'] = $row->manufacturer_fax;
                $manufacturer['manufacturer_email'] = $row->manufacturer_email;
                $manufacturer['manufacturer_rep'] = $row->manufacturer_rep;
                $manufacturer['manufacturer_rep_email'] = $row->manufacturer_rep_email;
                $manufacturer['manufacturer_rep_phone'] = $row->manufacturer_rep_phone;
                $manufacturer['manufacturer_rep_fax'] = $row->manufacturer_rep_fax;
                $manufacturer['manufacturer_active'] = $row->is_active;
                $manufacturer['manufacturer_date_created'] = $row->manufacturer_date_created;
                $manufacturer['manufacturer_created_by'] = $row->manufacturer_created_by;
            }
        }

        return $manufacturer;
    }

    public function update_manufacturer_information() {

        $query = 'UPDATE manufacturers SET 
                manufacturer_name           = ?,
                manufacturer_add_1          = ?,
                manufacturer_add_2          = ?,
                manufacturer_city           = ?,
                manufacturer_state          = ?,
                manufacturer_zip            = ?,
                manufacturer_phone          = ?,
                manufacturer_fax            = ?,
                manufacturer_email          = ?,
                manufacturer_rep            = ?,
                manufacturer_rep_email      = ?,
                manufacturer_rep_phone      = ?,
                manufacturer_rep_fax        = ?,
                is_active                   = ?,
                manufacturer_date_modified  = CURDATE(),
                manufacturer_modified_by    = ?
            WHERE id                    = ?';

        $manufacturer_active = (isset($_POST['manufacturer_active'])) ? 1 : 0;

        $result = $this->db->query(
            $query, array(
            $_POST['manufacturer_name'],
            $_POST['manufacturer_add_1'],
            $_POST['manufacturer_add_2'],
            $_POST['manufacturer_city'],
            $_POST['manufacturer_state'],
            $_POST['manufacturer_zip'],
            $_POST['manufacturer_phone'],
            $_POST['manufacturer_fax'],
            $_POST['manufacturer_email'],
            $_POST['manufacturer_rep_name'],
            $_POST['manufacturer_rep_email'],
            $_POST['manufacturer_rep_phone'],
            $_POST['manufacturer_rep_fax'],
            $_POST['manufacturer_active'],
            $this->session->userdata('user_name'),
            $_POST['manufacturer_id']
            )
        );

        return ($result) ? true : false;
    }

    /**
     * 
     * @param type $manufacturer_name
     * @return boolean
     * @throws Exception
     */
    public function delete_manufacturer($manufacturer_name) {

        $query = "
			UPDATE manufacturers
			LEFT JOIN client_manufacturer_lkup ON client_manufacturer_lkup.manufacturer_id = manufacturers.id
			AND client_manufacturer_lkup.client_id = ?
            SET is_active = 0
			WHERE lower(manufacturer_name) = lower(?)
		";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $_POST['manufacturer_name']
            )
        );

        if (!$result) {
            // if query fails
            $message = "Query failed in manufacturer_model/delete_manufacturer()";
            throw new Exception($message);
        } else {
            return true;
        }
    }

    public function get_manufacturer(array $parts = array()) {
        
        if(empty($parts['manufacturer_id'])) {
            return $parts;
        }

        $query = "
	    SELECT
		id,
		manufacturer_name,
		manufacturer_add_1,
		manufacturer_add_2,
		manufacturer_city,
		manufacturer_state,
		manufacturer_zip,
		manufacturer_phone,
		manufacturer_fax,
		manufacturer_email,
		manufacturer_rep,
		manufacturer_rep_phone,
		manufacturer_rep_fax,
		manufacturer_rep_email,
		is_active,
		manufacturer_date_created,
		manufacturer_created_by
	    FROM
		manufacturers
	    WHERE
		id = ?
	    ";

        $result = $this->db->query(
            $query, array($parts['manufacturer_id'])
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in manufacturer_model/get_manufacturer()";
            throw new Exception($message);
        } else {
            
            foreach ($result->result() as $row) {
                $manufacturer['id'] = $row->id;
                $manufacturer['name'] = $row->manufacturer_name;
                $manufacturer['add_1'] = $row->manufacturer_add_1;
                $manufacturer['add_2'] = $row->manufacturer_add_2;
                $manufacturer['city'] = $row->manufacturer_city;
                $manufacturer['state'] = $row->manufacturer_state;
                $manufacturer['zip'] = $row->manufacturer_zip;
                $manufacturer['phone'] = $row->manufacturer_phone;
                $manufacturer['fax'] = $row->manufacturer_fax;
                $manufacturer['email'] = $row->manufacturer_email;
                $manufacturer['rep'] = $row->manufacturer_rep;
                $manufacturer['rep_email'] = $row->manufacturer_rep_email;
                $manufacturer['rep_phone'] = $row->manufacturer_rep_phone;
                $manufacturer['ep_fax'] = $row->manufacturer_rep_fax;
                $manufacturer['active'] = $row->is_active;
                $parts['manufacturer'] = $manufacturer;
            }
        }

        return $parts;
    }

}
