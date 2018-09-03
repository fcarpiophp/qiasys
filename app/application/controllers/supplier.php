<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of supplier
 *
 * @author Francisco
 */
class supplier extends CI_Controller {

    public function create($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $data['page_title'] = 'Create Supplier';

            //display the initial create supplier form
            $this->load->view('header', $data);
            $this->load->view('supplier/new_supplier_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function validate_new_supplier() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

            $this->load->helper('functions_helper');
            $post = new functions_helper();

            $this->load->model('supplier_model');
            $supplier = new supplier_model();

            //do some data sanitation before validation
            foreach ($_POST as $key => $value) {
                $_POST[$key] = $post->sanitize($value);
            }

            $errors = false;

            $data['supplier_name_error'] = '';

            if (empty($_POST['supplier_name'])) {
                $data['supplier_name_error'] = 'Enter Supplier name';
                $errors = true;
            } else {
                //check if supplier already exists
                $exists = false;
                $exists = $supplier->exists();

                if ($exists) {
                    $data['supplier_name_error'] = 'Supplier exists';
                    $errors = true;
                }
            }

            if (empty($_POST['supplier_add_1'])) {
                $data['supplier_add_1_error'] = 'Enter Address';
                $errors = true;
            }

            if (empty($_POST['supplier_city'])) {
                $data['supplier_city_error'] = 'Enter City';
                $errors = true;
            }

            if (empty($_POST['supplier_state'])) {
                $data['supplier_state_error'] = 'Enter State';
                $errors = true;
            }

            if (empty($_POST['supplier_zip'])) {
                $data['supplier_zip_error'] = 'Enter Zip';
                $errors = true;
            } elseif (!ctype_alnum($_POST['supplier_zip'])) {
                $data['supplier_zip_error'] = 'Invalid characters';
                $errors = true;
            }

            if (empty($_POST['supplier_phone'])) {
                $data['supplier_phone_error'] = 'Enter Phone';
                $errors = true;
            } elseif (strlen($_POST['supplier_phone']) != 10) {
                $data['supplier_phone_error'] = 'Ten digit number';
                $errors = true;
            } elseif (!ctype_digit($_POST['supplier_phone'])) {
                $data['supplier_phone_error'] = 'Numbers only';
                $errors = true;
            }

            if (empty($_POST['supplier_email'])) {
                $data['supplier_email_error'] = 'Enter Email';
                $errors = true;
            }

            if ($errors) {
                self::create($data);
            } else {
                // If I made it this far then the data is ok
                $result = $supplier->add_supplier();

                if ($result) {
                    $data['message'] = '<p class="text-success">Supplier created. Click <a href="' . base_url() . 'index.php/supplier/create">HERE</a> to create another supplier.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error adding the supplier, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
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

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $data['page_title'] = 'Update Supplier';

            //get suppliers for autocomplete
            $this->load->model('autocomplete_model');
            $all_suppliers = new autocomplete_model();
            $active = true;
            $data['suppliers'] = $all_suppliers->get_all_suppliers($active);

            //display the update supplier form
            $this->load->view('header', $data);
            $this->load->view('supplier/update_supplier_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function validate_update_supplier() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $this->load->helper('functions_helper');
            $post = new functions_helper();

            $this->load->model('supplier_model');
            $supplier = new supplier_model();

            //do some data sanitation before validation
            foreach ($_POST as $key => $value) {
                $_POST[$key] = $post->sanitize($value);
            }

            $errors = false;

            $data['supplier_name_error'] = '';

            if (empty($_POST['supplier_name'])) {
                $data['supplier_name_error'] = 'Enter Supplier name';
                $errors = true;
            }

            if (empty($_POST['supplier_add_1'])) {
                $data['supplier_add_1_error'] = 'Enter Address';
                $errors = true;
            }

            if (empty($_POST['supplier_city'])) {
                $data['supplier_city_error'] = 'Enter City';
                $errors = true;
            }

            if (empty($_POST['supplier_state'])) {
                $data['supplier_state_error'] = 'Enter State';
                $errors = true;
            }

            if (empty($_POST['supplier_zip'])) {
                $data['supplier_zip'] = 'Enter Zip';
                $errors = true;
            } elseif (!ctype_alnum($_POST['supplier_zip'])) {
                $data['supplier_zip_error'] = 'Invalid characters';
                $errors = true;
            }

            if (empty($_POST['supplier_phone'])) {
                $data['supplier_phone_error'] = 'Enter Phone';
                $errors = true;
            } elseif (strlen($_POST['supplier_phone']) != 10) {
                $data['supplier_phone_error'] = 'Ten digit number';
                $errors = true;
            } elseif (!ctype_digit($_POST['supplier_phone'])) {
                $data['supplier_phone_error'] = 'Numbers only';
                $errors = true;
            }

            if (empty($_POST['supplier_email'])) {
                $data['supplier_email_error'] = 'Enter Email';
                $errors = true;
            }

            if ($errors) {
                self::update($data);
            } else {
                // If I made it this far then the data is ok
                $result = $supplier->update_supplier_information();

                if ($result) {
                    $data['message'] = '<p class="text-success">Supplier updated. Click <a href="' . base_url() . 'index.php/supplier/update">HERE</a> to update another supplier.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error adding the supplier, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function get_supplier_data() {

        //no permissions, this is used for ajax call

        if (!empty($_POST['supplier_name'])) {
            $this->load->model('supplier_model');
            $supplier = new supplier_model();
            $supplier_id = $supplier->get_supplier_id_from_supplier_name($_POST['supplier_name']);
            $data = $supplier->get_supplier_information($supplier_id);

            echo json_encode($data);
        } else {
            $data = array();
            echo json_encode($data);
        }

        // anything othet than the returned ajax kills the call, remember that...
        //if ('localhost' == $_SERVER['SERVER_NAME']) {
        //	$this->output->enable_profiler(TRUE);
        //}
    }

    public function delete($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            //get suppliers for autocomplete
            $this->load->model('autocomplete_model');
            $all_suppliers = new autocomplete_model();
            $data['suppliers'] = $all_suppliers->get_all_suppliers();

            $data['page_title'] = 'Delete Supplier';

            $this->load->view('header', $data);
            $this->load->view('supplier/delete_supplier_form', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function validate_delete_supplier() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $error = false;
            $supplier_name = $_POST['supplier_name'];

            //check if supplier exists
            $this->load->model('supplier_model');
            $supplier = new supplier_model();
            $unique = $supplier->exists($supplier_name);

            if (empty($_POST['supplier_name'])) {
                $data['supplier_name_error'] = 'Enter a supplier name';
                $error = true;
            } elseif (!$unique) {
                $data['supplier_name_error'] = 'Supplier does not exist';
                $error = true;
            }

            if ($error) {

                self::delete($data);
            } else {
                // If I made it this far then the data is ok
                $result = $supplier->delete_supplier($supplier_name);

                if ($result) {
                    $data['message'] = '<p class="text-success">Supplier deleted. Click <a href="' . base_url() . 'index.php/supplier/delete">HERE</a> to delete another supplier.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error deleting the supplier, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

}
