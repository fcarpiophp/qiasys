<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sale_header
 *
 * @author fcarpio
 */
class sale_header extends CI_Model {
    
    
    private $id;
    private $sale_id_number;
    private $sold_to_email;
    private $sold_to_phone;
    private $sale_client_id;
    private $sale_user_id;
    private $sale_customer_id;
    private $sale_date;
    private $sold_by;
    private $lines;
    private $first_name;
    private $last_name;
    private $client_name;
    private $client_add_1;
    private $client_add_2;
    private $client_city;
    private $client_state;
    private $client_zip;
    private $client_phone;
    private $client_fax;
    private $client_email;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zip;
    private $email;
    private $phone;
    private $user_site;
    
    public function getUser_site() {
	return $this->user_site;
    }

    public function setUser_site($user_site) {
	$this->user_site = $user_site;
    }

    public function getAddress1() {
	return $this->address1;
    }

    public function getAddress2() {
	return $this->address2;
    }

    public function getCity() {
	return $this->city;
    }

    public function getState() {
	return $this->state;
    }

    public function getZip() {
	return $this->zip;
    }

    public function getEmail() {
	return $this->email;
    }

    public function getPhone() {
	return $this->phone;
    }

    public function setAddress1($address1) {
	$this->address1 = $address1;
    }

    public function setAddress2($address2) {
	$this->address2 = $address2;
    }

    public function setCity($city) {
	$this->city = $city;
    }

    public function setState($state) {
	$this->state = $state;
    }

    public function setZip($zip) {
	$this->zip = $zip;
    }

    public function setEmail($email) {
	$this->email = $email;
    }

    public function setPhone($phone) {
	$this->phone = $phone;
    }

    public function getClient_name() {
	return $this->client_name;
    }

    public function getClient_add_1() {
	return $this->client_add_1;
    }

    public function getClient_add_2() {
	return $this->client_add_2;
    }

    public function getClient_city() {
	return $this->client_city;
    }

    public function getClient_state() {
	return $this->client_state;
    }

    public function getClient_zip() {
	return $this->client_zip;
    }

    public function getClient_phone() {
	return $this->client_phone;
    }

    public function getClient_fax() {
	return $this->client_fax;
    }

    public function getClient_email() {
	return $this->client_email;
    }

    public function setClient_name($client_name) {
	$this->client_name = $client_name;
    }

    public function setClient_add_1($client_add_1) {
	$this->client_add_1 = $client_add_1;
    }

    public function setClient_add_2($client_add_2) {
	$this->client_add_2 = $client_add_2;
    }

    public function setClient_city($client_city) {
	$this->client_city = $client_city;
    }

    public function setClient_state($client_state) {
	$this->client_state = $client_state;
    }

    public function setClient_zip($client_zip) {
	$this->client_zip = $client_zip;
    }

    public function setClient_phone($client_phone) {
	$this->client_phone = $client_phone;
    }

    public function setClient_fax($client_fax) {
	$this->client_fax = $client_fax;
    }

    public function setClient_email($client_email) {
	$this->client_email = $client_email;
    }

    public function getFirst_name() {
	return $this->first_name;
    }

    public function getLast_name() {
	return $this->last_name;
    }

    public function setFirst_name($first_name) {
	$this->first_name = $first_name;
    }

    public function setLast_name($last_name) {
	$this->last_name = $last_name;
    }

    public function get_id() {
	return $this->id;
    }
    
    public function getSale_id_number() {
	return $this->sale_id_number;
    }

    public function getSold_to_email() {
	return $this->sold_to_email;
    }

    public function getSold_to_phone() {
	return $this->sold_to_phone;
    }

    public function getSale_client_id() {
	return $this->sale_client_id;
    }

    public function getSale_user_id() {
	return $this->sale_user_id;
    }

    public function getSale_customer_id() {
	return $this->sale_customer_id;
    }

    public function getSale_date() {
	return date('F j, Y',strtotime($this->sale_date));
    }

    public function getSold_by() {
	return $this->sold_by;
    }

    public function getLines() {
	return $this->lines;
    }

    public function set_id($id) {
	$this->id = $id;
    }
    
    public function setSale_id_number($sale_id_number) {
	$this->sale_id_number = $sale_id_number;
    }

    public function setSold_to_email($sold_to_email) {
	$this->sold_to_email = $sold_to_email;
    }

    public function setSold_to_phone($sold_to_phone) {
	$this->sold_to_phone = $sold_to_phone;
    }

    public function setSale_client_id($sale_client_id) {
	$this->sale_client_id = $sale_client_id;
    }

    public function setSale_user_id($sale_user_id) {
	$this->sale_user_id = $sale_user_id;
    }

    public function setSale_customer_id($sale_customer_id) {
	$this->sale_customer_id = $sale_customer_id;
    }

    public function setSale_date($sale_date) {
	$this->sale_date = $sale_date;
    }

    public function setSold_by($sold_by) {
	$this->sold_by = $sold_by;
    }

    public function setLines(array $lines) {
	$this->lines = $lines;
    }

    /**
     * 
     * @param string $email
     * @param string $phone
     * @return \sale_header|boolean
     */
    public function getSales($email = '', $phone = '') {

	$query =
	      'SELECT '
	    . 'sale_header.id, sale_header.sale_id_number, sale_header.sold_to_email, sale_header.sold_to_phone, '
	    . 'sale_header.sale_client_id, sale_header.sale_user_id, sale_header.sale_customer_id, '
	    . 'sale_date_created, sale_created_by, customers.first_name, customers.last_name '
	    . 'FROM '
	    . 'sale_header '
	    . 'LEFT JOIN customers ON customers.id = sale_header.sale_customer_id '
	    . 'WHERE ';
	
	if (!empty($email) && !empty($phone)) {
	    $query .= 'sold_to_email = ? OR sold_to_phone = ?';
	    $params = array($email, $phone);
	} elseif (!empty($email) && empty($phone)) {
	    $query .= 'sold_to_email = ?';
	    $params = array($email);
	} elseif (empty($email) && !empty($phone)) {
	    $query .= 'sold_to_phone = ?';
	    $params = array($phone);
	} else {
	    return false;
	}
	
	$query .= ' ORDER BY sale_date_created DESC';
	
	$result = $this->db->query($query, $params);
	
	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return;
	} else {
	    
	    $this->load->model('sale_line');
	    $lines = new sale_line();
	    $headers = array();
	    
	    foreach ($result->result() as $row) {
		
		$header = new sale_header();
		
		$header->set_id($row->id);
		$header->setSale_id_number($row->sale_id_number);
		$header->setSold_to_email($row->sold_to_email);
		$header->setSold_to_phone($row->sold_to_phone);
		$header->setSale_client_id($row->sale_client_id);
		$header->setSale_user_id($row->sale_user_id);
		$header->setSale_customer_id($row->sale_customer_id);
		$header->setSale_date($row->sale_date_created);
		$header->setSold_by($row->sale_created_by);
		$header->setFirst_name($row->first_name);
		$header->setLast_name($row->last_name);
		
		$header->setLines($lines->get_lines($row->id));
		
		$headers[] = $header;
	    }
	}
	
	return $headers;
    }
    
    /**
     * 
     * @param int $sale_id
     * @return \sale_header
     */
    public function getSaleBySaleId($sale_id) {
	$query =
	      'SELECT '
	    . 'sale_header.id, sale_header.sale_id_number, sale_header.sold_to_email, sale_header.sold_to_phone, '
	    . 'sale_header.sale_client_id, sale_header.sale_user_id, sale_header.sale_customer_id, '
	    . 'sale_date_created, sale_created_by, customers.first_name, customers.last_name, customers.address1, '
	    . 'customers.address2, customers.city, customers.state, customers.zip, customers.email, customers.phone, '
	    . 'clients.client_name, clients.client_add_1, clients.client_add_2, clients.client_city, clients.client_state, '
	    . 'clients.client_zip, clients.client_phone, clients.client_fax, clients.client_email, users.user_site '
	    . 'FROM '
	    . 'sale_header '
	    . 'LEFT JOIN customers ON customers.id = sale_header.sale_customer_id '
	    . 'LEFT JOIN clients ON clients.id = sale_header.sale_client_id '
	    . 'LEFT JOIN users ON users.user_name = sale_header.sale_created_by '
	    . 'WHERE sale_header.sale_id_number = ?';
	
	$params = array($sale_id);
	$result = $this->db->query($query, $params);
	
	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return;
	} else {
	    
	    $this->load->model('sale_line');
	    $lines = new sale_line();
	    $headers = array();
	    
	    foreach ($result->result() as $row) {
		
		$header = new sale_header();
		
		$header->set_id($row->id);
		$header->setSale_id_number($row->sale_id_number);
		$header->setSold_to_email($row->sold_to_email);
		$header->setSold_to_phone($row->sold_to_phone);
		$header->setSale_client_id($row->sale_client_id);
		$header->setSale_user_id($row->sale_user_id);
		$header->setSale_customer_id($row->sale_customer_id);
		$header->setSale_date($row->sale_date_created);
		$header->setSold_by($row->sale_created_by);
		$header->setFirst_name($row->first_name);
		$header->setLast_name($row->last_name);
		$header->setClient_name($row->client_name);
		$header->setClient_add_1($row->client_add_1);
		$header->setClient_add_2($row->client_add_2);
		$header->setClient_city($row->client_city);
		$header->setClient_state($row->client_state);
		$header->setClient_zip($row->client_zip);
		$header->setClient_phone($row->client_phone);
		$header->setClient_fax($row->client_fax);
		$header->setClient_email($row->client_email);
		$header->setAddress1($row->address1);
		$header->setAddress2($row->address2);
		$header->setCity($row->city);
		$header->setState($row->state);
		$header->setZip($row->zip);
		$header->setEmail($row->email);
		$header->setPhone($row->phone);
		$header->setUser_site($row->user_site);
		
		$header->setLines($lines->get_lines($row->id));
		
		$headers = $header;
	    }
	}
	
	return $headers;
    }
}
