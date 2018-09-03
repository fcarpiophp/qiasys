<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proposal_model
 *
 * @author Francisco
 */
class proposal_model extends CI_Model {

    /**
     * @var
     */
    private $client_id;

    /**
     * @var
     */
    private $client_name;

    /**
     * @var
     */
    private $client_add_1;

    /**
     * @var
     */
    private $client_add_2;

    /**
     * @var
     */
    private $client_city;

    /**
     * @var
     */
    private $client_state;

    /**
     * @var
     */
    private $client_zip;

    /**
     * @var
     */
    private $client_phone;

    /**
     * @var
     */
    private $client_fax;

    /**
     * @var
     */
    private $client_email;

    /**
     * @var
     */
    private $client_contact;

    /**
     * @var
     */
    private $client_logo_image;

    /**
     * @var
     */
    private $customers_id;

    /**
     * @var
     */
    private $customers_client_id;

    /**
     * @var
     */
    private $customers_first_name;

    /**
     * @var
     */
    private $customers_last_name;

    /**
     * @var
     */
    private $customers_email;

    /**
     * @var
     */
    private $customers_phone;

    /**
     * @var
     */
    private $customers_address1;

    /**
     * @var
     */
    private $customers_address2;

    /**
     * @var
     */
    private $customers_city;

    /**
     * @var
     */
    private $customers_state;

    /**
     * @var
     */
    private $customers_zip;

    /**
     * @var
     */
    private $item_part_number;

    /**
     * @var
     */
    private $item_qty;

    /**
     * @var
     */
    private $item_description;

    /**
     * @var
     */
    private $item_supplier_name;

    /**
     * @var
     */
    private $item_manufacturer_name;

    /**
     * @var
     */
    private $item_uom;

    /**
     * @var
     */
    private $item_stock;

    /**
     * @var
     */
    private $item_on_order;

    /**
     * @var
     */
    private $item_site;

    /**
     * @var
     */
    private $item_location;

    /**
     * @var
     */
    private $item_cost;

    /**
     * @var
     */
    private $item_msrp;

    /**
     * @var
     */
    private $item_price;

    /**
     * @var
     */
    private $item_total;

    /**
     *
     * @var type float
     */
    private $item_extended_price;

    /**
     * @param mixed $customers_address1
     */
    public function setCustomersAddress1($customers_address1) {
	$this->customers_address1 = $customers_address1;
    }

    /**
     * @return mixed
     */
    public function getCustomersAddress1() {
	return $this->customers_address1;
    }

    /**
     * @param mixed $customers_address2
     */
    public function setCustomersAddress2($customers_address2) {
	$this->customers_address2 = $customers_address2;
    }

    /**
     * @return mixed
     */
    public function getCustomersAddress2() {
	return $this->customers_address2;
    }

    /**
     * @param mixed $customers_city
     */
    public function setCustomersCity($customers_city) {
	$this->customers_city = $customers_city;
    }

    /**
     * @return mixed
     */
    public function getCustomersCity() {
	return $this->customers_city;
    }

    /**
     * @param mixed $customers_client_id
     */
    public function setCustomersClientId($customers_client_id) {
	$this->customers_client_id = $customers_client_id;
    }

    /**
     * @return mixed
     */
    public function getCustomersClientId() {
	return $this->customers_client_id;
    }

    /**
     * @param mixed $customers_email
     */
    public function setCustomersEmail($customers_email) {
	$this->customers_email = $customers_email;
    }

    /**
     * @return mixed
     */
    public function getCustomersEmail() {
	return $this->customers_email;
    }

    /**
     * @param mixed $customers_first_name
     */
    public function setCustomersFirstName($customers_first_name) {
	$this->customers_first_name = $customers_first_name;
    }

    /**
     * @return mixed
     */
    public function getCustomersFirstName() {
	return $this->customers_first_name;
    }

    /**
     * @param mixed $customers_id
     */
    public function setCustomersId($customers_id) {
	$this->customers_id = $customers_id;
    }

    /**
     * @return mixed
     */
    public function getCustomersId() {
	return $this->customers_id;
    }

    /**
     * @param mixed $customers_last_name
     */
    public function setCustomersLastName($customers_last_name) {
	$this->customers_last_name = $customers_last_name;
    }

    /**
     * @return mixed
     */
    public function getCustomersLastName() {
	return $this->customers_last_name;
    }

    /**
     * @param mixed $customers_phone
     */
    public function setCustomersPhone($customers_phone) {
	$this->customers_phone = $customers_phone;
    }

    /**
     * @return mixed
     */
    public function getCustomersPhone() {
	return $this->customers_phone;
    }

    /**
     * @param mixed $customers_state
     */
    public function setCustomersState($customers_state) {
	$this->customers_state = $customers_state;
    }

    /**
     * @return mixed
     */
    public function getCustomersState() {
	return $this->customers_state;
    }

    /**
     * @param mixed $customers_zip
     */
    public function setCustomersZip($customers_zip) {
	$this->customers_zip = $customers_zip;
    }

    /**
     * @return mixed
     */
    public function getCustomersZip() {
	return $this->customers_zip;
    }

    /**
     * @param mixed $client_add_1
     */
    public function setClientAdd1($client_add_1) {
	$this->client_add_1 = $client_add_1;
    }

    /**
     * @return mixed
     */
    public function getClientAdd1() {
	return $this->client_add_1;
    }

    /**
     * @param mixed $client_add_2
     */
    public function setClientAdd2($client_add_2) {
	$this->client_add_2 = $client_add_2;
    }

    /**
     * @return mixed
     */
    public function getClientAdd2() {
	return $this->client_add_2;
    }

    /**
     * @param mixed $client_city
     */
    public function setClientCity($client_city) {
	$this->client_city = $client_city;
    }

    /**
     * @return mixed
     */
    public function getClientCity() {
	return $this->client_city;
    }

    /**
     * @param mixed $client_contact
     */
    public function setClientContact($client_contact) {
	$this->client_contact = $client_contact;
    }

    /**
     * @return mixed
     */
    public function getClientContact() {
	return $this->client_contact;
    }

    /**
     * @param mixed $client_email
     */
    public function setClientEmail($client_email) {
	$this->client_email = $client_email;
    }

    /**
     * @return mixed
     */
    public function getClientEmail() {
	return $this->client_email;
    }

    /**
     * @param mixed $client_fax
     */
    public function setClientFax($client_fax) {
	$this->client_fax = $client_fax;
    }

    /**
     * @return mixed
     */
    public function getClientFax() {
	return $this->client_fax;
    }

    /**
     * @param mixed $client_logo_image
     */
    public function setClientLogoImage($client_logo_image) {
	$this->client_logo_image = $client_logo_image;
    }

    /**
     * @return mixed
     */
    public function getClientLogoImage() {
	return $this->client_logo_image;
    }

    /**
     * @param mixed $client_name
     */
    public function setClientName($client_name) {
	$this->client_name = $client_name;
    }

    /**
     * @return mixed
     */
    public function getClientName() {
	return $this->client_name;
    }

    /**
     * @param mixed $client_phone
     */
    public function setClientPhone($client_phone) {
	$this->client_phone = $client_phone;
    }

    /**
     * @return mixed
     */
    public function getClientPhone() {
	return $this->client_phone;
    }

    /**
     * @param mixed $client_state
     */
    public function setClientState($client_state) {
	$this->client_state = $client_state;
    }

    /**
     * @return mixed
     */
    public function getClientState() {
	return $this->client_state;
    }

    /**
     * @param mixed $client_zip
     */
    public function setClientZip($client_zip) {
	$this->client_zip = $client_zip;
    }

    /**
     * @return mixed
     */
    public function getClientZip() {
	return $this->client_zip;
    }

    /**
     * @param mixed $id
     */
    public function setClientId($client_id) {
	$this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getClientId() {
	return $this->client_id;
    }

    /**
     * @param mixed $item_cost
     */
    public function setItemCost($item_cost) {
	$this->item_cost = $item_cost;
    }

    /**
     * @return mixed
     */
    public function getItemCost() {
	return $this->item_cost;
    }

    /**
     * @param mixed $item_description
     */
    public function setItemDescription($item_description) {
	$this->item_description = $item_description;
    }

    /**
     * @return mixed
     */
    public function getItemDescription() {
	return $this->item_description;
    }

    /**
     * @param mixed $item_location
     */
    public function setItemLocation($item_location) {
	$this->item_location = $item_location;
    }

    /**
     * @return mixed
     */
    public function getItemLocation() {
	return $this->item_location;
    }

    /**
     * @param mixed $item_manufacturer_name
     */
    public function setItemManufacturerName($item_manufacturer_name) {
	$this->item_manufacturer_name = $item_manufacturer_name;
    }

    /**
     * @return mixed
     */
    public function getItemManufacturerName() {
	return $this->item_manufacturer_name;
    }

    /**
     * @param mixed $item_msrp
     */
    public function setItemMsrp($item_msrp) {
	$this->item_msrp = $item_msrp;
    }

    /**
     * @return mixed
     */
    public function getItemMsrp() {
	return $this->item_msrp;
    }

    /**
     * @param mixed $item_on_order
     */
    public function setItemOnOrder($item_on_order) {
	$this->item_on_order = $item_on_order;
    }

    /**
     * @return mixed
     */
    public function getItemOnOrder() {
	return $this->item_on_order;
    }

    /**
     * @param mixed $item_part_number
     */
    public function setItemPartNumber($item_part_number) {
	$this->item_part_number = $item_part_number;
    }

    /**
     * @return mixed
     */
    public function getItemPartNumber() {
	return $this->item_part_number;
    }

    /**
     * @param mixed $item_price
     */
    public function setItemPrice($item_price) {
	$this->item_price = $item_price;
    }

    /**
     * @return mixed
     */
    public function getItemPrice() {
	return $this->item_price;
    }

    /**
     * @param mixed $item_qty
     */
    public function setItemQty($item_qty) {
	$this->item_qty = $item_qty;
    }

    /**
     * @return mixed
     */
    public function getItemQty() {
	return $this->item_qty;
    }

    /**
     * @param mixed $item_site
     */
    public function setItemSite($item_site) {
	$this->item_site = $item_site;
    }

    /**
     * @return mixed
     */
    public function getItemSite() {
	return $this->item_site;
    }

    /**
     * @param mixed $item_stock
     */
    public function setItemStock($item_stock) {
	$this->item_stock = $item_stock;
    }

    /**
     * @return mixed
     */
    public function getItemStock() {
	return $this->item_stock;
    }

    /**
     * @param mixed $item_supplier_name
     */
    public function setItemSupplierName($item_supplier_name) {
	$this->item_supplier_name = $item_supplier_name;
    }

    /**
     * @return mixed
     */
    public function getItemSupplierName() {
	return $this->item_supplier_name;
    }

    /**
     * @param mixed $item_total
     */
    public function setItemTotal($item_total) {
	$this->item_total = $item_total;
    }

    /**
     * @return mixed
     */
    public function getItemTotal() {
	return $this->item_total;
    }

    /**
     * @param mixed $item_uom
     */
    public function setItemUom($item_uom) {
	$this->item_uom = $item_uom;
    }

    /**
     * @return mixed
     */
    public function getItemUom() {
	return $this->item_uom;
    }

    /**
     * 
     * @param type $item_extended_price
     * @return type float
     */
    public function setItemExtendedPrice($item_extended_price) {
	$this->item_extended_price = $item_extended_price;
    }

    /**
     * 
     * @return type float
     */
    public function getItemExtendedPrice() {
	return $this->item_extended_price;
    }

    /**
     *
     * @return boolean
     */
    public function create_proposal() {
	$active_proposal = $this->session->userdata('proposal_id');
	$active_proposal_exists = self::proposal_exists();

	if ((strlen($active_proposal) == 0) || ($active_proposal_exists == 0)) {
	    $query = "
				INSERT INTO 
					transaction_header (client_id, user_id, type, created_by, is_active)
				VALUES 
					(?, ?, 'PRP', ?, TRUE)
			";

	    $result = $this->db->query(
		$query, array(
		$this->session->userdata('user_client_id'),
		$this->session->userdata('id'),
		$this->session->userdata('id')
		)
	    );

	    if (!$result) {
		// if query returns null
		$msg = $this->db->_error_message();
		$num = $this->db->_error_number();
		$data['msg'] = "Error(" . $num . ") " . $msg;
		$this->load->view('db_error', $data);
	    } else {
		$insert_id = $this->db->insert_id();
		$newdata = array('proposal_id' => $insert_id);
		$this->session->set_userdata($newdata);
		return $result;
	    }
	} else {
	    return FALSE;
	}
    }

    /**
     *
     * @return type
     */
    public function proposal_exists() {
	$query = "
            SELECT COUNT(*) AS numrows
            FROM transaction_header
            WHERE  client_id = ?
            AND user_id =  ?
            AND is_active = ?
        ";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    $this->session->userdata('id'),
	    true
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return $total = 0;
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->numrows;
	    }
	}
	return $total;
    }

    /**
     *
     * @return type
     */
    public function proposal_item_count() {

	$query = "
            SELECT COUNT(*) AS numrows
            FROM transaction_line
            WHERE proposal_id = ?
        ";
	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('proposal_id')
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return $total = 0;
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->numrows;
	    }
	}
	return $total;
    }

    /**
     *
     * @param item_model $item
     * @return type
     */
    public function item_exists_in_proposal(item_model $item) {
	$query = "
            SELECT COUNT(*) AS total FROM transaction_line WHERE proposal_id = ? AND item_part_number = ?
        ";

	$result = $this->db->query($query, array(
	    $this->session->userdata('proposal_id'),
	    $item->get_item_part_number()
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return $total = 0;
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->total;
	    }
	}
	return $total;
    }

    /**
     *
     * @param item_model $item
     * @param type $qty
     * @return type
     */
    public function add_to_proposal(item_model $item, $qty) {

	$query = "
            INSERT INTO transaction_line  
                (
                    proposal_id,
                    item_part_number,
                    item_qty,
                    item_price,
                    supplier_id,
                    manufacturer_id,
                    client_id,
                    site_id
                )
            VALUES 
                (
                    ?,?,?,?,?,?,?,?
                )
            ON DUPLICATE KEY UPDATE item_qty = item_qty + ?;
        ";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('proposal_id'),
	    $item->get_item_part_number(),
	    $qty,
	    $item->get_item_price(),
	    $item->get_item_supplier_id(),
	    $item->get_item_manufacturer_id(),
	    $this->session->userdata('user_client_id'),
            $item->get_item_site_id(),
	    $qty
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);

	    return FALSE;
	}

	return TRUE;
    }

    /**
     *
     * @param type $transaction_id
     * @return array
     */
    public function get_proposal($transaction_id) {
	$query = "
            SELECT 
                item_part_number, 
                item_qty,
                item_price,
                supplier_id,
                manufacturer_id,
                client_id
            FROM
                transaction_line
            WHERE
                proposal_id = ?
        ";

	$result = $this->db->query(
	    $query, array(
	    $transaction_id
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {

	    $this->load->model('item_model');
	    $item = new item_model();

	    foreach ($result->result() as $row) {
		$item->instantiateItemFromPartNumber($row->item_part_number);
		$proposal = new proposal_model();

		$proposal->setItemPartNumber($item->get_item_part_number());
		$proposal->setItemQty($row->item_qty);
		$proposal->setItemDescription($item->get_item_description());
		$proposal->setItemSupplierName($item->get_supplier_name());
		$proposal->setItemManufacturerName($item->get_manufacturer_name());
		$proposal->setItemUom($item->get_item_uom());
		$proposal->setItemStock($item->get_item_stock());
		$proposal->setItemOnOrder($item->get_item_on_order());
		$proposal->setItemSite($item->get_item_site());
		$proposal->setItemLocation($item->get_item_location());
		$proposal->setItemCost($item->get_item_cost());
		$proposal->setItemMsrp($item->get_item_msrp());
		$proposal->setItemPrice(number_format($row->item_price, 2, '.', ''));
		$proposal->setItemTotal(number_format($row->item_qty * $row->item_price, 2, '.', ''));

		$proposals[] = $proposal;
	    }
	}

	if (!isset($proposals)) {
	    //$proposal = new proposal_model();
	    //$proposals[] = $proposal;
	    return false;
	}

	return $proposals;
    }

    /**
     * @param $transaction_id
     * @return array
     */
    public function get_proposal_items($transaction_id) {

	$query = "
            SELECT 
                item_part_number, 
                item_qty,
                item_price,
                supplier_id,
                manufacturer_id,
                client_id,
                site_id
            FROM
                transaction_line
            WHERE
                proposal_id = ?
        ";

	$result = $this->db->query(
	    $query, array(
	    $transaction_id
	    )
	);

	// set to empty string so it does not undefined
	//in case the query has 0 results
	$data = '';

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$data[] = array(
		    'item_part_number' => $row->item_part_number,
		    'item_qty' => $row->item_qty,
		    'item_price' => $row->item_price,
		    'supplier_id' => $row->supplier_id,
		    'manufacturer_id' => $row->manufacturer_id,
		    'client_id' => $row->client_id,
                    'site_id' => $row->site_id
		);
	    }
	}

	return $data;
    }

    /**
     *
     * @return boolean
     */
    public function get_proposal_total($proposal_id) {

	$query = "
            SELECT 
                SUM(item_qty * item_price) AS total
            FROM 
                transaction_line
            WHERE
                proposal_id = ?
        ";

	$result = $this->db->query(
	    $query, array($proposal_id)
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->total;
	    }
	}

	return $total;
    }

    /**
     * @param $item_part_number
     * @return bool
     */
    public function delete_item($item_part_number) {
	$query = "DELETE FROM transaction_line WHERE item_part_number = ?";

	$result = $this->db->query(
	    $query, array($item_part_number)
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    return true;
	}

	/*
	 * @TODO Still need to handle when query returns false
	 */
	return false;
    }

    /**
     * @return bool
     */
    public function edit_item() {
	if (0 >= $_POST['item_quantity']) {
	    $result = self::delete_item($_POST['item_part']);
	    return $result;
	} else {
	    $query = "
                UPDATE 
                    transaction_line
                SET
                    item_price = ?, 
                    item_qty = ?
                WHERE 
                    proposal_id = ?
                AND
                    item_part_number = ?
            ";
	}

	$result = $this->db->query(
	    $query, array(
	    $_POST['item_price'],
	    $_POST['item_quantity'],
	    $this->session->userdata('proposal_id'),
	    $_POST['item_part']
	    )
	);


	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    return true;
	}

	return false;
    }

    /**
     * @param $proposal_id
     * @return bool
     */
    public function deplete_inventory($proposal_id) {

	$query = "
            SELECT
                item_part_number, item_qty
            FROM
                transaction_line
            WHERE
                proposal_id = ?";

	$result = $this->db->query(
	    $query, array($proposal_id)
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		//user_client_id and proposal_id
		$query2 = "
                    UPDATE items
                    LEFT JOIN client_supplier_lkup
                    ON client_supplier_lkup.supplier_id = items.item_supplier_id
                    SET items.item_stock = items.item_stock - ?
                    WHERE client_supplier_lkup.client_id = ?
                    AND items.item_part_number = ?";

		$result2 = $this->db->query(
		    $query2, array(
		    $row->item_qty,
		    $this->session->userdata('user_client_id'),
		    $row->item_part_number
		    )
		);

		if (!$result2) {
		    // if query returns null
		    $msg = $this->db->_error_message();
		    $num = $this->db->_error_number();
		    $data['msg'] = "Error(" . $num . ") " . $msg;
		    $this->load->view('db_error', $data);
		}
	    }
	}

	return ($result && $result2) ? true : false;

	/*
	 * @TODO Still need to handle when query returns false
	 */
    }

    /*
     * @TODO change these queries to use a transaction
     */
    /*
      $this->db->trans_start();
      $this->db->query('AN SQL QUERY...');
      $this->db->query('ANOTHER QUERY...');
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE)
      {
      $msg = $this->db->_error_message();
      $num = $this->db->_error_number();
      $data['msg'] = "Error(".$num.") ".$msg;
      $this->load->view('db_error', $data);
      }
     */

    /**
     * @param $proposal_id
     * @return bool
     */
    public function delete_proposal($proposal_id) {
	$query = "DELETE FROM transaction_line WHERE proposal_id = ?";

	$result = $this->db->query(
	    $query, array($proposal_id)
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	}

	$query2 = "DELETE FROM transaction_header WHERE id = ?";

	$result2 = $this->db->query(
	    $query2, array($proposal_id)
	);

	if (!$result2) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	}

	//set the new proposal number session
	if (self::proposal_exists() < 1) {
	    self::create_proposal();
	}

	if ($result && $result2) {
	    return true;
	}
	/*
	 * @TODO Still need to handle when query returns false
	 */
	return false;
    }

    /**
     * @param array $info
     * @return mixed
     */
    public function get_customer_information($info = array()) {

	$query = "
            select
                first_name,
                last_name,
                email,
                phone,
                address1,
                address2,
                city,
                state,
                zip
            from
                customers
            where
              customers.client_id = ?
        ";

	if (!empty($info['phone'])) {
	    $query .= "
            and phone = " . $info['phone'];
	}

	if (!empty($info['email'])) {
	    $query .= "
            and email = '" . $info['email'] . "'";
	}

	$query .= "
            limit 1";

	$result = $this->db->query(
	    $query, array($this->session->userdata('user_client_id'))
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$customer_data['first_name'] = $row->first_name;
		$customer_data['last_name'] = $row->last_name;
		$customer_data['email'] = $row->email;
		$customer_data['phone'] = $row->phone;
		$customer_data['address1'] = $row->address1;
		$customer_data['address2'] = $row->address2;
		$customer_data['city'] = $row->city;
		$customer_data['state'] = $row->state;
		$customer_data['zip'] = $row->zip;
	    }
	}

	return $customer_data;
    }

    /**
     * @return proposal_model
     */
    public function get_client_details() {
	$query = "
            select distinct
                id,
                client_name,
                client_add_1,
                client_add_2,
                client_city,
                client_state,
                client_zip,
                client_phone,
                client_fax,
                client_email,
                client_contact,
                client_logo_image
            from
            	clients
            where
            	id = ?
            limit 1
        ";

	$result = $this->db->query(
	    $query, array($this->session->userdata('user_client_id'))
	);

	$proposal = new proposal_model();

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$proposal->setClientId($row->id);
		$proposal->setClientName($row->client_name);
		$proposal->setClientAdd1($row->client_add_1);
		$proposal->setClientAdd2($row->client_add_2);
		$proposal->setClientCity($row->client_city);
		$proposal->setClientState($row->client_state);
		$proposal->setClientZip($row->client_zip);
		$proposal->setClientPhone($row->client_phone);
		$proposal->setClientFax($row->client_fax);
		$proposal->setClientEmail($row->client_email);
		$proposal->setClientContact($row->client_contact);
		$proposal->setClientLogoImage($row->client_logo_image);
	    }
	}

	return $proposal;
    }

    /**
     * @param $last_insert_id
     * @return proposal_model
     */
    public function get_proposal_header_details($last_insert_id) {
	$query = "
	    select distinct
		    customers.id 		as customer_id,
		    customers.client_id 	as customer_client_id,
		    customers.first_name 	as customer_first_name,
		    customers.last_name 	as customer_last_name,
		    customers.email 		as customer_email,
		    customers.phone 		as customer_phone,
		    customers.address1 		as customer_address1,
		    customers.address2 		as customer_address2,
		    customers.city 		as customer_city,
		    customers.state 		as customer_state,
		    customers.zip 		as customer_zip,
		    clients.id 			as client_id,
		    clients.client_name 	as client_name,
		    clients.client_add_1 	as client_add_1,
		    clients.client_add_2 	as client_add_2,
		    clients.client_city 	as client_city,
		    clients.client_state 	as client_state,
		    clients.client_zip 		as client_zip,
		    clients.client_phone 	as client_phone,
		    clients.client_fax	 	as client_fax,
		    clients.client_email 	as client_email,
		    clients.client_contact 	as client_contact,
		    clients.client_logo_image 	as client_logo_image
	    from
		    customers
	    right join
		    clients on customers.client_id = clients.id
	    where
		    customers.id = ?
		";

	$result = $this->db->query(
	    $query, array($last_insert_id)
	);

	$transaction_info = new proposal_model();

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$transaction_info->setCustomersId($row->customer_id);
		$transaction_info->setCustomersClientId($row->customer_client_id);
		$transaction_info->setCustomersFirstName($row->customer_first_name);
		$transaction_info->setCustomersLastName($row->customer_last_name);
		$transaction_info->setCustomersEmail($row->customer_email);
		$transaction_info->setCustomersPhone($row->customer_phone);
		$transaction_info->setCustomersAddress1($row->customer_address1);
		$transaction_info->setCustomersAddress2($row->customer_address2);
		$transaction_info->setCustomersCity($row->customer_city);
		$transaction_info->setCustomersState($row->customer_state);
		$transaction_info->setCustomersZip($row->customer_zip);
		$transaction_info->setClientId($row->client_id);
		$transaction_info->setClientName($row->client_name);
		$transaction_info->setClientAdd1($row->client_add_1);
		$transaction_info->setClientAdd2($row->client_add_2);
		$transaction_info->setClientCity($row->client_city);
		$transaction_info->setClientState($row->client_state);
		$transaction_info->setClientZip($row->client_zip);
		$transaction_info->setClientPhone($row->client_phone);
		$transaction_info->setClientFax($row->client_fax);
		$transaction_info->setClientEmail($row->client_email);
		$transaction_info->setClientContact($row->client_contact);
		$transaction_info->setClientLogoImage($row->client_logo_image);
	    }
	}

	return $transaction_info;
    }

    /**
     * @return array
     */
    public function get_proposal_summary() {
	$query = "
		    SELECT 
			transaction_line.item_part_number,
			items.item_description,
			transaction_line.item_qty,
			transaction_line.item_price,
			(transaction_line.item_qty * transaction_line.item_price) as extended_price
		    FROM 
			transaction_header
		    LEFT JOIN 	
			transaction_line 
			ON transaction_header.id = transaction_line.proposal_id
		    LEFT JOIN 
			items 
			ON items.item_manufacturer_id = transaction_line.manufacturer_id
			AND items.item_supplier_id = transaction_line.supplier_id
			AND items.item_part_number = transaction_line.item_part_number
		    WHERE transaction_header.id = ?
		";

	$result = $this->db->query(
	    $query, array($this->session->userdata('proposal_id'))
	);

	$summary_data = array();

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {

	    foreach ($result->result() as $row) {
		$summary = new proposal_model();

		$summary->setItemPartNumber($row->item_part_number);
		$summary->setItemDescription($row->item_description);
		$summary->setItemQty($row->item_qty);
		$summary->setItemPrice($row->item_price);
		$summary->setItemExtendedPrice($row->extended_price);

		$summary_data[] = $summary;
	    }
	}

	return $summary_data;
    }

}
