<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sale_line
 *
 * @author fcarpio
 */
class sale_line extends CI_Model {

    private $sale_line_number;
    private $item_description;
    private $item_part_number;
    private $qty_sold;
    private $sale_header_id;
    private $sale_line_created;
    private $sale_line_created_by;
    private $sell_price;

    public function getSale_line_number() {
	return $this->sale_line_number;
    }

    public function getItem_description() {
	return $this->item_description;
    }

    public function getItem_part_number() {
	return $this->item_part_number;
    }

    public function getQty_sold() {
	return $this->qty_sold;
    }

    public function getSale_header_id() {
	return $this->sale_header_id;
    }

    public function getSale_line_created() {
	return date('F j, Y',strtotime($this->sale_line_created));
    }

    public function getSale_line_created_by() {
	return $this->sale_line_created_by;
    }

    public function getSell_price() {
	return $this->sell_price;
    }

    public function setSale_line_number($sale_line_number) {
	$this->sale_line_number = $sale_line_number;
    }

    public function setItem_description($item_description) {
	$this->item_description = $item_description;
    }

    public function setItem_part_number($item_part_number) {
	$this->item_part_number = $item_part_number;
    }

    public function setQty_sold($qty_sold) {
	$this->qty_sold = $qty_sold;
    }

    public function setSale_header_id($sale_header_id) {
	$this->sale_header_id = $sale_header_id;
    }

    public function setSale_line_created($sale_line_created) {
	$this->sale_line_created = $sale_line_created;
    }

    public function setSale_line_created_by($sale_line_created_by) {
	$this->sale_line_created_by = $sale_line_created_by;
    }

    public function setSell_price($sell_price) {
	$this->sell_price = $sell_price;
    }

            
    public function get_lines($sale_header_id) {
	
	$query = 'SELECT '
	    . 'sale_line_number, item_description, item_part_number, qty_sold, '
	    . 'sale_header_id, sale_line_created, sale_line_created_by, sell_price '
	    . 'FROM sale_line '
	    . 'WHERE sale_header_id = ?';
	    
	

	$params = array($sale_header_id);
	
	$query .= 'ORDER BY sale_header_id DESC, sale_line_number ASC';
	
	$result = $this->db->query($query, $params);
	
	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return;
	} else {
	    
	    $lines = array();
	    
	    foreach ($result->result() as $row) {
		
		$line = new sale_line();
		
		$line->setSale_header_id($row->sale_header_id);
		$line->setSale_line_number($row->sale_line_number);
		$line->setItem_description($row->item_description);
		$line->setItem_part_number($row->item_part_number);
		$line->setQty_sold($row->qty_sold);
		$line->setSell_price($row->sell_price);
		$line->setSale_line_created($row->sale_line_created);
		$line->setSale_line_created_by($row->sale_line_created_by);
		
		$lines[] = $line;
	    }
	}
	
	return $lines;
	
    }
}
