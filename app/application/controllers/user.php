<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Francisco
 */
class user extends CI_Controller {

    public function create($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getUser()) {

            //$this->load->model('permission_model');
            //$permissions = new permission_model();
            $data['permissions'] = $permissions->get_all_permissions();
            $data['page_title'] = "Create User";

            $this->load->model('client_model');
            $sites = new client_model();
            $data['sites'] = $sites->get_sites();

            $this->load->view('header', $data);
            $this->load->view('user/new_user_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

    public function validate_new_user() {

        //trim array values
        if (isset($_POST['permission'])) {
            $_POST['permission'] = array_map('trim', $_POST['permission']);
        }

        $error = false;
        $email = $_POST['user_name'];

        //check if user name exists
        $this->load->model('user_model');
        $user = new user_model();
        $not_unique = $user->user_exists($_POST['user_name']);

        if (!isset($_POST['permission'])) {
            $data['permission_error'] = 'Select a permission';
            $error = true;
        }

        if (empty($_POST['user_name'])) {
            $data['user_name_error'] = 'Enter a user name';
            $error = true;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['user_name_error'] = 'User name must be a valid email';
            $error = true;
        } elseif ($not_unique) {
            $data['user_name_error'] = 'User exists';
            $error = true;
        }

        if (empty($_POST['first_name'])) {
            $data['first_name_error'] = 'Enter a first name';
            $error = true;
        }

        if (empty($_POST['last_name'])) {
            $data['last_name_error'] = 'Enter a last name';
            $error = true;
        }

        if (trim($_POST['site']) == trim('Select Site')) {
            $data['site_error'] = 'Select a site';
            $error = true;
        }

        if ($error) {
            self::create($data);
        } else {
            // If I made it this far then the data is ok
            $result = $user->add_user();

            if ($result) {
                $data['message'] = '<p class="text-success">User added. Click <a href="' . base_url() . 'index.php/user/create">HERE</a> to add another user.</p>';
            } else {
                $data['message'] = '<p class="text-error">Error adding the user, please try again</p>';
            }

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function update($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getUser()) {

            $data['permissions'] = $permissions->get_all_permissions();
            $data['page_title'] = 'Update User';

            $this->load->model('client_model');
            $sites = new client_model();
            $data['sites'] = $sites->get_sites();

            //get users for autocomplete
            $this->load->model('autocomplete_model');
            $all_users = new autocomplete_model();
            $data['users'] = $all_users->get_all_users();

            $this->load->view('header', $data);
            $this->load->view('user/update_user_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

    public function validate_update_user() {

        //trim array values
        if (isset($_POST['permission'])) {
            $_POST['permission'] = array_map('trim', $_POST['permission']);
        }

        $error = false;
        $email = $_POST['user_name'];

        $this->load->model('user_model');
        $user = new user_model();

        //get users for autocomplete
        $this->load->model('autocomplete_model');
        $all_users = new autocomplete_model();
        $data['users'] = $all_users->get_all_users();

        $not_unique = $user->user_exists($_POST['user_name']);

        //removed to allow for instant user deactivation
        /*
          if(!isset($_POST['permission'])) {
          $data['permission_error'] = 'Select a permission';
          $error = true;
          }
         */

        if (empty($_POST['user_name'])) {
            $data['user_name_error'] = 'Enter a user name';
            $error = true;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['user_name_error'] = 'User name must be a valid email';
            $error = true;
        } elseif (!$not_unique) {
            $data['user_name_error'] = 'User does not exist';
            $error = true;
        }

        if (empty($_POST['first_name'])) {
            $data['first_name_error'] = 'Enter a first name';
            $error = true;
        }

        if (empty($_POST['last_name'])) {
            $data['last_name_error'] = 'Enter a last name';
            $error = true;
        }

        if (trim($_POST['site']) == trim('Select Site')) {
            $data['site_error'] = 'Select a site';
            $error = true;
        }

        if ($error) {

            $this->update($data);
        } else {
            // If I made it this far then the data is ok
            $result = $user->add_user();

            if ($result) {
                $data['message'] = '<p class="text-success">User updated. Click <a href="' . base_url() . 'index.php/user/update">HERE</a> to update another user.</p>';
            } else {
                $data['message'] = '<p class="text-error">Error adding the user, please try again</p>';
            }

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function get_user_data() {

        if (!empty($_POST['user'])) {
            $this->load->model('user_model');
            $user = new user_model();
            $data = $user->get_user_information();

            echo json_encode($data);
        } else {
            $data = array();
            echo json_encode($data);
        }
    }

    public function delete($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getUser()) {

            //get users for autocomplete
            $this->load->model('autocomplete_model');
            $all_users = new autocomplete_model();
            $data['users'] = $all_users->get_all_users();

            $data['page_title'] = 'Delete User';

            $this->load->view('header', $data);
            $this->load->view('user/delete_user_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

    public function validate_delete_user() {

        $error = false;
        $email = $_POST['user_name'];

        //check if user name exists
        $this->load->model('user_model');
        $user = new user_model();

        $not_unique = $user->user_exists($email);

        if (empty($_POST['user_name'])) {
            $data['user_name_error'] = 'Enter a user name';
            $error = true;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['user_name_error'] = 'User name must be a valid email';
            $error = true;
        } elseif (!$not_unique) {
            $data['user_name_error'] = 'User does not exist';
            $error = true;
        }

        if ($error) {

            self::delete($data);
        } else {
            // If I made it this far then the data is ok
            $result = $user->delete_user($email);

            if ($result) {
                $data['message'] = '<p class="text-success">User deleted. Click <a href="' . base_url() . 'index.php/user/delete">HERE</a> to delete another user.</p>';
            } else {
                $data['message'] = '<p class="text-error">Error deleting the user, please try again</p>';
            }

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function change_password($data = null) {

        $data['page_title'] = 'Change Password';

        $this->load->view('header', $data);
        $this->load->view('user/change_password_form');
        $this->load->view('footer');
    }

    public function validate_change_password() {

        $error = false;

        if (empty($_POST['newpass1'])) {
            $data['newpass1_error'] = 'Enter new password.';
            $error = true;
        }

        if (empty($_POST['newpass2'])) {
            $data['newpass2_error'] = 'Enter new password.';
            $error = true;
        }

        if ($_POST['newpass1'] != $_POST['newpass2']) {
            $data['newpass1_error'] = 'Passwords do not match.';
            $data['newpass2_error'] = 'Passwords do not match.';
            $error = true;
        }

        if ($error) {

            self::change_password($data);
        } else {//do the thing...
            $this->load->model('user_model');
            $pwd_change = new user_model();
            $result = $pwd_change->password_change();

            if ($result) {
                $data['message'] = '<p class="text-success">Password successfully changed.</p>';
            } else {
                $data['message'] = '<p class="text-error">Password change failed, please try again</p>';
            }

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

}

?>
