<?php

/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 1/26/14
 * Time: 12:30 PM
 */
class supplier_model extends CI_Model {

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $supplier_name;

    /**
     * @var
     */
    private $supplier_add_1;

    /**
     * @var
     */
    private $supplier_add_2;

    /**
     * @var
     */
    private $supplier_city;

    /**
     * @var
     */
    private $supplier_state;

    /**
     * @var
     */
    private $supplier_zip;

    /**
     * @var
     */
    private $supplier_phone;

    /**
     * @var
     */
    private $supplier_fax;

    /**
     * @var
     */
    private $supplier_email;

    /**
     * @var
     */
    private $supplier_rep;

    /**
     * @var
     */
    private $supplier_rep_email;

    /**
     * @var
     */
    private $supplier_rep_phone;

    /**
     * @var
     */
    private $supplier_rep_fax;

    /**
     * @var
     */
    private $supplier_date_created;

    /**
     * @var
     */
    private $supplier_created_by;

    /**
     * @var
     */
    private $supplier_date_modified;

    /**
     * @var
     */
    private $supplier_modified_by;

    /**
     * @param mixed $supplier_rep_phone
     */
    public function setSupplierRepPhone($supplier_rep_phone) {
	$this->supplier_rep_phone = $supplier_rep_phone;
    }

    /**
     * @return mixed
     */
    public function getSupplierRepPhone() {
	return $this->supplier_rep_phone;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
	$this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
	return $this->id;
    }

    /**
     * @param mixed $supplier_add_1
     */
    public function setSupplierAdd1($supplier_add_1) {
	$this->supplier_add_1 = $supplier_add_1;
    }

    /**
     * @return mixed
     */
    public function getSupplierAdd1() {
	return $this->supplier_add_1;
    }

    /**
     * @param mixed $supplier_add_2
     */
    public function setSupplierAdd2($supplier_add_2) {
	$this->supplier_add_2 = $supplier_add_2;
    }

    /**
     * @return mixed
     */
    public function getSupplierAdd2() {
	return $this->supplier_add_2;
    }

    /**
     * @param mixed $supplier_city
     */
    public function setSupplierCity($supplier_city) {
	$this->supplier_city = $supplier_city;
    }

    /**
     * @return mixed
     */
    public function getSupplierCity() {
	return $this->supplier_city;
    }

    /**
     * @param mixed $supplier_created_by
     */
    public function setSupplierCreatedBy($supplier_created_by) {
	$this->supplier_created_by = $supplier_created_by;
    }

    /**
     * @return mixed
     */
    public function getSupplierCreatedBy() {
	return $this->supplier_created_by;
    }

    /**
     * @param mixed $supplier_date_created
     */
    public function setSupplierDateCreated($supplier_date_created) {
	$this->supplier_date_created = $supplier_date_created;
    }

    /**
     * @return mixed
     */
    public function getSupplierDateCreated() {
	return $this->supplier_date_created;
    }

    /**
     * @param mixed $supplier_date_modified
     */
    public function setSupplierDateModified($supplier_date_modified) {
	$this->supplier_date_modified = $supplier_date_modified;
    }

    /**
     * @return mixed
     */
    public function getSupplierDateModified() {
	return $this->supplier_date_modified;
    }

    /**
     * @param mixed $supplier_email
     */
    public function setSupplierEmail($supplier_email) {
	$this->supplier_email = $supplier_email;
    }

    /**
     * @return mixed
     */
    public function getSupplierEmail() {
	return $this->supplier_email;
    }

    /**
     * @param mixed $supplier_fax
     */
    public function setSupplierFax($supplier_fax) {
	$this->supplier_fax = $supplier_fax;
    }

    /**
     * @return mixed
     */
    public function getSupplierFax() {
	return $this->supplier_fax;
    }

    /**
     * @param mixed $supplier_modified_by
     */
    public function setSupplierModifiedBy($supplier_modified_by) {
	$this->supplier_modified_by = $supplier_modified_by;
    }

    /**
     * @return mixed
     */
    public function getSupplierModifiedBy() {
	return $this->supplier_modified_by;
    }

    /**
     * @param mixed $supplier_name
     */
    public function setSupplierName($supplier_name) {
	$this->supplier_name = $supplier_name;
    }

    /**
     * @return mixed
     */
    public function getSupplierName() {
	return $this->supplier_name;
    }

    /**
     * @param mixed $supplier_phone
     */
    public function setSupplierPhone($supplier_phone) {
	$this->supplier_phone = $supplier_phone;
    }

    /**
     * @return mixed
     */
    public function getSupplierPhone() {
	return $this->supplier_phone;
    }

    /**
     * @param mixed $supplier_rep
     */
    public function setSupplierRep($supplier_rep) {
	$this->supplier_rep = $supplier_rep;
    }

    /**
     * @return mixed
     */
    public function getSupplierRep() {
	return $this->supplier_rep;
    }

    /**
     * @param mixed $supplier_rep_email
     */
    public function setSupplierRepEmail($supplier_rep_email) {
	$this->supplier_rep_email = $supplier_rep_email;
    }

    /**
     * @return mixed
     */
    public function getSupplierRepEmail() {
	return $this->supplier_rep_email;
    }

    /**
     * @param mixed $supplier_rep_fax
     */
    public function setSupplierRepFax($supplier_rep_fax) {
	$this->supplier_rep_fax = $supplier_rep_fax;
    }

    /**
     * @return mixed
     */
    public function getSupplierRepFax() {
	return $this->supplier_rep_fax;
    }

    /**
     * @param mixed $supplier_state
     */
    public function setSupplierState($supplier_state) {
	$this->supplier_state = $supplier_state;
    }

    /**
     * @return mixed
     */
    public function getSupplierState() {
	return $this->supplier_state;
    }

    /**
     * @param mixed $supplier_zip
     */
    public function setSupplierZip($supplier_zip) {
	$this->supplier_zip = $supplier_zip;
    }

    /**
     * @return mixed
     */
    public function getSupplierZip() {
	return $this->supplier_zip;
    }

    /**
     * @param $po_number
     * @return supplier_model
     * @throws Exception
     */
    public function get_supplier_from_po($po_number) {
	$query = "
			SELECT DISTINCT order_supplier_id FROM order_header WHERE order_number = ?
		";

	$result = $this->db->query(
	    $query, array(
	    $po_number
	    )
	);

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in supplier_model/get_supplier_from_po()";
	    throw new Exception($message);
	} else {

	    $supplier = new supplier_model();

	    foreach ($result->result() as $row) {
		$supplier->setId($row->order_supplier_id);
	    }
	}

	$query = "
			SELECT DISTINCT
				id,
				supplier_name,
				supplier_add_1,
				supplier_add_2,
				supplier_city,
				supplier_state,
				supplier_zip,
				supplier_phone,
				supplier_fax,
				supplier_email,
				supplier_rep,
				supplier_rep_email,
				supplier_rep_phone,
				supplier_rep_fax,
				supplier_date_created,
				supplier_created_by
			FROM
				suppliers
			WHERE
				id = ?
		";

	$id = $supplier->getId();

	$result = $this->db->query($query, array($id));

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in supplier_model/get_supplier_from_po()";
	    throw new Exception($message);
	} else {

	    $supplier = new supplier_model();

	    foreach ($result->result() as $row) {
		$supplier->setId($row->id);
		$supplier->setSupplierName($row->supplier_name);
		$supplier->setSupplierAdd1($row->supplier_add_1);
		$supplier->setSupplierAdd2($row->supplier_add_2);
		$supplier->setSupplierCity($row->supplier_city);
		$supplier->setSupplierState($row->supplier_state);
		$supplier->setSupplierZip($row->supplier_zip);
		$supplier->setSupplierPhone($row->supplier_phone);
		$supplier->setSupplierFax($row->supplier_fax);
		$supplier->setSupplierEmail($row->supplier_email);
		$supplier->setSupplierRep($row->supplier_rep);
		$supplier->setSupplierRepEmail($row->supplier_rep_email);
		$supplier->setSupplierRepPhone($row->supplier_rep_phone);
		$supplier->setSupplierRepFax($row->supplier_rep_fax);
		$supplier->setSupplierDateCreated($row->supplier_date_created);
		$supplier->setSupplierCreatedBy($row->supplier_created_by);
	    }
	}

	return $supplier;
    }

    public function exists() {

	$query = "
			SELECT supplier_name
			FROM suppliers
			LEFT JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = suppliers.id
			AND client_supplier_lkup.client_id = ?
			WHERE lower( supplier_name ) = lower(?)
		";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    $_POST['supplier_name']
	    )
	);

	return ($result->num_rows() > 0) ? true : false;
    }

    public function add_supplier() {

	$this->db->trans_start();

	//add supplier to supplier table
	$query = "
			INSERT INTO suppliers (
				supplier_name,
				supplier_add_1,
				supplier_add_2,
				supplier_city,
				supplier_state,
				supplier_zip,
				supplier_phone,
				supplier_fax,
				supplier_email,
				supplier_rep,
				supplier_rep_phone,
				supplier_rep_fax,
				supplier_rep_email,
				supplier_date_created,
				supplier_created_by
			)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,curdate(),?)
		";

	$result = $this->db->query(
	    $query, array(
	    $_POST['supplier_name'],
	    $_POST['supplier_add_1'],
	    $_POST['supplier_add_2'],
	    $_POST['supplier_city'],
	    $_POST['supplier_state'],
	    $_POST['supplier_zip'],
	    $_POST['supplier_phone'],
	    $_POST['supplier_fax'],
	    $_POST['supplier_email'],
	    $_POST['supplier_rep_name'],
	    $_POST['supplier_rep_phone'],
	    $_POST['supplier_rep_fax'],
	    $_POST['supplier_rep_email'],
	    $this->session->userdata('user_name')
	    )
	);

	//add supplier to client_supplier_lkup table
	$query = "
			INSERT INTO client_supplier_lkup (client_id, supplier_id)
			VALUES (?,?)
		";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    $this->db->insert_id()
	    )
	);

	$this->db->trans_complete();

	if ($this->db->trans_status() === false) {
	    $this->db->trans_rollback();
	    return false;
	} else {
	    $this->db->trans_commit();
	    return true;
	}
    }

    /**
     * 
     * @param string $supplier_name
     * @return array
     * @throws Exception
     * 
     * If $supplier_name is passed use it, otherwise use the post data
     * $_POST['supplier_name'] = supplier id
     * $_POST['manufacturer_name'] = manufacturer id
     */
    public function get_supplier_information($supplier_id = false) {

	$query = "
            SELECT
                suppliers.id,
                supplier_name,
                supplier_add_1,
                supplier_add_2,
                supplier_city,
                supplier_state,
                supplier_zip,
                supplier_phone,
                supplier_fax,
                supplier_email,
                supplier_rep,
                supplier_rep_phone,
                supplier_rep_fax,
                supplier_rep_email,
                supplier_date_created,
                supplier_created_by, 
                suppliers.is_active
            FROM
                suppliers
            LEFT JOIN
                client_supplier_lkup ON client_supplier_lkup.supplier_id = suppliers.id
            AND
                client_supplier_lkup.client_id = ?
            WHERE
                suppliers.id = ?
            ";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    ($supplier_id) ? $supplier_id : $_POST['supplier_name']
	    )
	);
        
        $supplier = array();

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in supplier_model/get_supplier_information()";
	    throw new Exception($message);
	} else {

	    foreach ($result->result() as $row) {
		$supplier['supplier_id'] = $row->id;
		$supplier['supplier_name'] = $row->supplier_name;
		$supplier['supplier_add_1'] = $row->supplier_add_1;
		$supplier['supplier_add_2'] = $row->supplier_add_2;
		$supplier['supplier_city'] = $row->supplier_city;
		$supplier['supplier_state'] = $row->supplier_state;
		$supplier['supplier_zip'] = $row->supplier_zip;
		$supplier['supplier_phone'] = $row->supplier_phone;
		$supplier['supplier_fax'] = $row->supplier_fax;
		$supplier['supplier_email'] = $row->supplier_email;
		$supplier['supplier_rep'] = $row->supplier_rep;
		$supplier['supplier_rep_email'] = $row->supplier_rep_email;
		$supplier['supplier_rep_phone'] = $row->supplier_rep_phone;
		$supplier['supplier_rep_fax'] = $row->supplier_rep_fax;
		$supplier['supplier_date_created'] = $row->supplier_date_created;
		$supplier['supplier_created_by'] = $row->supplier_created_by;
		$supplier['supplier_active'] = $row->is_active;
	    }
	}

	return $supplier;
    }

    public function update_supplier_information() {

	$query = 'UPDATE suppliers SET 
                supplier_name           = ?,
                supplier_add_1          = ?,
                supplier_add_2          = ?,
                supplier_city           = ?,
                supplier_state          = ?,
                supplier_zip            = ?,
                supplier_phone          = ?,
                supplier_fax            = ?,
                supplier_email          = ?,
                supplier_rep            = ?,
                supplier_rep_email      = ?,
                supplier_rep_phone      = ?,
                supplier_rep_fax        = ?,
                supplier_date_modified  = CURDATE(),
                supplier_modified_by    = ?,
                is_active               = ?
            WHERE id                    = ?';

	$supplier_active = (isset($_POST['supplier_active'])) ? 1 : 0;

	$result = $this->db->query(
	    $query, array(
	    $_POST['supplier_name'],
	    $_POST['supplier_add_1'],
	    $_POST['supplier_add_2'],
	    $_POST['supplier_city'],
	    $_POST['supplier_state'],
	    $_POST['supplier_zip'],
	    $_POST['supplier_phone'],
	    $_POST['supplier_fax'],
	    $_POST['supplier_email'],
	    $_POST['supplier_rep_name'],
	    $_POST['supplier_rep_email'],
	    $_POST['supplier_rep_phone'],
	    $_POST['supplier_rep_fax'],
	    $this->session->userdata('user_name'),
	    $supplier_active,
	    $_POST['supplier_id']
	    )
	);

	return ($result) ? true : false;
    }

    /**
     * 
     * @param type $supplier_name
     * @return boolean
     * @throws Exception
     */
    public function delete_supplier($supplier_name) {

	$query = "
			UPDATE suppliers
			LEFT JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = suppliers.id
			AND client_supplier_lkup.client_id = ?
            SET is_active = 0
			WHERE lower(supplier_name) = lower(?)
		";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    $_POST['supplier_name']
	    )
	);

	if (!$result) {
	    // if query fails
	    $message = "Query failed in supplier_model/delete_supplier()";
	    throw new Exception($message);
	} else {
	    return true;
	}
    }

    /**
     * 
     * @return \supplier_model
     */
    public function get_all_suppliers() {
	$query = "
		SELECT DISTINCT 
			suppliers.id, 
			supplier_name, 
			supplier_add_1, 
			supplier_add_2, 
			supplier_city, 
			supplier_state, 
			supplier_zip, 
			supplier_phone, 
			supplier_fax, 
			supplier_email, 
			supplier_rep, 
			supplier_rep_email, 
			supplier_rep_phone, 
			supplier_rep_fax
		FROM 
			client_supplier_lkup
		LEFT JOIN 
			suppliers 
		ON 
			client_supplier_lkup.supplier_id = suppliers.id
		WHERE 
			client_supplier_lkup.client_id = ?
		ORDER BY supplier_name ASC
		";

	$result = $this->db->query($query, array($this->session->userdata('user_client_id')));

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {

	    $suppliers = array();

	    foreach ($result->result() as $row) {

		$supplier = new supplier_model();

		$supplier->setId($row->id);
		$supplier->setSupplierName($row->supplier_name);
		$supplier->setSupplierAdd1($row->supplier_add_1);
		$supplier->setSupplierAdd2($row->supplier_add_2);
		$supplier->setSupplierCity($row->supplier_city);
		$supplier->setSupplierState($row->supplier_state);
		$supplier->setSupplierZip($row->supplier_zip);
		$supplier->setSupplierPhone($row->supplier_phone);
		$supplier->setSupplierFax($row->supplier_fax);
		$supplier->setSupplierEmail($row->supplier_email);
		$supplier->setSupplierRep($row->supplier_rep);
		$supplier->setSupplierEmail($row->supplier_rep_email);
		$supplier->setSupplierRepPhone($row->supplier_rep_phone);
		$supplier->setSupplierRepFax($row->supplier_rep_fax);

		$suppliers[] = $supplier;
	    }
	}
	return $suppliers;
    }
    
    public function getSupplierFromId($part) {
	
	$query  = '
	    SELECT 
		id, supplier_name, supplier_add_1, supplier_add_2, supplier_city, supplier_state, supplier_zip,
		supplier_phone, supplier_fax, supplier_email, supplier_rep, supplier_rep_email, supplier_rep_phone,
		supplier_rep_fax, is_active
	    FROM 
		suppliers
	    WHERE 
		id = ?';
	
	$result = $this->db->query($query, array($part['supplier_id']));

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    
	    $supplier = array();
	    
	    foreach ($result->result() as $row) {
		
		$supplier['id'] = $row->id;
		$supplier['supplier_name'] = $row->supplier_name;
		$supplier['supplier_add_1'] = $row->supplier_add_1;
		$supplier['supplier_add_2'] = $row->supplier_add_2;
		$supplier['supplier_city'] = $row->supplier_city;
		$supplier['supplier_state'] = $row->supplier_state;
		$supplier['supplier_zip'] = $row->supplier_zip;
		$supplier['supplier_phone'] = $row->supplier_phone;
		$supplier['supplier_fax'] = $row->supplier_fax;
		$supplier['supplier_email'] = $row->supplier_email;
		$supplier['supplier_rep'] = $row->supplier_rep;
		$supplier['supplier_rep_email'] = $row->supplier_rep_email;
		$supplier['supplier_rep_phone'] = $row->supplier_rep_phone;
		$supplier['supplier_rep_fax'] = $row->supplier_rep_fax;
                $part['supplier'] = $supplier;
	    }

	    return $part;
	}
    }
    
    public function get_supplier_id_from_supplier_name($supplier_name)
    {
        $query = 'SELECT client_supplier_lkup.supplier_id 
            FROM client_supplier_lkup 
            LEFT JOIN suppliers ON client_supplier_lkup.supplier_id = suppliers.id
            WHERE client_supplier_lkup.client_id = ? AND suppliers.supplier_name = ? LIMIT 1';
        
        $result = $this->db->query(
            $query, 
            array(
                $this->session->userdata('user_client_id'),
                $supplier_name
            )
        );

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();
	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {
	    foreach ($result->result() as $row) {
		$supplier_id = $row->supplier_id;
	    }
	    return $supplier_id;
	}
    }

}
