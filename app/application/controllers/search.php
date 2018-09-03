<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author Francisco
 */
class search extends CI_Controller {

    function index() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getSearch() || 
            $permission->getInventory() || $permission->getProposal()) {

	    $data['page_title'] = 'Search';

	    $this->load->view('header', $data);
	    $this->load->view('search/search_inventory_form');
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

    function search_inventory() {
	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getSearch() || 
            $permission->getInventory() || $permission->getProposal()) {
	    if (!$this->input->post('item_part_number') and ! $this->input->post('item_description') and ! $this->input->post('supplier_name') and ! $this->input->post('item_site') and ! $this->input->post('general')
	    ) {
		$data['error_message'] = "At least one search field must be filled in";
		$this->load->view('header', $this->session->userdata('authenticated'));
		$this->load->view('search/search_inventory_form', $data);
		$this->load->view('footer');
	    } else {
		//get the data from the model
		$this->load->model('search_model');
		$data['search_results'] = $this->search_model->search_item($permission);

		$part = null;

		foreach ($data['search_results'] as $line) {
		    if (is_null($part))
			$part = $line->getItemPartNumber();
		}

		$data['page_title'] = 'Search Results';

		if (is_null($part)) {
		    $data['msg'] = 'No results match your search, click <a href="'.base_url().'index.php/search">HERE</a> to search again.';
		    $this->load->view('header', $data);
		    $this->load->view('message', $data);
		    $this->load->view('footer');
		    return;
		} else {
		    //load the views
		    $this->load->view('header', $data);
		    $this->load->view('search/search_results', $data);
		    $this->load->view('footer');
		    return;
		}
	    }
	} else {

	    $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	    return;
	}

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }

    function item_details() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getSearch()) {

	    $this->load->model('inventory_model');
	    $data['item_details'] = $this->inventory_model->get_item_details($this->uri->segment(3));

	    //Calculate how much to order
	    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
	    $data['item_details'][0]['item_order_qty'] = (
		($have < $data['item_details'][0]['item_min']) &&
		(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
		) ? $data['item_details'][0]['item_max'] - $have : 0;

	    $this->load->view('header', $this->session->userdata('authenticated'));
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

    function edit_item_details() {

	//get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

	if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
	    $this->load->model('inventory_model');
	    $data['item_details'] = $this->inventory_model->get_item_details($this->uri->segment(3));

	    //Calculate how much to order
	    $have = $data['item_details'][0]['item_stock'] + $data['item_details'][0]['item_on_order'];
	    $data['item_details'][0]['item_order_qty'] = (
		($have < $data['item_details'][0]['item_min']) &&
		(($data['item_details'][0]['item_max'] - $data['item_details'][0]['item_min']) > $data['item_details'][0]['item_min_order'])
		) ? $data['item_details'][0]['item_max'] - $have : 0;

	    $this->load->view('header', $this->session->userdata('authenticated'));
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
	    $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'trim|required');
	    $this->form_validation->set_rules('item_uom', 'Unit of Measure', 'trim|required|min_length[1]|max_length[3]');
	    $this->form_validation->set_rules('item_stock', 'In Stock', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_on_order', 'On Order', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_min', 'Item Min', 'trim|required|numeric');
	    $this->form_validation->set_rules('item_max', 'Item Max', 'trim|required|numeric');
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

		    $this->load->view('header', $this->session->userdata('authenticated'));
		    $this->load->view('inventory/item_details', $data);
		    $this->load->view('footer');
		}
	    } else {
		//show error message on form
		$this->load->view('header', $this->session->userdata('authenticated'));
		$this->load->view('inventory/edit_item_details');
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

?>
