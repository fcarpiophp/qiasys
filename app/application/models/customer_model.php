<?php

/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 11/11/13
 * Time: 6:36 PM
 */
class customer_model extends CI_Model {

    /**
     *
     * @var int
     */
    private $sale_id_number;

    /**
     *
     * @var string
     */
    private $sold_to;

    /**
     *
     * @var string
     */
    private $sold_by;

    /**
     *
     * @var date/time
     */
    private $sale_date;

    /**
     *
     * @var int
     */
    private $sale_line_number;

    /**
     *
     * @var string
     */
    private $item_part_number;

    /**
     *
     * @var string
     */
    private $item_description;

    /**
     *
     * @var int
     */
    private $qty_sold;

    /**
     *
     * @var float
     */
    private $sell_price;

    /**
     *
     * @var float
     */
    private $total;

    public function getSale_id_number() {
	return $this->sale_id_number;
    }

    public function getSold_to() {
	return $this->sold_to;
    }

    public function getSold_by() {
	return $this->sold_by;
    }

    public function getSale_date() {
	return $this->sale_date;
    }

    public function getSale_line_number() {
	return $this->sale_line_number;
    }

    public function getItem_part_number() {
	return $this->item_part_number;
    }

    public function getItem_description() {
	return $this->item_description;
    }

    public function getQty_sold() {
	return $this->qty_sold;
    }

    public function getSell_price() {
	return $this->sell_price;
    }

    public function getTotal() {
	return $this->total;
    }

    public function setSale_id_number($sale_id_number) {
	$this->sale_id_number = $sale_id_number;
    }

    public function setSold_to($sold_to) {
	$this->sold_to = $sold_to;
    }

    public function setSold_by($sold_by) {
	$this->sold_by = $sold_by;
    }

    public function setSale_date($sale_date) {
	$this->sale_date = $sale_date;
    }

    public function setSale_line_number($sale_line_number) {
	$this->sale_line_number = $sale_line_number;
    }

    public function setItem_part_number($item_part_number) {
	$this->item_part_number = $item_part_number;
    }

    public function setItem_description($item_description) {
	$this->item_description = $item_description;
    }

    public function setQty_sold($qty_sold) {
	$this->qty_sold = $qty_sold;
    }

    public function setSell_price($sell_price) {
	$this->sell_price = $sell_price;
    }

    public function setTotal($total) {
	$this->total = $total;
    }

    /**
     * 
     * @return int
     */
    public function add_update_customer() {
	$query = "
            insert into customers
                (client_id,
                first_name,
                last_name,
                email,
                phone,
                address1,
                address2,
                city,
                state,
                zip,
                created_by,
                created_on)
            values
                (?,?,?,?,?,?,?,?,?,?,?,now())
            on duplicate key update 
                first_name = ?,
                last_name = ?,
                email = ?,
                phone = ?,
                address1 = ?,
                address2 = ?,
                city = ?,
                state = ?,
                zip = ?,
                modified_by = ?,
                modified_on = now()
        ";

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    $_POST['firstName'],
	    $_POST['lastName'],
	    $_POST['email'],
	    $_POST['phone'],
	    $_POST['address1'],
	    $_POST['address2'],
	    $_POST['city'],
	    $_POST['state'],
	    $_POST['zip'],
	    $this->session->userdata('user_name'),
	    $_POST['firstName'],
	    $_POST['lastName'],
	    $_POST['email'],
	    $_POST['phone'],
	    $_POST['address1'],
	    $_POST['address2'],
	    $_POST['city'],
	    $_POST['state'],
	    $_POST['zip'],
	    $this->session->userdata('user_name'),
	    )
	);

	if (!$result) {
	    // if query returns null
	    $msg = $this->db->_error_message();
	    $num = $this->db->_error_number();

	    $data['msg'] = "Error(" . $num . ") " . $msg;
	    $this->load->view('db_error', $data);
	    return;
	}
	
	return $this->db->insert_id();
    }

    //
    public function search_orders() {

	$this->load->model('sale_header');
	$sales = new sale_header();
	return $sales->getSales($_POST['email'], $_POST['phone']);

    }

}
