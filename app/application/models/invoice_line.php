<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of invoice_line
 *
 * @author fcarpio
 */
class invoice_line extends CI_Model {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var int
     */
    private $invoice_header_id;
    
    /**
     *
     * @var int
     */
    private $line_number;
    
    /**
     *
     * @var string
     */
    private $item_part_number;
    
    /**
     *
     * @var int
     */
    private $item_qty;
    
    /**
     *
     * @var float
     */
    private $item_cost;
    
    /**
     *
     * @var type float
     */
    private $item_price;
    
    /**
     *
     * @var float
     */
    private $item_msrp;
    
    /**
     *
     * @var int
     */
    private $supplier_id;
    
    /**
     *
     * @var int
     */
    private $manufacturer_id;
    
    private $invoiced;
    
    public function getInvoiced() {
        return $this->invoiced;
    }

    public function setInvoiced($invoiced) {
        $this->invoiced = $invoiced;
    }

    /**
     * 
     * @return int
     */
    public function getId() {
	return $this->id;
    }

    /**
     * 
     * @return int
     */
    public function getInvoice_header_id() {
	return $this->invoice_header_id;
    }

    /**
     * 
     * @return int
     */
    public function getLine_number() {
	return $this->line_number;
    }

    /**
     * 
     * @return string
     */
    public function getItem_part_number() {
	return $this->item_part_number;
    }

    
    /**
     * 
     * @return int
     */
    public function getItem_qty() {
	return $this->item_qty;
    }

    /**
     * 
     * @return type float
     */
    public function getItem_cost() {
	return $this->item_cost;
    }

    /**
     * 
     * @return int
     */
    public function getItem_price() {
	return $this->item_price;
    }

    /**
     * 
     * @return float
     */
    public function getItem_msrp() {
	return $this->item_msrp;
    }

    /**
     * 
     * @return int
     */
    public function getSupplier_id() {
	return $this->supplier_id;
    }

    /**
     * 
     * @return int
     */
    public function getManufacturer_id() {
	return $this->manufacturer_id;
    }

    /**
     * 
     * @param int $id
     */
    public function setId($id) {
	$this->id = $id;
    }

    /**
     * 
     * @param int $invoice_header_id
     */
    public function setInvoice_header_id($invoice_header_id) {
	$this->invoice_header_id = $invoice_header_id;
    }

    /**
     * 
     * @param int $line_number
     */
    public function setLine_number($line_number) {
	$this->line_number = $line_number;
    }

    /**
     * 
     * @param string $item_part_number
     */
    public function setItem_part_number($item_part_number) {
	$this->item_part_number = $item_part_number;
    }

    /**
     * 
     * @param int $item_qty
     */
    public function setItem_qty($item_qty) {
	$this->item_qty = $item_qty;
    }

    /**
     * 
     * @param float $item_cost
     */
    public function setItem_cost($item_cost) {
	$this->item_cost = $item_cost;
    }

    /**
     * 
     * @param flost $item_price
     */
    public function setItem_price($item_price) {
	$this->item_price = $item_price;
    }

    /**
     * 
     * @param float $item_msrp
     */
    public function setItem_msrp($item_msrp) {
	$this->item_msrp = $item_msrp;
    }

    /**
     * 
     * @param int $supplier_id
     */
    public function setSupplier_id($supplier_id) {
	$this->supplier_id = $supplier_id;
    }

    /**
     * 
     * @param int $manufacturer_id
     */
    public function setManufacturer_id($manufacturer_id) {
	$this->manufacturer_id = $manufacturer_id;
    }
    
    public function get_invoice_lines($invoice_id) {
        
        $query = 'SELECT '
            . 'invoice_header_id, '
            . 'line_number, '
            . 'item_part_number, '
            . 'item_qty, '
            . 'item_cost, '
            . 'item_price, '
            . 'invoiced, '
            . 'supplier_id, '
            . 'manufacturer_id '
            . 'FROM invoice_line '
            . ''
            . 'WHERE invoice_header_id = ? '
            . 'ORDER BY line_number ASC';
        
        $result = $this->db->query(
	    $query, 
            array(
                $invoice_id
	    )
	);
        
        if (!$result) {
	    // if query returns null
            $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
            $data['msg'] = "Error(".$num.") ".$msg;
	    $this->load->view('db_error', $data);
            return;
        }
        
        $invoice_lines = array();
                
        foreach ($result->result() as $row) {
            
            $invoice_line = new invoice_line();
            
            $invoice_line->setInvoice_header_id($row->invoice_header_id);
            $invoice_line->setLine_number($row->line_number);
            $invoice_line->setItem_part_number($row->item_part_number);
            $invoice_line->setItem_qty($row->item_qty);
            $invoice_line->setItem_cost($row->item_cost);
            $invoice_line->setItem_price($row->item_price);
            $invoice_line->setInvoiced($row->invoiced);
            $invoice_line->setSupplier_id($row->supplier_id);
            $invoice_line->setManufacturer_id($row->manufacturer_id);
            
            $invoice_lines[] = $invoice_line;
        }
        
        return $invoice_lines;
    }
}
