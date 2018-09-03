<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of quote_line
 *
 * @author fcarpio
 */
class quote_line extends CI_Model {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var int
     */
    private $quote_header_id;
    
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
    public function getQuote_header_id() {
	return $this->quote_header_id;
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
     * @param int $quote_header_id
     */
    public function setQuote_header_id($quote_header_id) {
	$this->quote_header_id = $quote_header_id;
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
}
