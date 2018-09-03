<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of invoice_header
 *
 * @author fcarpio
 */
class invoice_header extends CI_Model {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var int
     */
    private $invoice_number;
    
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
    private $sent;
    
    /**
     *
     * @var string
     */
    private $sent_to;
    
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
    
    private $client_name;
    private $client_email;
    private $user_first_name;
    private $user_last_name;
    private $user_site;
    private $customer_first_name;
    private $customer_last_name;
    private $customer_email;
    private $customer_phone;  
    private $invoice_status;
    private $invoice_line;
    
    public function getInvoice_lines() {
        return $this->invoice_lines;
    }

    public function setInvoice_lines($invoice_lines) {
        $this->invoice_line = $invoice_lines;
    }
        
    public function getInvoice_status() {
        return $this->invoice_status;
    }
    
    public function setInvoice_status($invoice_status) {
        $this->invoice_status = $invoice_status;
    }
    
    public function getClient_name() {
        return $this->client_name;
    }

    public function getClient_email() {
        return $this->client_email;
    }

    public function getUser_first_name() {
        return $this->user_first_name;
    }

    public function getUser_last_name() {
        return $this->user_last_name;
    }

    public function getUser_site() {
        return $this->user_site;
    }

    public function getCustomer_first_name() {
        return $this->customer_first_name;
    }

    public function getCustomer_last_name() {
        return $this->customer_last_name;
    }

    public function getCustomer_email() {
        return $this->customer_email;
    }

    public function getCustomer_phone() {
        return $this->customer_phone;
    }

    public function setClient_name($client_name) {
        $this->client_name = $client_name;
    }

    public function setClient_email($client_email) {
        $this->client_email = $client_email;
    }

    public function setUser_first_name($user_first_name) {
        $this->user_first_name = $user_first_name;
    }

    public function setUser_last_name($user_last_name) {
        $this->user_last_name = $user_last_name;
    }

    public function setUser_site($user_site) {
        $this->user_site = $user_site;
    }

    public function setCustomer_first_name($customer_first_name) {
        $this->customer_first_name = $customer_first_name;
    }

    public function setCustomer_last_name($customer_last_name) {
        $this->customer_last_name = $customer_last_name;
    }

    public function setCustomer_email($customer_email) {
        $this->customer_email = $customer_email;
    }

    public function setCustomer_phone($customer_phone) {
        $this->customer_phone = $customer_phone;
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
    public function getInvoice_number() {
	return $this->invoice_number;
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
    public function getSent() {
	return $this->sent;
    }
    
    /**
     * 
     * @return string
     */
    public function getSent_to() {
	return $this->sent_to;
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
     * @param int $id
     */
    public function setId($id) {
	$this->id = $id;
    }
    
    /**
     * 
     * @param int $invoice_number
     */
    public function setInvoice_number($invoice_number) {
	$this->invoice_number = $invoice_number;
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
     * @param bool $sent
     */
    public function setSent($sent) {
	$this->sent = $sent;
    }
    
    /**
     * 
     * @param string $sent_to
     */
    public function setSent_to($sent_to) {
	$this->sent_to = $sent_to;
    }

    /**
     * 
     * @param date $created_on
     */
    public function setCreated_on($created_on) {
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
    public function setModified_on($modified_on) {
	$this->modified_on = $modified_on;
    }

    /**
     * 
     * @param string $modified_by
     */
    public function setModified_by($modified_by) {
	$this->modified_by = $modified_by;
    }
    
    public function create_invoice($data) {
	
	$this->db->trans_start();
	
	$hquery  = 'INSERT INTO invoice_header '
	    . '(invoice_number, client_id, user_id, customer_id, is_active, created_on, created_by) '
	    . 'values '
	    . '(?,?,?,?,?,now(),?)';
	
	$this->db->query(
	    $hquery, array(
	    $data['sale_number'],
	    $this->session->userdata('user_client_id'),
	    $this->session->userdata('id'),
	    $data['header_details']->getCustomersId(),
	    true,
	    $this->session->userdata('user_name')
	    )
	);
	
	$inv_head_id = $this->db->insert_id();
	$i = 1;
	
	$lquery = 'INSERT INTO invoice_line 
	    (invoice_header_id, line_number, item_part_number, item_qty, item_cost, item_price, item_msrp, supplier_id, 
            manufacturer_id)
	    values ';
	
	$count = count($data['proposal_items']);
        $this->load->model('item_model');
	
	foreach ($data['proposal_items'] as $item) {
            
            $item_m = new item_model();
            $item_m->instantiateItemFromPartNumber($item['item_part_number']);
            
	    $lquery .= '('
		.$inv_head_id.','
		.$i++.','
		.'"'.$item['item_part_number'].'",'
		.$item['item_qty'].','
                .$item_m->get_item_cost().','
		.$item['item_price'].','
                .$item_m->get_item_msrp().','
		.$item['supplier_id'].','
		.$item['manufacturer_id'].')';
	    
	    if($i <= $count) {
		$lquery .= ',';
	    }
	}
        
        $lquery .= ' ON DUPLICATE KEY UPDATE item_qty = item_qty + ' .$item['item_qty'];
      	
	$this->db->query($lquery);
	
	$this->db->trans_complete();

	if ($this->db->trans_status() === FALSE) {
	    $this->db->trans_rollback();
	    return false;
	} else {
	    $this->db->trans_commit();
	    return true;
	}
    }
    
    public function getInvoiceList($filter_by = 'all') {
        
        $query = 'SELECT '
            . 'invoice_header.id as id, '
            . 'invoice_header.invoice_number as invoice_number, '
            . 'invoice_header.client_id as client_id, '
            . 'invoice_header.user_id as user_id, '
            . 'invoice_header.customer_id as customer_id, '
            . 'invoice_header.is_active as active, '
            . 'invoice_header.created_on as created_on, '
            . 'invoice_header.created_by as created_by, '
            . 'clients.client_name as client_name, '
            . 'clients.client_email as client_email, '
            . 'users.user_first_name as user_first_name, '
            . 'users.user_last_name as user_last_name, '
            . 'users.user_site as user_site, '
            . 'customers.first_name as customer_first_name, '
            . 'customers.last_name as customer_last_name, '
            . 'customers.email as customer_email, '
            . 'customers.phone as customer_phone '
            . 'FROM invoice_header '
            . 'LEFT JOIN clients ON clients.id = invoice_header.client_id '
            . 'LEFT JOIN users ON users.id = invoice_header.user_id '
            . 'LEFT JOIN customers ON customers.id = invoice_header.customer_id '
            . 'WHERE invoice_header.client_id = ? '
            . 'ORDER BY invoice_number DESC';
        
        $result = $this->db->query(
	    $query, 
            array(
                $this->session->userdata('user_client_id')
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
        
        $invoice = array();
                
        foreach ($result->result() as $row) {
            
            $invoice_header = new invoice_header();
            
            $invoice_header->setId($row->id);
            $invoice_header->setInvoice_number($row->invoice_number);
            $invoice_header->setClient_id($row->client_id);
            $invoice_header->setCustomer_id($row->customer_id);
            $invoice_header->setIs_active($row->active);
            $invoice_header->setCreated_on($row->created_on);
            $invoice_header->setCreated_by($row->created_by);
            $invoice_header->setClient_name($row->client_name);
            $invoice_header->setClient_email($row->client_email);
            $invoice_header->setUser_first_name($row->user_first_name);
            $invoice_header->setUser_last_name($row->user_last_name);
            $invoice_header->setUser_site($row->user_site);
            $invoice_header->setCustomer_first_name($row->customer_first_name);
            $invoice_header->setCustomer_last_name($row->customer_last_name);
            $invoice_header->setCustomer_email($row->customer_email);
            $invoice_header->setCustomer_phone($row->customer_phone);
            $invoice_header->setInvoice_status($this->get_invoice_status($invoice_header));
            
            $invoice[] = $invoice_header;
        }
        
        return $invoice;
    }
    
    public function get_invoice_status(invoice_header $invoice_header) {
        
        $query = 'SELECT count(invoiced) as inv_count FROM invoice_line WHERE invoice_header_id = ?';
        $result = $this->db->query($query, array($invoice_header->getId()));
        
        foreach ($result->result() as $row) {
            $count = $row->inv_count;
        }
        
        
        $query = 'SELECT sum(invoiced) as inv_sum FROM invoice_line WHERE invoice_header_id = ?';
        $result = $this->db->query($query, array($invoice_header->getId()));
        
        foreach ($result->result() as $row) {
            $sum = $row->inv_sum;
        }
        
        if($count == $sum) {
            $invoice_status = 'Closed';
        } elseif($sum == 0) {
            $invoice_status = 'Open';
        } elseif(($sum > 0) && ($count > $sum)){
            $invoice_status = 'Partial';
        } else {
            $invoice_status = 'Unknown';
        }
        
        return $invoice_status;
    }
    
    public function get_invoice_details($invoice_number) {
        
        $query = 'SELECT '
            . 'invoice_header.id as id, '
            . 'invoice_header.invoice_number as invoice_number, '
            . 'invoice_header.client_id as client_id, '
            . 'invoice_header.user_id as user_id, '
            . 'invoice_header.customer_id as customer_id, '
            . 'invoice_header.is_active as active, '
            . 'invoice_header.created_on as created_on, '
            . 'invoice_header.created_by as created_by, '
            . 'clients.client_name as client_name, '
            . 'clients.client_email as client_email, '
            . 'users.user_first_name as user_first_name, '
            . 'users.user_last_name as user_last_name, '
            . 'users.user_site as user_site, '
            . 'customers.first_name as customer_first_name, '
            . 'customers.last_name as customer_last_name, '
            . 'customers.email as customer_email, '
            . 'customers.phone as customer_phone '
            . 'FROM invoice_header '
            . 'LEFT JOIN clients ON clients.id = invoice_header.client_id '
            . 'LEFT JOIN users ON users.id = invoice_header.user_id '
            . 'LEFT JOIN customers ON customers.id = invoice_header.customer_id '
            . 'WHERE invoice_header.client_id = ? AND invoice_header.invoice_number = ? '
            . 'ORDER BY invoice_number DESC';
        
        $result = $this->db->query(
	    $query, 
            array(
                $this->session->userdata('user_client_id'),
                $invoice_number
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
        
        $invoice = array();
        $this->load->model('invoice_line');
                
        foreach ($result->result() as $row) {
            
            $invoice_header = new invoice_header();
            $invoice_line = new invoice_line();
            
            $invoice_header->setId($row->id);
            $invoice_header->setInvoice_number($row->invoice_number);
            $invoice_header->setClient_id($row->client_id);
            $invoice_header->setCustomer_id($row->customer_id);
            $invoice_header->setIs_active($row->active);
            $invoice_header->setCreated_on($row->created_on);
            $invoice_header->setCreated_by($row->created_by);
            $invoice_header->setClient_name($row->client_name);
            $invoice_header->setClient_email($row->client_email);
            $invoice_header->setUser_first_name($row->user_first_name);
            $invoice_header->setUser_last_name($row->user_last_name);
            $invoice_header->setUser_site($row->user_site);
            $invoice_header->setCustomer_first_name($row->customer_first_name);
            $invoice_header->setCustomer_last_name($row->customer_last_name);
            $invoice_header->setCustomer_email($row->customer_email);
            $invoice_header->setCustomer_phone($row->customer_phone);
            $invoice_header->setInvoice_status($this->get_invoice_status($invoice_header));
            $invoice_header->setInvoice_lines($invoice_line->get_invoice_lines($row->id));
            
            $invoice[] = $invoice_header;
        }
        
        return $invoice;
    }
}
