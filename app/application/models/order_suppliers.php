<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of purchase_order
 *
 * @author Francisco
 */
class order_suppliers extends CI_Model {

    private $supplier_id;
    private $supplier_name;
    private $supplier_add_1;
    private $supplier_add_2;
    private $supplier_city;
    private $supplier_state;
    private $supplier_zip;
    private $supplier_phone;
    private $supplier_fax;
    private $supplier_email;
    private $supplier_rep;
    private $supplier_rep_email;
    private $supplier_rep_phone;
    private $supplier_rep_fax;
    private $item_site;

    public function get_supplier_id() {
	return $this->supplier_id;
    }

    public function set_supplier_id($supplier_id) {
	$this->supplier_id = $supplier_id;
    }

    public function get_supplier_name() {
	return $this->supplier_name;
    }

    public function set_supplier_name($supplier_name) {
	$this->supplier_name = $supplier_name;
    }

    public function get_supplier_add_1() {
	return $this->supplier_add_1;
    }

    public function set_supplier_add_1($supplier_add_1) {
	$this->supplier_add_1 = $supplier_add_1;
    }

    public function get_supplier_add_2() {
	return $this->supplier_add_2;
    }

    public function set_supplier_add_2($supplier_add_2) {
	$this->supplier_add_2 = $supplier_add_2;
    }

    public function get_supplier_city() {
	return $this->supplier_city;
    }

    public function set_supplier_city($supplier_city) {
	$this->supplier_city = $supplier_city;
    }

    public function get_supplier_state() {
	return $this->supplier_state;
    }

    public function set_supplier_state($supplier_state) {
	$this->supplier_state = $supplier_state;
    }

    public function get_supplier_zip() {
	return $this->supplier_zip;
    }

    public function set_supplier_zip($supplier_zip) {
	$this->supplier_zip = $supplier_zip;
    }

    public function get_supplier_phone() {
	return $this->supplier_phone;
    }

    public function set_supplier_phone($supplier_phone) {
	$this->supplier_phone = $supplier_phone;
    }

    public function get_supplier_fax() {
	return $this->supplier_fax;
    }

    public function set_supplier_fax($supplier_fax) {
	$this->supplier_fax = $supplier_fax;
    }

    public function get_supplier_email() {
	return $this->supplier_email;
    }

    public function set_supplier_email($supplier_email) {
	$this->supplier_email = $supplier_email;
    }

    public function get_supplier_rep() {
	return $this->supplier_rep;
    }

    public function set_supplier_rep($supplier_rep) {
	$this->supplier_rep = $supplier_rep;
    }

    public function get_supplier_rep_email() {
	return $this->supplier_rep_email;
    }

    public function set_supplier_rep_email($supplier_rep_email) {
	$this->supplier_rep_email = $supplier_rep_email;
    }

    public function get_supplier_rep_phone() {
	return $this->supplier_rep_phone;
    }

    public function set_supplier_rep_phone($supplier_rep_phone) {
	$this->supplier_rep_phone = $supplier_rep_phone;
    }

    public function get_supplier_rep_fax() {
	return $this->supplier_rep_fax;
    }

    public function set_supplier_rep_fax($supplier_rep_fax) {
	$this->supplier_rep_fax = $supplier_rep_fax;
    }

    public function get_item_site() {
	return $this->item_site;
    }

    public function set_item_site($item_site) {
	$this->item_site = $item_site;
    }

    public function get_order_lines() {
	return $this->order_lines;
    }

    public function set_order_lines(array $order_lines) {
	$this->order_lines = $order_lines;
    }

    public function get_supplier_information($parts = false) {

	$suppliers = array();

	$query = "
            SELECT 
                suppliers.id as supplier_id,
                suppliers.supplier_name,
                suppliers.supplier_add_1,
                suppliers.supplier_add_2,
                suppliers.supplier_city,
                suppliers.supplier_state,
                suppliers.supplier_zip,
                suppliers.supplier_phone,
                suppliers.supplier_fax,
                suppliers.supplier_email,
                suppliers.supplier_rep,
                suppliers.supplier_rep_email,
                suppliers.supplier_rep_phone,
                suppliers.supplier_rep_fax,
                items.item_site
            FROM items 
            LEFT JOIN client_supplier_lkup 
                ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN suppliers 
                ON client_supplier_lkup.supplier_id = suppliers.id
            WHERE client_supplier_lkup.client_id = ?
            AND ((items.item_stock + items.item_on_order) < items.item_min)
            AND (items.item_max - items.item_on_order - items.item_stock) >= items.item_min_order
            ";

	$params = array();
	$params[] = $this->session->userdata('user_client_id');

	if ($parts) {
	    $query .= "
                AND items.item_part_number IN('" . implode("','", $parts) . "')
            ";
	}

	$query .= "
            GROUP BY suppliers.supplier_name, items.item_site
            ORDER BY suppliers.supplier_name, items.item_site ASC
        ";

	$this->session->set_userdata('get_supplier_information', $query);

	$result = $this->db->query($query, $params);

	if (!$result) {
	    // if query fails
	    $message = "Query failed in purchase_order/get_suppliers";
	    throw new Exception($message);
	} else {

	    foreach ($result->result() as $row) {

		$supplier = new order_suppliers();

		$supplier->set_supplier_id($row->supplier_id);
		$supplier->set_supplier_name($row->supplier_name);
		$supplier->set_supplier_add_1($row->supplier_add_1);
		$supplier->set_supplier_add_2($row->supplier_add_2);
		$supplier->set_supplier_city($row->supplier_city);
		$supplier->set_supplier_state($row->supplier_state);
		$supplier->set_supplier_zip($row->supplier_zip);
		$supplier->set_supplier_phone($row->supplier_phone);
		$supplier->set_supplier_fax($row->supplier_fax);
		$supplier->set_supplier_email($row->supplier_email);
		$supplier->set_supplier_rep($row->supplier_rep);
		$supplier->set_supplier_rep_email($row->supplier_rep_email);
		$supplier->set_supplier_rep_phone($row->supplier_rep_phone);
		$supplier->set_supplier_rep_fax($row->supplier_rep_fax);
		$supplier->set_item_site($row->item_site);

		$suppliers[] = $supplier;
	    }
	}

	return $suppliers;
    }
}
