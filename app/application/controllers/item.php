<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author Francisco
 */
class item extends CI_Controller {

    public function create($data = null) {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

            $data['page_title'] = "Create Item";

            // need to pass supplier names...
            $this->load->model('supplier_model');
            $supplier = new supplier_model();
            $data['suppliers'] = $supplier->get_all_suppliers();

            // need to pass manufacturer names...
            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();
            $data['manufacturers'] = $manufacturer->get_all_manufacturers();
            
            // need to pass all sites...
            $this->load->model('site_model');
            $sites = new site_model();
            $data['sites'] = $sites->get_all_sites();

            $this->load->view('header', $data);
            $this->load->view('item/create_new_item', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

    public function validate_new_item() {
        
        $this->load->model('site_model');
        $sites = new site_model();
        $site_count = $sites->get_site_count();

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        // session used to remember dropdown values from the submitting form
        $_SESSION['new_item_manuf_id'] = $_POST['manufacturer_name'];
        $_SESSION['new_item_supp_id'] = $_POST['supplier_name'];

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

            $errors = false;

            if (empty($_POST['item_description'])) {
                $data['item_description_error'] = 'Enter Description';
                $errors = true;
            } else if (strlen($_POST['item_description']) < 10) {
                $data['item_description_error'] = 'Description must be at least 10 characters';
                $errors = true;
            }

            if (empty($_POST['supplier_name']) || ($_POST['supplier_name'] == 'not selected')) {
                $data['supplier_name_error'] = 'Select Supplier name';
                $errors = true;
            }

            if (empty($_POST['part_number'])) {
                $data['part_number_error'] = 'Enter part number';
                $errors = true;
            }
            
            //$empty_form = array();
            $data['all_empty'] = true;
            
            for ($i = 0; $i < $site_count; $i++) {
                
                //$empty_form[$i] = empty($_POST['item_uom'][$i]) && empty($_POST['item_min'][$i]) && empty($_POST['item_max'][$i]) 
                //    && empty($_POST['item_min_order'][$i])  && empty($_POST['item_cost'][$i]) && empty($_POST['item_msrp'][$i])
                //    && empty($_POST['item_price'][$i]);
                
                if ( !empty($_POST['item_uom'][$i]) || !empty($_POST['item_min'][$i]) || !empty($_POST['item_max'][$i]) 
                    || !empty($_POST['item_min_order'][$i]) || !empty($_POST['item_cost'][$i]) || !empty($_POST['item_msrp'][$i])
                    || !empty($_POST['item_price'][$i]) ) {

                    if (empty($_POST['item_uom'][$i])) {
                        $data['item_uom_error'][$i] = 'Enter Unit of Measure';
                        $errors = true;
                    }
                    
                    if (!($_POST['item_min'][$i] >= 0)) {
                        $data['item_min_error'][$i] = 'Enter Min inventory';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_min'][$i])) {
                        $data['item_min_error'][$i] = 'Min must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_max'][$i])) {
                        $data['item_max_error'][$i] = 'Enter max inventory';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_max'][$i])) {
                        $data['item_max_error'][$i] = 'Max must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_min_order'][$i])) {
                        $data['item_min_order_error'][$i] = 'Enter min order';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_min_order'][$i])) {
                        $data['item_min_order_error'][$i] = 'Min order must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_cost'][$i])) {
                        $data['item_cost_error'][$i] = 'Enter cost';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_cost'][$i])) {
                        $data['item_cost_error'][$i] = 'Cost must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_msrp'][$i])) {
                        $data['item_msrp_error'][$i] = 'Enter MSRP';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_msrp'][$i])) {
                        $data['item_msrp_error'][$i] = 'MSRP must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_price'][$i])) {
                        $data['item_price_error'][$i] = 'Enter item price';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_msrp'][$i])) {
                        $data['item_price_error'][$i] = 'Price must be a number';
                        $errors = true;
                    }
                    
                    if (!empty($_POST['item_min'][$i]) && !empty($_POST['item_max'][$i]) &&
                        is_numeric($_POST['item_min'][$i]) && is_numeric($_POST['item_max'][$i])) {
                        if ($_POST['item_min'][$i] >= $_POST['item_max'][$i]) {
                            $data['item_max_error'][$i] = 'Max must be greater than Min';
                            $errors = true;
                        }
                    }
                    
                    if (!empty($_POST['item_min'][$i]) && !empty($_POST['item_max'][$i]) && !empty($_POST['item_min_order'][$i])
                        && is_numeric($_POST['item_min'][$i]) && is_numeric($_POST['item_max'][$i]) && is_numeric($_POST['item_min_order'][$i])) {
                        if ( ($_POST['item_max'][$i] - $_POST['item_min'][$i]) > $_POST['item_min_order'][$i] ) {
                            $data['item_min_order_error'][$i] = 'Must be >= (Max - Min)';
                            $errors = true;
                        }
                    }

                    $data['all_empty'] = false;
                }
            }

            if ($errors || $data['all_empty']) {
                self::create($data);
            } else {
                // If I made it this far then the data is ok
                $this->load->model('item_model');
                $item = new item_model();

                $result = false;
                $item_exists = $item->exists($_POST['part_number'], $_POST['supplier_name']);

                if (!$item_exists) {
                    $result = $item->add();
                }

                if ($result) {
                    $data['message'] = '<p class="text-success">Item created. Click <a href="' . base_url() . 'index.php/item/create">HERE</a> to add another item.</p>';
                } else if($item_exists) {
                    $data['message'] = '<p class="text-info">Item already exists.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error adding the item, please try again</p>';
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

            // need to pass part numbers...
            $this->load->model('item_model');
            $item = new item_model();
            $data['part_numbers'] = json_encode($item->get_part_numbers());

            $data['page_title'] = "Update Item";

            // need to pass supplier names...
            $this->load->model('supplier_model');
            $supplier = new supplier_model();
            $data['suppliers'] = $supplier->get_all_suppliers();

            // need to pass manufacturer names...
            $this->load->model('manufacturer_model');
            $manufacturer = new manufacturer_model();
            $data['manufacturers'] = $manufacturer->get_all_manufacturers();
            
            // need to pass all sites...
            $this->load->model('site_model');
            $sites = new site_model();
            $data['sites'] = $sites->get_all_sites();

            $this->load->view('header', $data);
            $this->load->view('item/update_item', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

    public function validate_update_item() {

        
        $this->load->model('site_model');
        $sites = new site_model();
        $site_count = $sites->get_site_count();

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        // session used to remember dropdown values from the submitting form
        $_SESSION['new_item_manuf_id'] = isset($_POST['manufacturer_name']) ? $_POST['manufacturer_name']: '';
        $_SESSION['new_item_supp_id'] = $_POST['supplier_name'];

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

            $errors = false;

            if (empty($_POST['item_description'])) {
                $data['item_description_error'] = 'Enter Description';
                $errors = true;
            } else if (strlen($_POST['item_description']) < 10) {
                $data['item_description_error'] = 'Description must be at least 10 characters';
                $errors = true;
            }

            if (empty($_POST['supplier_name']) || ($_POST['supplier_name'] == 'not selected')) {
                $data['supplier_name_error'] = 'Select Supplier name';
                $errors = true;
            }

            if (empty($_POST['part_number'])) {
                $data['part_number_error'] = 'Enter part number';
                $errors = true;
            }
            
            $data['all_empty'] = true;
            
            for ($i = 0; $i < $site_count; $i++) {
                
                //$empty_form[$i] = empty($_POST['item_uom'][$i]) && empty($_POST['item_min'][$i]) && empty($_POST['item_max'][$i]) 
                //    && empty($_POST['item_min_order'][$i])  && empty($_POST['item_cost'][$i]) && empty($_POST['item_msrp'][$i])
                //    && empty($_POST['item_price'][$i]);
                
                if ( !empty($_POST['item_uom'][$i]) || !empty($_POST['item_min'][$i]) || !empty($_POST['item_max'][$i]) 
                    || !empty($_POST['item_min_order'][$i]) || !empty($_POST['item_cost'][$i]) || !empty($_POST['item_msrp'][$i])
                    || !empty($_POST['item_price'][$i]) ) {

                    if (empty($_POST['item_uom'][$i])) {
                        $data['item_uom_error'][$i] = 'Enter Unit of Measure';
                        $errors = true;
                    }
                    
                    if (!($_POST['item_min'][$i] >= 0)) {
                        $data['item_min_error'][$i] = 'Enter Min inventory';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_min'][$i])) {
                        $data['item_min_error'][$i] = 'Min must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_max'][$i])) {
                        $data['item_max_error'][$i] = 'Enter max inventory';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_max'][$i])) {
                        $data['item_max_error'][$i] = 'Max must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_min_order'][$i])) {
                        $data['item_min_order_error'][$i] = 'Enter min order';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_min_order'][$i])) {
                        $data['item_min_order_error'][$i] = 'Min order must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_cost'][$i])) {
                        $data['item_cost_error'][$i] = 'Enter cost';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_cost'][$i])) {
                        $data['item_cost_error'][$i] = 'Cost must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_msrp'][$i])) {
                        $data['item_msrp_error'][$i] = 'Enter MSRP';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_msrp'][$i])) {
                        $data['item_msrp_error'][$i] = 'MSRP must be a number';
                        $errors = true;
                    }
                    
                    if (empty($_POST['item_price'][$i])) {
                        $data['item_price_error'][$i] = 'Enter item price';
                        $errors = true;
                    } else if (!is_numeric($_POST['item_msrp'][$i])) {
                        $data['item_price_error'][$i] = 'Price must be a number';
                        $errors = true;
                    }
                    
                    if (!empty($_POST['item_min'][$i]) && !empty($_POST['item_max'][$i]) &&
                        is_numeric($_POST['item_min'][$i]) && is_numeric($_POST['item_max'][$i])) {
                        if ($_POST['item_min'][$i] >= $_POST['item_max'][$i]) {
                            $data['item_max_error'][$i] = 'Max must be greater than Min';
                            $errors = true;
                        }
                    }
                    
                    if (!empty($_POST['item_min'][$i]) && !empty($_POST['item_max'][$i]) && !empty($_POST['item_min_order'][$i])
                        && is_numeric($_POST['item_min'][$i]) && is_numeric($_POST['item_max'][$i]) && is_numeric($_POST['item_min_order'][$i])) {
                        if ( ($_POST['item_max'][$i] - $_POST['item_min'][$i]) > $_POST['item_min_order'][$i] ) {
                            $data['item_min_order_error'][$i] = 'Must be >= (Max - Min)';
                            $errors = true;
                        }
                    }
                    
                    $data['all_empty'] = false;
                }
                
                if($_POST['is_active_hidden'][$i] == 'yes') {
                    
                    if (empty($_POST['item_uom'][$i])) {
                        $data['item_uom_error'][$i] = 'Enter Unit of Measure';
                        $errors = true;
                    }

                    if (!($_POST['item_min'][$i] >= 0)) {
                        $data['item_min_error'][$i] = 'Enter Min inventory';
                        $errors = true;
                    }

                    if (empty($_POST['item_max'][$i])) {
                        $data['item_max_error'][$i] = 'Enter max inventory';
                        $errors = true;
                    }

                    if (empty($_POST['item_min_order'][$i])) {
                        $data['item_min_order_error'][$i] = 'Enter min order';
                        $errors = true;
                    }

                    if (empty($_POST['item_cost'][$i])) {
                        $data['item_cost_error'][$i] = 'Enter cost';
                        $errors = true;
                    }

                    if (empty($_POST['item_msrp'][$i])) {
                        $data['item_msrp_error'][$i] = 'Enter MSRP';
                        $errors = true;
                    }

                    if (empty($_POST['item_price'][$i])) {
                        $data['item_price_error'][$i] = 'Enter item price';
                        $errors = true;
                    }
                    
                    $data['checkbox'] = ' checked';
                }
            }
            
            if ($errors || $data['all_empty']) {
                self::update($data);
            } else {
                // If I made it this far then the data is ok
                $this->load->model('item_model');
                $item = new item_model();

                $result = false;

                if ($item->exists($_POST['part_number'], $_POST['supplier_name'])) {

                    $result = $item->update();
                }

                if ($result) {
                    $data['message'] = '<p class="text-success">Item created. Click <a href="' . base_url() . 
                        'index.php/item/update">HERE</a> to update another item.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error updating the item, please try again</p>';
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

    public function get_item_data() {

        //no permissions, this is used for ajax call

        if (!empty($_POST['part_number'])) {
            $this->load->model('item_model');
            $item = new item_model();
            $data = $item->get_item_information();

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

            // need to pass part numbers...
            $this->load->model('item_model');
            $item = new item_model();
            $data['parts'] = json_encode($item->get_part_numbers());
            
            // get all sites
            $this->load->model('site_model');
            $allSites = new site_model();
            $data['sites'] = $allSites->get_all_sites();
            
            $data['page_title'] = 'Delete Item';

            $this->load->view('header', $data);
            $this->load->view('item/delete_item', $data);
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

    public function validate_delete_item() 
    {
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

            $errors = false;

            if (empty($_POST['part_number'])) {
                $data['item_name_error'] = 'Enter Part Number';
                $errors = true;
            }
            
            if($errors) {
                $this->delete($data);
            } else {
                $this->load->model('item_model');
                $item = new item_model();

                $supplier_id = $item->get_supplier_id_from_part_number($_POST['part_number']);

                //check if item exists in database
                $result = $item->exists($_POST['part_number'], $supplier_id);

                if (!$result) {
                    $data['item_name_error'] = 'Invalid Number';
                    $errors = true;
                } else {
                    $deleted = $item->delete($_POST['part_number']);
                }

                if($deleted) {
                    $data['message'] = '<p class="text-success">Item deleted. Click <a href="' . base_url() . 
                        'index.php/item/delete">HERE</a> to delete another item.</p>';
                } else {
                    $data['message'] = '<p class="text-error">Error deleting item. Click <a href="' . base_url() . 
                        'index.php/item/delete">HERE</a> to try again.</p>';
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
    }
    
    public function get_sites() {

        //no permissions, this is used for ajax call

        if (!empty($_POST['part_number'])) {
            $this->load->model('site_model');
            $site = new site_model();
            $data = $site->get_active_sites($_POST['part_number']);
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
}
