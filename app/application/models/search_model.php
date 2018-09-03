<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author Francisco
 */
class search_model extends CI_Model {

    /**
     * @var
     */
    private $item_part_number;

    /**
     * @var
     */
    private $item_description;

    /**
     * @var
     */
    private $supplier_name;

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
    private $item_min;

    /**
     * @var
     */
    private $item_max;

    /**
     * @var
     */
    private $item_min_order;

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
    private $gp_dollar;

    /**
     * @var
     */
    private $gp_percent;

    /**
     * @param mixed $gp_dollar
     */
    public function setGpDollar($gp_dollar) {
	$this->gp_dollar = $gp_dollar;
    }

    /**
     * @return mixed
     */
    public function getGpDollar() {
	return $this->gp_dollar;
    }

    /**
     * @param mixed $gp_percent
     */
    public function setGpPercent($gp_percent) {
	$this->gp_percent = $gp_percent;
    }

    /**
     * @return mixed
     */
    public function getGpPercent() {
	return $this->gp_percent;
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
     * @param mixed $item_max
     */
    public function setItemMax($item_max) {
	$this->item_max = $item_max;
    }

    /**
     * @return mixed
     */
    public function getItemMax() {
	return $this->item_max;
    }

    /**
     * @param mixed $item_min
     */
    public function setItemMin($item_min) {
	$this->item_min = $item_min;
    }

    /**
     * @return mixed
     */
    public function getItemMin() {
	return $this->item_min;
    }

    /**
     * @param mixed $item_min_order
     */
    public function setItemMinOrder($item_min_order) {
	$this->item_min_order = $item_min_order;
    }

    /**
     * @return mixed
     */
    public function getItemMinOrder() {
	return $this->item_min_order;
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
     * @return array
     */
    function search_item($permission) {
	$query = "
            SELECT 
                items.item_part_number,
                items.item_description, 
                suppliers.supplier_name,
                item_sites.item_uom, 
                item_sites.item_stock, 
                item_sites.item_on_order, 
                item_sites.item_min, 
                item_sites.item_max, 
                item_sites.item_min_order,
                item_sites.item_site_name, 
                item_sites.item_location, 
                item_sites.item_cost, 
                item_sites.item_msrp, 
                item_sites.item_price,
                item_sites.item_price - item_sites.item_cost as gp_dollar,
                ((item_sites.item_price - item_sites.item_cost) / item_sites.item_cost * 100) as gp_percent
            FROM items 
            LEFT JOIN item_sites ON item_sites.item_id = items.id
            LEFT JOIN client_supplier_lkup 
                    ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN suppliers 
                    ON client_supplier_lkup.supplier_id = suppliers.id	
            WHERE client_supplier_lkup.client_id = ? AND item_sites.is_active = true";
        
        if (!($permission->getIronMan() || $permission->getAdmin()) ) {
            $query .= " AND item_sites.item_site_id = ".$this->session->userdata('user_site_id');
        }

	if ($this->input->post('item_part_number')) {
	    $query .= " AND items.item_part_number like '%" . $this->input->post('item_part_number') . "%'";
	}

	if ($this->input->post('item_description')) {
	    $query .= " AND (items.item_description = '" . $this->input->post('item_description') . "' OR
			items.item_description like '%" . $this->input->post('item_description') . "%')";
	}

	if ($this->input->post('supplier_name')) {
	    $query .= " AND (suppliers.supplier_name = '" . $this->input->post('supplier_name') . "' OR
			suppliers.supplier_name like '%" . $this->input->post('supplier_name') . "%')";
	}

	if ($this->input->post('item_site')) {
	    $query .= " AND (items.item_description = '" . $this->input->post('item_site') . "' OR
			items.item_site like '%" . $this->input->post('item_site') . "%')";
	}

	if ($this->input->post('general')) {
	    $query .= " AND (items.item_part_number = '" . $this->input->post('general') . "' OR (
			items.item_part_number like '%" . $this->input->post('general') . "%')";
	    $query .= " OR (items.item_description like '%" . $this->input->post('general') . "%')";
	    $query .= " OR (suppliers.supplier_name like '%" . $this->input->post('general') . "%'))";
	}

	$query .= " ORDER BY suppliers.supplier_name, items.item_part_number ASC";
	$data = array();
	$result = $this->db->query($query, array($this->session->userdata('user_client_id')));

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	} else {

	    foreach ($result->result() as $row) {

		$search = new search_model();

		$search->setItemPartNumber($row->item_part_number);
		$search->setItemDescription($row->item_description);
		$search->setSupplierName($row->supplier_name);
		$search->setItemUom($row->item_uom);
		$search->setItemStock($row->item_stock);
		$search->setItemOnOrder($row->item_on_order);
		$search->setItemMin($row->item_min);
		$search->setItemMax($row->item_max);
		$search->setItemMinOrder($row->item_min_order);
		$search->setItemSite($row->item_site_name);
		$search->setItemLocation($row->item_location);
		$search->setItemCost(number_format($row->item_cost, 2, '.', ''));
		$search->setItemMsrp(number_format($row->item_msrp, 2, '.', ''));
		$search->setItemPrice(number_format($row->item_price, 2, '.', ''));
		$search->setGpDollar(number_format($row->gp_dollar, 2, '.', ''));
		$search->setGpPercent(number_format($row->gp_percent, 2, '.', ''));

		$searches[] = $search;
	    }
	}

	if (!isset($searches)) {
	    $search = new search_model();
	    $searches[] = $search;
	}

	return $searches;
    }

}

?>
