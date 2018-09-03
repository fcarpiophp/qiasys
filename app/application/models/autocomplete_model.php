<?php

/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 11/11/13
 * Time: 7:02 PM
 */
class autocomplete_model extends CI_Model {

    /**
     * @return string
     */
    public function get_phone_numbers() {

	$return_arr = array();

	$query = "
            SELECT
                phone
            FROM
                customers
            WHERE
                client_id = ?
            AND
                phone IS NOT NULL
	    GROUP BY phone";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id')
	    )
	);

	foreach ($result->result() as $row) {
	    $return_arr[] = $row->phone;
	}

	return json_encode($return_arr);
    }

    /**
     * 
     * @return json
     */
    public function get_email_address() {

	$return_arr = array();

	$query = "
            SELECT
                email
            FROM
                customers
            WHERE
                client_id = ?
            AND
                email IS NOT NULL
	    GROUP BY email";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id')
	    )
	);

	foreach ($result->result() as $row) {
	    $return_arr[] = $row->email;
	}

	return json_encode($return_arr);
    }

    /**
     * 
     * @return json
     * @throws Exception
     */
    public function get_all_users() {

	$query = "
            SELECT user_name FROM users WHERE user_client_id = ?
	";

	$result = $this->db->query($query, array($this->session->userdata('user_client_id')));

	$users = array();

	if (!$result) {
	    $message = "Query failed in autocomplete_model/get_all_users()";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$users[] = $row->user_name;
	    }
	}
	return json_encode($users);
    }
    
    public function get_all() {

	$query = "SELECT user_name FROM users";

	$result = $this->db->query($query);

	$users = array();

	if (!$result) {
	    $message = "Query failed in autocomplete_model/get_all_users()";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$users[] = $row->user_name;
	    }
	}
	return json_encode($users);
    }

    /**
     * 
     * @param type $active
     * @return type
     * @throws Exception
     */
    public function get_all_suppliers($active = false) {

	$query = "
			SELECT supplier_name
			FROM suppliers
			LEFT JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = suppliers.id
			WHERE client_supplier_lkup.client_id = ?
		";

	if ($active) {
	    $query .= " AND is_active = 1";
	}


	$result = $this->db->query($query, array($this->session->userdata('user_client_id')));

	$suppliers = array();

	if (!$result) {
	    $message = "Query failed in autocomplete_model/get_all_suppliers()";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$suppliers[] = $row->supplier_name;
	    }
	}
	return json_encode($suppliers);
    }

    /**
     * 
     * @param type $active
     * @return type
     * @throws Exception
     */
    public function get_all_manufacturers($active = false) {

	$query = "
			SELECT manufacturer_name
			FROM manufacturers
			LEFT JOIN client_manufacturer_lkup ON client_manufacturer_lkup.manufacturer_id = manufacturers.id
			WHERE client_manufacturer_lkup.client_id = ?
		";

	if ($active) {
	    $query .= " AND is_active = 1";
	}

	$result = $this->db->query($query, array($this->session->userdata('user_client_id')));

	$manufacturers = array();

	if (!$result) {
	    $message = "Query failed in autocomplete_model/get_all_manufacturers()";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$manufacturers[] = $row->manufacturer_name;
	    }
	}
	return json_encode($manufacturers);
    }

}
