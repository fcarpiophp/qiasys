<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class customer extends CI_Controller {

    public function customer_search($error_message = '') {
	$data['error_message'] = $error_message;
	// get data for autocomplete
	$this->load->model('autocomplete_model');
	$information = new autocomplete_model();
	$data['emails'] = $information->get_email_address();
	$data['phone_numbers'] = $information->get_phone_numbers();

	$data['page_title'] = 'Search Customers';
	//load the views
	$this->load->view('header', $data);
	$this->load->view('customer/customer_search', $data);
	$this->load->view('footer');

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }

    public function process_search() {
	
	$data['error_message'] = '';

	if (empty($_POST['email']) || empty($_POST['phone'])) {

	    $data['error_message'] = 'Email address or phone number are required fields';

	    self::customer_search($data['error_message']);
	    return;
	}

	$this->load->model('customer_model');
	$customer = new customer_model();

	if ('submit' == $_POST['action']) {

	    $insert_id = $customer->add_update_customer();
	} elseif ('search' == $_POST['action']) {

	    $data['orders'] = $customer->search_orders();
	} else {
	    die('nothing');
	}
	
	$insert_id = !isset($insert_id) ? 0: $insert_id;

	if (isset($data['orders']) && !empty($data['orders'])) {

	    //pagination start
	    //$this->load->library('pagination');
	    //$config['base_url'] = base_url() . 'index.php/customer/process_search';
	    //$config['total_rows'] = count($data['orders']);
	    //$config['per_page'] = ITEMS_PER_PAGE;
	    //$this->pagination->initialize($config);
	    //$data['pagination_links'] = $this->pagination->create_links();
	    //pagination end

	    $data['page_title'] = 'Search Customers';
	    //load the views
	    $this->load->view('header', $data);
	    $this->load->view('customer/customer_search_results', $data);
	    $this->load->view('footer');
	} elseif ($insert_id > 0) {

	    $data['message'] = '<p class="text-success">The Customer information was successfully updated.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	} else {

	    $data['message'] = '<p class="text-error">No transactions found, change search parameters and try again.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	}

	if ('localhost' == $_SERVER['SERVER_NAME']) {
	    $this->output->enable_profiler(TRUE);
	}
    }

    public function view_details() {
	
	if(empty($_POST['sale_id'])) {
	    $data['message'] = '<p class="text-error">No sale transaction found.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	} else {
	    
	    $this->load->model('sale_header');
	    $sale = new sale_header();
	    
	    $data['header_details'] = $sale->getSaleBySaleId($_POST['sale_id']);
	    
	    $data['page_title'] = 'Details for Sale No. '.$_POST['sale_id'];
	    //load the views
	    $this->load->view('header', $data);
	    $this->load->view('customer/sale', $data);
	    $this->load->view('footer');
	}
    }

}
