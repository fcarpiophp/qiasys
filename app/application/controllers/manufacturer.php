<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manufacturer
 *
 * @author Francisco
 */
class manufacturer extends CI_Controller {
    
    public function create($data = null) {
        
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $data['page_title'] = 'Create Manufacturer';

            //display the initial create manufacturer form
            $this->load->view('header', $data);
            $this->load->view('manufacturer/new_manufacturer_form', $data);
            $this->load->view('footer');
        }
        else {
            
            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

			$this->load->view('header');
			$this->load->view('blank_message', $data);
			$this->load->view('footer');
        }    

		if ('localhost' == $_SERVER['SERVER_NAME']) {
			$this->output->enable_profiler(TRUE);
		}
            
    }

    public function validate_new_manufacturer() {
        
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            
            $this->load->helper('functions_helper');
            $post = new functions_helper();

            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();

            //do some data sanitation before validation
            foreach($_POST as $key => $value) {
                $_POST[$key] = $post->sanitize($value);
            }

            $errors = false;

            $data['manufacturer_name_error'] = '';

            if(empty($_POST['manufacturer_name'])) {
                $data['manufacturer_name_error'] = 'Enter Manufacturer name';
                $errors = true;
            }
            else {
                //check if manufacturer already exists
                $exists = false;
                $exists = $manufacturer->exists();

                if($exists) {
                    $data['manufacturer_name_error'] = 'Manufacturer exists';
                    $errors = true;
                }
            }

            if(empty($_POST['manufacturer_add_1'])) {
                $data['manufacturer_add_1_error'] = 'Enter Address';
                $errors = true;
            }

            if(empty($_POST['manufacturer_city'])) {
                $data['manufacturer_city_error'] = 'Enter City';
                $errors = true;
            }

            if(empty($_POST['manufacturer_state'])) {
                $data['manufacturer_state_error'] = 'Enter State';
                $errors = true;
            }

            if(empty($_POST['manufacturer_zip'])) {
                $data['manufacturer_zip_error'] = 'Enter Zip';
                $errors = true;
            }
            elseif(!ctype_alnum($_POST['manufacturer_zip'])) {
                $data['manufacturer_zip_error'] = 'Invalid characters';
                $errors = true;
            }

            if(empty($_POST['manufacturer_phone'])) {
                $data['manufacturer_phone_error'] = 'Enter Phone';
                $errors = true;
            }
            elseif(strlen($_POST['manufacturer_phone']) != 10) {
                $data['manufacturer_phone_error'] = 'Ten digit number';
                $errors = true;
            }
            elseif(!ctype_digit($_POST['manufacturer_phone'])) {
                $data['manufacturer_phone_error'] = 'Numbers only';
                $errors = true;
            }

            if(empty($_POST['manufacturer_email'])) {
                $data['manufacturer_email_error'] = 'Enter Email';
                $errors = true;
            }

            if($errors) {
                self::create($data);
            } else {
                // If I made it this far then the data is ok
                $result = $manufacturer->add_manufacturer();

                if($result) {
                    $data['message'] = '<p class="text-success">Manufacturer created. Click <a href="'.base_url().'index.php/manufacturer/create">HERE</a> to create another manufacturer.</p>';
                }
                else {
                    $data['message'] = '<p class="text-error">Error adding the manufacturer, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');
            }
        }
        else {
            
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
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $data['page_title'] = 'Update Manufacturer';

            //get manufacturers for autocomplete
            $this->load->model('autocomplete_model');
            $all_manufacturers = new autocomplete_model();
            $data['manufacturers'] = $all_manufacturers->get_all_manufacturers();

            //display the update manufacturer form
            $this->load->view('header', $data);
            $this->load->view('manufacturer/update_manufacturer_form', $data);
            $this->load->view('footer');
        }
        else {
            
            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

			$this->load->view('header');
			$this->load->view('blank_message', $data);
			$this->load->view('footer');
        }

		if ('localhost' == $_SERVER['SERVER_NAME']) {
			$this->output->enable_profiler(TRUE);
		}
	}
    
    public function validate_update_manufacturer() {
        
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $this->load->helper('functions_helper');
            $post = new functions_helper();

            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();

            //do some data sanitation before validation
            foreach($_POST as $key => $value) {
                $_POST[$key] = $post->sanitize($value);
            }

            $errors = false;

            $data['manufacturer_name_error'] = '';

            if(empty($_POST['manufacturer_name'])) {
                $data['manufacturer_name_error'] = 'Enter Manufacturer name';
                $errors = true;
            }

            if(empty($_POST['manufacturer_add_1'])) {
                $data['manufacturer_add_1_error'] = 'Enter Address';
                $errors = true;
            }

            if(empty($_POST['manufacturer_city'])) {
                $data['manufacturer_city_error'] = 'Enter City';
                $errors = true;
            }

            if(empty($_POST['manufacturer_state'])) {
                $data['manufacturer_state_error'] = 'Enter State';
                $errors = true;
            }

            if(empty($_POST['manufacturer_zip'])) {
                $data['manufacturer_zip'] = 'Enter Zip';
                $errors = true;
            }
            elseif(!ctype_alnum($_POST['manufacturer_zip'])) {
                $data['manufacturer_zip_error'] = 'Invalid characters';
                $errors = true;
            }

            if(empty($_POST['manufacturer_phone'])) {
                $data['manufacturer_phone_error'] = 'Enter Phone';
                $errors = true;
            }
            elseif(strlen($_POST['manufacturer_phone']) != 10) {
                $data['manufacturer_phone_error'] = 'Ten digit number';
                $errors = true;
            }
            elseif(!ctype_digit($_POST['manufacturer_phone'])) {
                $data['manufacturer_phone_error'] = 'Numbers only';
                $errors = true;
            }

            if(empty($_POST['manufacturer_email'])) {
                $data['manufacturer_email_error'] = 'Enter Email';
                $errors = true;
            }

            if($errors) {
                self::update($data);
            } else {
                // If I made it this far then the data is ok
                $result = $manufacturer->update_manufacturer_information();

                if($result) {
                    $data['message'] = '<p class="text-success">Manufacturer updated. Click <a href="'.base_url().'index.php/manufacturer/update">HERE</a> to update another Manufacturer.</p>';
                }
                else {
                    $data['message'] = '<p class="text-error">Error adding the manufacturer, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');
            }
        }
        else {
            
            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

			$this->load->view('header');
			$this->load->view('blank_message', $data);
			$this->load->view('footer');
        }

		if ('localhost' == $_SERVER['SERVER_NAME']) {
			$this->output->enable_profiler(TRUE);
		}

	}

	public function get_manufacturer_data()
	{
        
        //no permissions, this is used for ajax call
        
        if(!empty($_POST['manufacturer_name'])) {
            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();
            $data = $manufacturer->get_manufacturer_information();

            echo json_encode($data);
        }
        else {
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
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            //get manufacturers for autocomplete
            $this->load->model('autocomplete_model');
            $all_manufacturers = new autocomplete_model();
            $active = true;
            $data['manufacturers'] = $all_manufacturers->get_all_manufacturers($active);

            $data['page_title'] = 'Delete Manufacturer';

            $this->load->view('header', $data);
            $this->load->view('manufacturer/delete_manufacturer_form', $data);
            $this->load->view('footer');
        }
        else {
            
            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

			$this->load->view('header');
			$this->load->view('blank_message', $data);
			$this->load->view('footer');
        }

		if ('localhost' == $_SERVER['SERVER_NAME']) {
			$this->output->enable_profiler(TRUE);
		}
	}
    
    public function validate_delete_manufacturer() {
        
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
            $error = false;
            $manufacturer_name = $_POST['manufacturer_name'];

            //check if manufacturer exists
            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();
            $unique = $manufacturer->exists($manufacturer_name);

            if (empty($_POST['manufacturer_name'])) {
                $data['manufacturer_name_error'] = 'Enter a manufacturer name';
                $error = true;
            } elseif (!$unique) {
                $data['manufacturer_name_error'] = 'manufacturer does not exist';
                $error = true;
            }

            if($error) {

                self::delete($data);
            } else {
                // If I made it this far then the data is ok
                $result = $manufacturer->delete_manufacturer($manufacturer_name);

                if($result) {
                    $data['message'] = '<p class="text-success">Manufacturer deleted. Click <a href="'.base_url().'index.php/manufacturer/delete">HERE</a> to delete another manufacturer.</p>';
                }
                else {
                    $data['message'] = '<p class="text-error">Error deleting the manufacturer, please try again</p>';
                }

                $this->load->view('header', $data);
                $this->load->view('blank_message', $data);
                $this->load->view('footer');

            }
        }
        else {
            
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
