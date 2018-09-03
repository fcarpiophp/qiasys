<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order_lines
 *
 * @author Francisco
 */
class order_lines extends CI_Model {

    private $supplier_id;
    private $supplier_name;
    private $item_site;
    private $item_id;
    private $item_part_number;
    private $item_description;
    private $item_order_qty;
    private $item_cost;

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

    public function get_item_site() {
	return $this->item_site;
    }

    public function set_item_site($item_site) {
	$this->item_site = $item_site;
    }

    public function get_item_id() {
	return $this->item_id;
    }

    public function set_item_id($item_id) {
	$this->item_id = $item_id;
    }

    public function get_item_part_number() {
	return $this->item_part_number;
    }

    public function set_item_part_number($item_part_number) {
	$this->item_part_number = $item_part_number;
    }

    public function get_item_description() {
	return $this->item_description;
    }

    public function set_item_description($item_description) {
	$this->item_description = $item_description;
    }

    public function get_item_order_qty() {
	return $this->item_order_qty;
    }

    public function set_item_order_qty($item_order_qty) {
	$this->item_order_qty = $item_order_qty;
    }

    public function get_item_cost() {
	return $this->item_cost;
    }

    public function set_item_cost($item_cost) {
	$this->item_cost = $item_cost;
    }

    public function get_item_uom() {
	return $this->item_uom;
    }

    public function set_item_uom($item_uom) {
	$this->item_uom = $item_uom;
    }

    public function get_lines($supplier_id, $item_site, $parts = false) {

	$query = "
            SELECT 
                suppliers.id as supplier_id,
                suppliers.supplier_name,
                items.item_site,
                items.id as item_id,
                items.item_part_number, 
                items.item_description,
                IF(
                    (
                        (items.item_stock + items.item_on_order) < items.item_min
                    ) 
                    AND 
                    (items.item_max - items.item_on_order - items.item_stock) >= items.item_min_order,
                    items.item_max - items.item_on_order - items.item_stock,
                    0
                ) as item_order_qty,
                items.item_cost,
                items.item_uom
            FROM items 
            LEFT JOIN client_supplier_lkup 
                ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN suppliers 
                ON client_supplier_lkup.supplier_id = suppliers.id
            WHERE client_supplier_lkup.client_id = ?
            AND supplier_id = ?
            AND items.item_site = ?
            AND ((items.item_stock + items.item_on_order) < items.item_min)
            AND (items.item_max - items.item_on_order - items.item_stock) >= items.item_min_order
        ";

	$params = array(
	    $this->session->userdata('user_client_id'),
	    $supplier_id,
	    $item_site
	);

	if ($parts) {
	    $query .= "
                AND items.item_part_number IN('" . implode("','", $parts) . "')
            ";
	}

	$query .= "
            ORDER BY items.item_part_number ASC
        ";

	$this->session->set_userdata('get_lines', $query);

	$result = $this->db->query($query, $params);

	if (!$result) {
	    // if query fails
	    $message = "Query failed in order_lines/lines";
	    throw new Exception($message);
	} else {

	    foreach ($result->result() as $row) {

		$line = new order_lines();

		$line->set_supplier_id($row->supplier_id);
		$line->set_supplier_name($row->supplier_name);
		$line->set_item_site($row->item_site);
		$line->set_item_id($row->item_id);
		$line->set_item_part_number($row->item_part_number);
		$line->set_item_description($row->item_description);
		$line->set_item_order_qty($row->item_order_qty);
		$line->set_item_cost($row->item_cost);
		$line->set_item_uom($row->item_uom);

		$lines[] = $line;
	    }
	}

	return $lines;
    }

}
