<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order
 *
 * @author Francisco
 */
class order extends CI_Controller {

    /**
     * 
     * @return type
     */
    public function get_last_po_id() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getPurchase()) {
            $this->load->model('order_model');
            $order = new order_model();
            $last_po = $order->get_last_po_id();
            return $last_po;
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }
    
    public function submit_selected_orders() {
	
	// doing some cleanup, decoding and...
	foreach($_POST['selected'] as $item) {
	    $temp[] = unserialize(base64_decode($item));
	}
	
	//  ...making the array more loop friendly
	for($i = 0; $i < sizeof($temp); $i++){
	    $parts[] = $temp[$i][key($temp[$i])];
	}

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getPurchase()) {
	    
	    //to be used with selected orders only
            $this->load->model('supplier_model');
	    $this->load->model('client_model');
	    $this->load->model('manufacturer_model');
	    
            $suppliers = new supplier_model();
	    $client = new client_model();
	    $manufacturer = new manufacturer_model();
	    
	    foreach($parts as $part){
                
		//get supplier information
		$temp_part = $suppliers->getSupplierFromId($part);
                
		//get client information
		$temp_part = $client->get_client($temp_part);
                
		//get manufacturer information
		$temp_part = $manufacturer->get_manufacturer($temp_part);

		//accumulate into a single array
		$loaded_parts[] = $temp_part;
	    }

            $this->load->model('order_model');
	    $this->load->helper('luhn_helper');
            $order = new order_model();
	    
	    // generate initial po number
	    // get last po id
	    $last_po_id = $this->get_last_po_id();
	    $last_po_id++;

	    //generate new po number
	    $new_po_number = generate_luhn($last_po_id);
	    
	    // line counter init
	    $j = 1;
	    $previous_supplier = '';
	    $previous_site = '';
            
	    for($i = 0; $i < sizeof($loaded_parts); $i++){

		if( ($previous_site != $loaded_parts[$i]['site_name']) || ($previous_supplier != $loaded_parts[$i]['supplier_id']) ) {

		    $previous_site = $loaded_parts[$i]['site_name'];
		    $previous_supplier = $loaded_parts[$i]['supplier_id'];

		    //get last po id
		    $last_po_id = $this->get_last_po_id();
		    $last_po_id++;

		    // generate new po number
		    $new_po_number = generate_luhn($last_po_id);
		    // reset line counter
		    $j = 1;
		}
		
		// get newly created po number for this transaction
                $loaded_parts[$i]['po_number'] = $new_po_number;
		
		$loaded_parts[$i]['line_number'] = $j;
		
		// returns true if successful and false if there is a database problem
		$loaded_parts[$i]['db_status'] = $order->process_selected($loaded_parts[$i], $new_po_number, $last_po_id, $j);
		
		// increment line counter for next iteration
		$j++;
   
            }

	    $this->load->model('qmail');
	    $qmail = new qmail();

	    // group parts by order#
	    foreach($loaded_parts as $parts) {
		$grouped_parts[$parts['po_number']][] = $parts;
	    }
	    
	    $this->load->model('order_model');
	    $update_email = new order_model();
	    
	    foreach($grouped_parts as $order) {
		
		$order['db_status'] = true;
		$max = sizeof($order);

		// check all lines for this order where added successfully to the db
		// i am using $max-1 to account for the 'db_status' index, which I do not want to count
		for ($i = 0; $i < ($max - 1); $i++) {
		    $order['db_status'] = $order['db_status'] && $order[$i]['db_status'];
		}
		
		if ($order['db_status']) {
		    
		    // send each order# by email
		    $file_name = 'Purchase Order ' . $order[0]['po_number'] . ' ' . trim($order[0]['client']['client_name']).'.pdf';
		    $from_email = $order[0]['client']['client_email'];
		    $from_name = $order[0]['client']['client_name'];
		    $to_email = $order[0]['supplier']['supplier_email'];
		    $reply_to = $from_email;
		    $subject = $file_name;
		    $message = 'Order Details for PO# ' . $order[0]['po_number'] . ' Attached.';
		    $data['order'] = $order;

		    $view = $this->load->view('documents/purchase_order_selected', $data, true);

		    // returns true if successful and false if there is an email problem
		    $data['email_status'] = $qmail->send(
			$file_name,
			$view,
			$from_email,
			$from_name,
			$to_email,
			$reply_to,
			$subject,
			$message
		    );
                    
                    if($data['email_status'] == '') {
                        $data['email_status'] = false;
                    }
		}
		
		$data['orders'][] = $order;
		
		//update PO with status
		$update_email->update_order_email_status($new_po_number, $data['email_status']);
	    }

            /////////////////////////////////
            //go to confirmation page
            /////////////////////////////////

            $data['page_title'] = 'Order Confirmation for Selected Orders';

            $this->load->view('header', $data);
            $this->load->view('order/selected_confirmation', $data);
            $this->load->view('footer');

	} else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }


        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

}
