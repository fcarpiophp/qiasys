<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of invoice
 *
 * @author fcarpio
 */
class invoice extends CI_Controller {

    public function index() {
        
        //$data['permission'] = $permission;
        
        // Display a list of invoices
        $this->load->model('invoice_header');
        $invoice = new invoice_header();
        
        $data['invoices'] = $invoice->getInvoiceList();
        $data['page_title'] = 'Invoice List';
        $data['base_url'] = base_url();

        $this->load->view('header', $data);
        $this->load->view('invoice/invoice_list', $data);
        $this->load->view('footer');
    }
    
    public function invoice_details() {
        
        //$data['permission'] = $permission;
        
        $invoice_number = $this->uri->segment(3);
    
        // get specific invoice details
        $this->load->model('invoice_header');
        $invoice = new invoice_header();
        $data['invoice_details'] = $invoice->get_invoice_details($invoice_number);
        
        print '<pre>';
        print_r($data['invoice_details']);
        //die();
    }
    
}
