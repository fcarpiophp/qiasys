<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Inventory extends CI_Controller {

    public function index() {
	//this function doesn't do a god damn thing!
    }

    public function view_inventory() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() ||
	    $permission->getPurchase() || $permission->getProposal() || $permission->getSearch()) {
	    //get the data from the model
	    $this->load->model('inventory_model');
	    $data['items'] = $this->inventory_model->view_inventory($this->uri->segment(3), ITEMS_PER_PAGE);

	    $data['page_title'] = 'View inventory';

	    //pagination start
	    $this->load->library('pagination');
	    $config['base_url'] = base_url() . 'index.php/inventory/view_inventory';
	    $config['total_rows'] = $this->inventory_model->count_inventory();
	    $config['per_page'] = ITEMS_PER_PAGE;
	    $this->pagination->initialize($config);
	    $data['pagination_links'] = $this->pagination->create_links();
	    //pagination end
	    
	    //load the views
	    $this->load->view('header', $data);
	    $this->load->view('inventory/view_inventory', $data);
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

    public function item_details() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() ||
	    $permission->getPurchase() || $permission->getProposal() || $permission->getSearch() 
            || $permission->getSell()) {
	    $this->load->model('inventory_model');
	    $data['item_details'] = $this->inventory_model->get_item_details($this->uri->segment(3));

	    $data['supplier'] = $this->inventory_model->get_supplier_details(
		$data['item_details'][0]['item_supplier_id']
	    );

	    $data['manufacturer'] = $this->inventory_model->get_manufacturer_details(
		$data['item_details'][0]['item_manufacturer_id']
	    );

	    //Calculate how much to order
	    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
	    $data['item_details'][0]['item_order_qty'] = (
		($have < $data['item_details'][0]['item_min']) &&
		(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
		) ? $data['item_details'][0]['item_max'] - $have : 0;

	    $data['page_title'] = 'Item Details for Part No. ' . $data['item_details'][0]['item_part_number'];

	    $this->load->view('header', $data);
	    $this->load->view('inventory/item_details', $data);
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

    public function edit_item_details() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
	    $this->load->model('inventory_model');
	    $data['item_details'] = $this->inventory_model->get_item_details($this->uri->segment(3));

	    $data['supplier'] = $this->inventory_model->get_supplier_details(
		$data['item_details'][0]['item_supplier_id']
	    );

	    $data['manufacturer'] = $this->inventory_model->get_manufacturer_details(
		$data['item_details'][0]['item_manufacturer_id']
	    );

	    //get all suppliers for this client
	    $data['all_suppliers'] = $this->inventory_model->get_all_suppliers(
		$this->session->userdata('user_client_id')
	    );

	    $data['all_manufacturers'] = $this->inventory_model->get_all_manufacturers(
		$this->session->userdata('user_client_id')
	    );

	    //get all manufacturers for this client
	    //Calculate how much to order
	    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
	    $data['item_details'][0]['item_order_qty'] = (
		($have < $data['item_details'][0]['item_min']) &&
		(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
		) ? $data['item_details'][0]['item_max'] - $have : 0;

	    $data['page_title'] = 'Edit Item Details for Part No. ' . $data['item_details'][0]['item_part_number'];

	    $this->load->view('header', $data);
	    $this->load->view('inventory/edit_item_details', $data);
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

    function update_item_details() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
	    $this->form_validation->set_rules('item_description', 'Description', 'trim|required|min_length[25]');
	    $this->form_validation->set_rules('item_uom', 'Unit of Measure', 'trim|required|min_length[1]|max_length[3]');
	    $this->form_validation->set_rules('item_stock', 'In Stock', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_on_order', 'On Order', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_min', 'Item Min', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_max', 'Item Max', 'trim|required|numeric|callback_check_equal_less');
	    $this->form_validation->set_rules('item_min_order', 'Min Order', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_site', 'Item Site', 'trim|required');
	    $this->form_validation->set_rules('item_location', 'Item Location', 'trim|required');
	    $this->form_validation->set_rules('item_cost', 'Item Cost', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_msrp', 'Item MSRP', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_price', 'Item Price', 'trim|required|numeric');

	    $data = array();
	    $this->load->model('inventory_model');

	    //get item details
	    $data['item_details'] = $this->inventory_model->get_item_details($_POST['item_part_number']);

	    if ($this->form_validation->run()) {
		//update data
		if ($this->inventory_model->update_item_details()) {
		    //get supplier details
		    $data['supplier'] = $this->inventory_model->get_supplier_details(
			$data['item_details'][0]['item_supplier_id']
		    );

		    //get manufacturer details
		    $data['manufacturer'] = $this->inventory_model->get_manufacturer_details(
			$data['item_details'][0]['item_manufacturer_id']
		    );

		    //Calculate how much to order
		    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
		    $data['item_details'][0]['item_order_qty'] = (
			($have < $data['item_details'][0]['item_min']) &&
			(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
			) ? $data['item_details'][0]['item_max'] - $have : 0;
		}

		self::refresh_item_details();
	    } else {
		$data['supplier'] = $this->inventory_model->get_supplier_details(
		    $data['item_details'][0]['item_supplier_id']
		);

		$data['manufacturer'] = $this->inventory_model->get_manufacturer_details(
		    $data['item_details'][0]['item_manufacturer_id']
		);

		//get all suppliers for this client
		$data['all_suppliers'] = $this->inventory_model->get_all_suppliers(
		    $this->session->userdata('user_client_id')
		);

		$data['all_manufacturers'] = $this->inventory_model->get_all_manufacturers(
		    $this->session->userdata('user_client_id')
		);

		$data['page_title'] = 'Edit Item Details';

		$this->load->view('header', $this->session->userdata('authenticated'));
		$this->load->view('inventory/edit_item_details', $data);
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

    function refresh_item_details() {
	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
	    $this->load->model('inventory_model');

	    //get item details
	    $data['item_details'] = $this->inventory_model->get_item_details($_POST['item_part_number']);

	    //get supplier details
	    $data['supplier'] = $this->inventory_model->get_supplier_details(
		$data['item_details'][0]['item_supplier_id']
	    );

	    //get manufacturer details
	    $data['manufacturer'] = $this->inventory_model->get_manufacturer_details(
		$data['item_details'][0]['item_manufacturer_id']
	    );

	    //Calculate how much to order
	    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
	    $data['item_details'][0]['item_order_qty'] = (
		($have < $data['item_details'][0]['item_min']) &&
		(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
		) ? $data['item_details'][0]['item_max'] - $have : 0;

	    $data['page_title'] = 'Item Details';

	    $this->load->view('header', $data);
	    $this->load->view('inventory/item_details', $data);
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

    function create_item() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
	    $this->load->view('header', $this->session->userdata('authenticated'));
	    $this->load->view('inventory/new_item_details');
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

    function insert_new_item() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {

	    $this->form_validation->set_rules('item_description', 'Description', 'trim|required|min_length[25]');
	    $this->form_validation->set_rules('part_number', 'Part Number', 'trim|required');
	    $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'trim|required');
	    $this->form_validation->set_rules('item_uom', 'Unit of Measure', 'trim|required|min_length[1]|max_length[3]');
	    $this->form_validation->set_rules('item_stock', 'In Stock', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_on_order', 'On Order', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_min', 'Item Min', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_max', 'Item Max', 'trim|required|numeric|callback_check_equal_less');
	    $this->form_validation->set_rules('item_min_order', 'Min Order', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_site', 'Item Site', 'trim|required');
	    $this->form_validation->set_rules('item_location', 'Item Location', 'trim|required');
	    $this->form_validation->set_rules('item_cost', 'Item Cost', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_msrp', 'Item MSRP', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_price', 'Item Price', 'trim|required|numeric');

	    if ($this->form_validation->run()) {
		//update data
		$data = array();
		$this->load->model('inventory_model');

		if ($this->inventory_model->update_item_details()) {
		    $data['item_details'] = $this->inventory_model->get_item_details($_POST['item_part_number']);

		    //Calculate how much to order
		    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
		    $data['item_details'][0]['item_order_qty'] = (
			($have < $data['item_details'][0]['item_min']) &&
			(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
			) ? $data['item_details'][0]['item_max'] - $have : 0;

		    $data['page_title'] = 'Item Details';

		    $this->load->view('header', $data);
		    $this->load->view('inventory/item_details', $data);
		    $this->load->view('footer');
		}
	    } else {
		//show error message on form
		$this->load->view('header', $this->session->userdata('authenticated'));
		$this->load->view('inventory/new_item_details');
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

    public function check_equal_less() {
	if (isset($_POST['item_max']) && isset($_POST['item_min']) && ($_POST['item_max'] <= $_POST['item_min'])) {
	    $this->form_validation->set_message('check_equal_less', 'Item Max cannot be less than Item Min');
	    return false;
	} else {
	    return true;
	}

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }

    public function search_po() {
        
        //get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getReceive()) {
        
            $data['page_title'] = 'Search Purchase Order';

            $this->load->view('header', $data);
            $this->load->view('inventory/po_search_form');
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

    public function get_po() {
        
        //get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getReceive()) {

            if (empty($_POST['po_number'])) {
                $data['error_message'] = 'Enter a PO number';

                $this->load->view('header', $data);
                $this->load->view('inventory/po_search_form');
                $this->load->view('footer');
                return;
            }

            if (!is_numeric($_POST['po_number'])) {
                $data['error_message'] = 'PO number must be numeric';

                $this->load->view('header', $data);
                $this->load->view('inventory/po_search_form');
                $this->load->view('footer');
                return;
            }

            $luhn_check = self::luhn_check($_POST['po_number']);

            if (!$luhn_check) {
                $data['error_message'] = 'PO number is invalid';

                $this->load->view('header', $data);
                $this->load->view('inventory/po_search_form');
                $this->load->view('footer');
                return;
            }

            //do a quick check here to see if PO number exists before retrieving the data
            $this->load->model('inventory_model');
            $po_exists = $this->inventory_model->find_po_number($_POST['po_number']);

            if (0 == $po_exists) {
                $data['error_message'] = 'PO number not found';

                $this->load->view('header', $data);
                $this->load->view('inventory/po_search_form');
                $this->load->view('footer');
            } else {
                //get client info
                $this->load->model('client_model');
                $data['client'] = $this->client_model->get_client_information();

                //get po details
                $this->load->model('order_model');
                $data['order_header'] = $this->order_model->get_po_header($_POST['po_number']);
                $data['order_lines'] = $this->order_model->get_po_lines($data['order_header']->getId());

                //get supplier details
                $this->load->model('supplier_model');
                $data['supplier'] = $this->supplier_model->get_supplier_from_po($_POST['po_number']);

                $data['po_number'] = $_POST['po_number'];
                $data['page_title'] = 'Purchase Order # ' . $_POST['po_number'];

                //load the view
                $this->load->view('header', $data);
                $this->load->view('inventory/po_search_results', $data);
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

    public function update_po() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getReceive()) {
	    $data['post_data'] = $_POST;

	    $this->load->model('order_model');

	    //this returns true or false, use it to display the proper confirmation
	    $data['updated_po'] = $this->order_model->update_po_information($_POST);

	    if ($data['updated_po']) {
		$data['message'] = 'The PO was successfully updated. Click <a href="' .
		    base_url() . 'index.php/inventory/search_po">HERE</a> ' .
		    'to receive another PO.';

		$this->load->view('header', $data);
		$this->load->view('message/message', $data);
		$this->load->view('footer');
		return;
	    } else {
		$data['message'] = 'PO update failed, Please try again.';

		$this->load->view('header', $data);
		$this->load->view('error/error_page', $data);
		$this->load->view('footer');
		return;
	    }
	} else {

	    $data['message'] = '<p class="text-error">You do not have permission to view this page FOO.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	    return;
	}

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }

    public function luhn_check($number) {

	$sum = 0;
	$alt = false;

	for ($i = strlen($number) - 1; $i >= 0; $i--) {
	    $n = substr($number, $i, 1);
	    if ($alt) {
		//double n
		$n *= 2;
		if ($n > 9) {
		    //calculate remainder
		    $n = ($n % 10) + 1;
		}
	    }
	    $sum += $n;
	    $alt = !$alt;
	}

	//if $sum divides by 10 with no remainder then it's valid
	return ($sum % 10 == 0);

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }
    
    public function export()
    {
        $this->load->model('inventory_model');
        $items = new inventory_model();
        $data['all_inventory'] = $items->export_csv();
        $this->load->view('export_view', $data);
    }

}
