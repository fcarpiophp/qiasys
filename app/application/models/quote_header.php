<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of quote_header
 *
 * @author fcarpio
 */
class quote_header extends CI_Model {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $name;
    
    /**
     *
     * @var int
     */
    private $client_id;
    
    /**
     *
     * @var int
     */
    private $user_id;
    
    /**
     *
     * @var int
     */
    private $customer_id;
    
    /**
     *
     * @var bool
     */
    private $is_active;
    
    /**
     *
     * @var date
     */
    private $created_on;
    
    
    /**
     *
     * @var string
     */
    private $created_by;
    
    /**
     *
     * @var date
     */
    private $modified_on;
    
    /**
     *
     * @var string
     */
    private $modified_by;
    
    /**
     *
     * @var quote_line 
     */
    private $quote_line;
    
    /**
     * 
     * @return int
     */
    public function getId() {
	return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getName() {
	return $this->name;
    }

    /**
     * 
     * @return int
     */
    public function getClient_id() {
	return $this->client_id;
    }

    /**
     * 
     * @return int
     */
    public function getUser_id() {
	return $this->user_id;
    }

    /**
     * 
     * @return int
     */
    public function getCustomer_id() {
	return $this->customer_id;
    }

    /**
     * 
     * @return bool
     */
    public function getIs_active() {
	return $this->is_active;
    }

    /**
     * 
     * @return date
     */
    public function getCreated_on() {
	return $this->created_on;
    }

    /**
     * 
     * @return string
     */
    public function getCreated_by() {
	return $this->created_by;
    }

    /**
     * 
     * @return date
     */
    public function getModified_on() {
	return $this->modified_on;
    }

    /**
     * 
     * @return string
     */
    public function getModified_by() {
	return $this->modified_by;
    }
    
    /**
     * 
     * @return quote_line 
     */
    public function getQuoteLine() {
	return $this->quote_line ;
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
     * @param string $name
     */
    public function setName($name) {
	$this->name = $name;
    }

    /**
     * 
     * @param int $client_id
     */
    public function setClient_id($client_id) {
	$this->client_id = $client_id;
    }

    /**
     * 
     * @param int $user_id
     */
    public function setUser_id($user_id) {
	$this->user_id = $user_id;
    }

    /**
     * 
     * @param int $customer_id
     */
    public function setCustomer_id($customer_id) {
	$this->customer_id = $customer_id;
    }

    /**
     * 
     * @param bool $is_active
     */
    public function setIs_active($is_active) {
	$this->is_active = $is_active;
    }

    /**
     * 
     * @param date $created_on
     */
    public function setCreated_on(date $created_on) {
	$this->created_on = $created_on;
    }

    /**
     * 
     * @param string $created_by
     */
    public function setCreated_by($created_by) {
	$this->created_by = $created_by;
    }

    /**
     * 
     * @param date $modified_on
     */
    public function setModified_on(date $modified_on) {
	$this->modified_on = $modified_on;
    }

    /**
     * 
     * @param string $modified_by
     */
    public function setModified_by($modified_by) {
	$this->modified_by = $modified_by;
    }
    
    /**
     * 
     * @param quote_line $quote_line
     */
    public function setQuoteLine(quote_line $quote_line) {
	$this->quote_line = quote_line;
    }
}
