<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author Francisco
 */
class item_model extends CI_Model {

    private $item_part_number;
    private $item_description;
    private $supplier_name;
    private $manufacturer_name;
    private $item_uom;
    private $item_stock;
    private $item_on_order;
    private $item_min;
    private $item_max;
    private $item_min_order;
    private $item_site;
    private $item_location;
    private $item_cost;
    private $item_msrp;
    private $item_price;
    private $gp_dollar;
    private $gp_percent;
    private $item_site_id;

    public function get_item_site_id() {
        return $this->item_site_id;
    }

    public function set_item_site_id($item_site_id) {
        $this->item_site_id = $item_site_id;
    }

    public function get_item_part_number() {
        return $this->item_part_number;
    }

    public function set_item_part_number($item_part_number) {
        $this->item_part_number = $item_part_number;
    }

    public function get_item_description() {
        return $this->item_description;
    }

    public function set_item_description($item_description) {
        $this->item_description = $item_description;
    }

    public function get_supplier_name() {
        return $this->supplier_name;
    }

    public function set_supplier_name($supplier_name) {
        $this->supplier_name = $supplier_name;
    }

    public function get_manufacturer_name() {
        return $this->manufacturer_name;
    }

    public function set_manufacturer_name($manufacturer_name) {
        $this->manufacturer_name = $manufacturer_name;
    }

    public function get_item_uom() {
        return $this->item_uom;
    }

    public function set_item_uom($item_uom) {
        $this->item_uom = $item_uom;
    }

    public function get_item_stock() {
        return $this->item_stock;
    }

    public function set_item_stock($item_stock) {
        $this->item_stock = $item_stock;
    }

    public function get_item_on_order() {
        return $this->item_on_order;
    }

    public function set_item_on_order($item_on_order) {
        $this->item_on_order = $item_on_order;
    }

    public function get_item_min() {
        return $this->item_min;
    }

    public function set_item_min($item_min) {
        $this->item_min = $item_min;
    }

    public function get_item_max() {
        return $this->item_max;
    }

    public function set_item_max($item_max) {
        $this->item_max = $item_max;
    }

    public function get_item_min_order() {
        return $this->item_min_order;
    }

    public function set_item_min_order($item_min_order) {
        $this->item_min_order = $item_min_order;
    }

    public function get_item_site() {
        return $this->item_site;
    }

    public function set_item_site($item_site) {
        $this->item_site = $item_site;
    }

    public function get_item_location() {
        return $this->item_location;
    }

    public function set_item_location($item_location) {
        $this->item_location = $item_location;
    }

    public function get_item_cost() {
        return number_format($this->item_cost, 2, '.', '');
    }

    public function set_item_cost($item_cost) {
        $this->item_cost = $item_cost;
    }

    public function get_item_msrp() {
        return number_format($this->item_msrp, 2, '.', '');
    }

    public function set_item_msrp($item_msrp) {
        $this->item_msrp = $item_msrp;
    }

    public function get_item_price() {
        return number_format($this->item_price, 2, '.', '');
    }

    public function set_item_price($item_price) {
        $this->item_price = $item_price;
    }

    public function get_gp_dollar() {
        return number_format($this->gp_dollar, 2, '.', '');
    }

    public function set_gp_dollar($gp_dollar) {
        $this->gp_dollar = $gp_dollar;
    }

    public function get_gp_percent() {
        return number_format($this->gp_percent, 2, '.', '');
    }

    public function set_gp_percent($gp_percent) {
        $this->gp_percent = $gp_percent;
    }

    public function get_item_manufacturer_id() {
        return $this->item_manufacturer_id;
    }

    public function set_item_manufacturer_id($item_manufacturer_id) {
        $this->item_manufacturer_id = $item_manufacturer_id;
    }

    public function get_item_supplier_id() {
        return $this->item_supplier_id;
    }

    public function set_item_supplier_id($item_supplier_id) {
        $this->item_supplier_id = $item_supplier_id;
    }

    public function instantiateItemFromPartNumber($part_number) {
        $query = "
            SELECT 
                items.item_part_number,
                items.item_description, 
                suppliers.supplier_name,
                manufacturers.manufacturer_name,
                items.item_manufacturer_id,
                items.item_supplier_id,
                item_sites.item_uom, 
                item_sites.item_stock, 
                item_sites.item_on_order, 
                item_sites.item_min, 
                item_sites.item_max, 
                item_sites.item_min_order,
                sites.site_name, 
                item_sites.item_location, 
                item_sites.item_cost, 
                item_sites.item_msrp, 
                item_sites.item_price,
                item_sites.item_price - item_sites.item_cost as gp_dollar,
                ((item_sites.item_price - item_sites.item_cost) / item_sites.item_cost * 100) as gp_percent,
                item_sites.item_site_id
            FROM items 
            LEFT JOIN item_sites ON item_sites.item_id = items.id
            LEFT JOIN sites ON sites.id = item_sites.item_site_id
            LEFT JOIN client_supplier_lkup 
                    ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN suppliers 
                    ON client_supplier_lkup.supplier_id = suppliers.id
            LEFT JOIN manufacturers
                    ON items.item_manufacturer_id = manufacturers.id
            WHERE client_supplier_lkup.client_id = ?
            AND items.item_part_number = ?
            ORDER BY suppliers.supplier_name ASC";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $part_number
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
                self::set_item_part_number($row->item_part_number);
                self::set_item_description($row->item_description);
                self::set_supplier_name($row->supplier_name);
                self::set_manufacturer_name($row->manufacturer_name);
                self::set_item_manufacturer_id($row->item_manufacturer_id);
                self::set_item_supplier_id($row->item_supplier_id);
                self::set_item_uom($row->item_uom);
                self::set_item_stock($row->item_stock);
                self::set_item_on_order($row->item_on_order);
                self::set_item_min($row->item_min);
                self::set_item_max($row->item_max);
                self::set_item_min_order($row->item_min_order);
                self::set_item_site($row->site_name);
                self::set_item_location($row->item_location);
                self::set_item_cost($row->item_cost);
                self::set_item_msrp($row->item_msrp);
                self::set_item_price($row->item_price);
                self::set_gp_dollar($row->gp_dollar);
                self::set_gp_percent($row->gp_percent);
                self::set_item_site_id($row->item_site_id);
            }
        }
    }

    public function add_to_cart(item_model $item) {
        //start cart logic here
        //check if car exists with user id, client id and is active
        //if exists and active, add to existing cart
        //if carts exist but not active, prompt wich cart to use, make active and add to that cart
        //if only one inactive cart exists, don't as and add to cart and make active
        //else create a new cart and add to cart
        $query = "
            INSERT INTO carts (
                    cart_id, 
                    cart_client_id,
                    cart_user_id,
                    cart_manufacturer_id,
                    cart_supplier_id,
                    cart_description,
                    cart_qty,
                    cart_part_number,
                    cart_uom,
                    cart_stock,
                    cart_on_order,
                    cart_site,
                    cart_location,
                    cart_cost,
                    cart_msrp,
                    cart_price,
                    is_active,
                    date_created
            ) VALUES (
                    CONCAT(
                            '" . $this->session->userdata('id') . "',
                            '" . $this->session->userdata('user_client_id') . "',
                            '" . date('mdYHis') . "'
                    ),
                    '" . $this->session->userdata('user_client_id') . "',
                    '" . $this->session->userdata('id') . "',
                    '" . $item->get_item_manufacturer_id() . "',
                    '" . $item->get_item_supplier_id() . "',
                    '" . $item->get_item_description() . "',
                    '" . $this->input->post('item_qty') . "',
                    '" . $item->get_item_part_number() . "',
                    '" . $item->get_item_uom() . "',
                    '" . $item->get_item_stock() . "',
                    '" . $item->get_item_on_order() . "',
                    '" . $item->get_item_site() . "',
                    '" . $item->get_item_location() . "',
                    '" . $item->get_item_cost() . "',
                    '" . $item->get_item_msrp() . "',
                    '" . $item->get_item_price() . "',
                    0,
                    CURDATE()
            )
            ON DUPLICATE KEY UPDATE cart_qty=cart_qty + " . $this->input->post('item_qty');

        if (!$this->db->query($query)) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function exists($part_number, $supplier_id) {

        $query = "SELECT DISTINCT item_part_number, item_supplier_id"
            . " FROM items"
            . " LEFT JOIN client_supplier_lkup"
            . " ON client_id = ? AND supplier_id = ?"
            . " WHERE"
            . " item_part_number = ? AND item_supplier_id = ?";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $supplier_id,
            $part_number,
            $supplier_id
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in item_model/exists()";
            throw new Exception($message);
        }

        return ($result->num_rows() > 0) ? true : false;
    }

    /**
     * 
     * @return boolean
     */
    public function add() {

        $query = "INSERT INTO items "
            . "(item_manufacturer_id, item_supplier_id, item_description, item_part_number, "
            . "item_date_created, item_created_by) "
            . "VALUES "
            . "(?,?,?,?,now(),?)";

        $result = $this->db->query(
            $query, array(
            $_POST['manufacturer_name'], // id
            $_POST['supplier_name'], // id
            $_POST['item_description'],
            $_POST['part_number'],
            $this->session->userdata('user_name')
            )
        );

        $last_insert_id = $this->db->insert_id();

        if (!$result) {
            // if query returns null
            $message = "Query failed in item_model/add()";
            throw new Exception($message);
        }

        $query = 'INSERT INTO item_sites '
            . '(item_id, item_uom, item_stock, item_min, item_max, item_min_order, item_site_id, '
            . 'item_site_name, item_location, item_cost, item_msrp, item_price, is_active, created_date, '
            . 'created_by) '
            . 'VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?)';

        foreach ($_POST['item_uom'] as $k => $v) {

            if ($v != '') {
                $result = $this->db->query(
                    $query,
                    array(
                        $last_insert_id,
                        $_POST['item_uom'][$k],
                        $_POST['item_stock'][$k],
                        $_POST['item_min'][$k],
                        $_POST['item_max'][$k],
                        $_POST['item_min_order'][$k],
                        $_POST['site_id'][$k],
                        $_POST['site_name'][$k],
                        $_POST['item_location'][$k],
                        $_POST['item_cost'][$k],
                        $_POST['item_msrp'][$k],
                        $_POST['item_price'][$k],
                        true,
                        $this->session->userdata('user_name')
                    )
                );
            }

            if (!$result) {
                // if query returns null
                $message = "Query failed in item_model/add()";
                throw new Exception($message);
            }
        }

        return true;
    }

    public function get_part_numbers() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();

        $query = 'SELECT DISTINCT items.item_part_number
            FROM items
            JOIN client_supplier_lkup 
            ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN item_sites on items.id = item_sites.item_id
            LEFT JOIN sites ON item_sites.item_site_id = sites.id
            WHERE client_supplier_lkup.client_id = ? AND item_sites.is_active = true';

        if (($permissions->getIronMan() || $permissions->getAdmin())) {
            $query .= ' AND item_sites.item_site_id = ' . $this->session->userdata('user_site_id');
        }



        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in item_model/get_part_numbers()";
            throw new Exception($message);
        } else {

            $part_numbers = array();

            foreach ($result->result() as $row) {
                $part_numbers[] = $row->item_part_number;
            }

            return $part_numbers;
        }
    }

    public function get_item_information() {

        $query = "SELECT items.id, item_part_number, item_description, item_supplier_id, item_manufacturer_id, 
            item_uom, item_min, item_max, item_min_order, item_cost, item_msrp, item_price, is_active, items.id,
            item_site_id, item_site_name, item_stock, item_location
            FROM items
            JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN item_sites ON items.id = item_sites.item_id
            AND client_id = ?
            WHERE item_part_number = ?";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $_POST['part_number']
            )
        );

        $item = array();

        if (!$result) {
            // if query returns null
            $message = "Query failed in item_model/get_item_information()";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {
                $item['item_part_number'][] = $row->item_part_number;
                $item['item_description'][] = $row->item_description;
                $item['item_supplier_id'][] = $row->item_supplier_id;
                $item['item_manufacturer_id'][] = $row->item_manufacturer_id;
                $item['item_uom'][] = $row->item_uom;
                $item['item_min'][] = $row->item_min;
                $item['item_max'][] = $row->item_max;
                $item['item_min_order'][] = $row->item_min_order;
                $item['item_cost'][] = $row->item_cost;
                $item['item_msrp'][] = $row->item_msrp;
                $item['item_price'][] = $row->item_price;
                $item['is_active'][] = $row->is_active;
                $item['item_id'][] = $row->id;
                $item['item_site_id'][] = $row->item_site_id;
                $item['item_site_name'][] = $row->item_site_name;
                $item['item_stock'][] = $row->item_stock;
                $item['item_location'][] = $row->item_location;
            }

            return $item;
        }
    }

    public function update() {

        $this->db->trans_begin();

        $query = 'INSERT INTO items 
                    (items.id, 
                    items.item_part_number, 
                    items.item_supplier_id, 
                    items.item_manufacturer_id, 
                    items.item_description, 
                    items.item_date_created, 
                    items.item_created_by)  
                VALUES (?,?,?,?,?,now(),?) 
                ON DUPLICATE KEY UPDATE 
                    items.item_supplier_id    = ?,
                    items.item_manufacturer_id = ?,
                    items.item_description    = ?,
                    items.item_date_modified  = now(),
                    items.item_modified_by    = ?';

        $item_active = (isset($_POST['item_active'])) ? 1 : 0;

        $result = $this->db->query(
            $query, array(
            $_POST['part_id'],
            $_POST['part_number'],
            $_POST['supplier_name'], // this is the supplier id
            $_POST['manufacturer_name'], // this is the manufacturer id
            $_POST['item_description'],
            $this->session->userdata('user_name'),
            $_POST['supplier_name'], // this is the supplier id
            $_POST['manufacturer_name'], // this is the manufacturer id
            $_POST['item_description'],
            $this->session->userdata('user_name')
            )
        );

        $query = 'INSERT INTO item_sites '
            . '(item_id, '
            . 'item_site_id, '
            . 'item_site_name, '
            . 'item_uom, '
            . 'item_stock, '
            . 'item_min, '
            . 'item_max, '
            . 'item_min_order, '
            . 'item_location, '
            . 'item_cost, '
            . 'item_msrp, '
            . 'item_price, '
            . 'is_active, '
            . 'created_date, '
            . 'created_by) '
            . 'VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, now(),?) '
            . 'ON DUPLICATE KEY UPDATE '
            . 'item_uom = ?, '
            . 'item_stock = ?, '
            . 'item_min = ?, '
            . 'item_max = ? ,'
            . 'item_min_order = ?, '
            . 'item_location = ?, '
            . 'item_cost = ?, '
            . 'item_msrp = ?, '
            . 'item_price = ?, '
            . 'is_active = ?, '
            . 'modified_date = now(), '
            . 'modified_by = ?';

        foreach ($_POST['item_cost'] as $k => $v) {

            if (!empty($_POST['item_uom'][$k])) {
                $result = $this->db->query(
                    $query, array(
                    $_POST['part_id'],
                    $_POST['site_id'][$k],
                    $_POST['site_name'][$k],
                    $_POST['item_uom'][$k],
                    $_POST['item_stock'][$k],
                    $_POST['item_min'][$k],
                    $_POST['item_max'][$k],
                    $_POST['item_min_order'][$k],
                    $_POST['item_location'][$k],
                    $_POST['item_cost'][$k],
                    $_POST['item_msrp'][$k],
                    $_POST['item_price'][$k],
                    ($_POST['is_active_hidden'][$k] == 'yes') ? true : false,
                    $this->session->userdata('user_name'),
                    $_POST['item_uom'][$k],
                    $_POST['item_stock'][$k],
                    $_POST['item_min'][$k],
                    $_POST['item_max'][$k],
                    $_POST['item_min_order'][$k],
                    $_POST['item_location'][$k],
                    $_POST['item_cost'][$k],
                    $_POST['item_msrp'][$k],
                    $_POST['item_price'][$k],
                    ($_POST['is_active_hidden'][$k] == 'yes') ? true : false,
                    $this->session->userdata('user_name')
                    )
                );
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_supplier_id_from_part_number($part_number) {

        $query = '  SELECT item_supplier_id
                    FROM items
                    LEFT JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = items.item_supplier_id
                    AND client_id = ?
                    WHERE item_part_number = ?';

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $part_number,
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in item_model/get_supplier_id_from_part_number()";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {
                $supplier_id = $row->item_supplier_id;
            }

            return !isset($supplier_id) ? '' : $supplier_id;
        }
    }

    public function delete($part_number) {

        $values = $_POST;

        $this->db->trans_begin();

        $query = 'UPDATE item_sites SET is_active = ? WHERE item_site_id = ? AND item_id = ?';

        foreach ($values['is_active_hidden'] as $k => $v) {

            if ($v == 'yes') {
                $values['is_active_hidden'][$k] = 1;
            } else {
                $values['is_active_hidden'][$k] = 0;
            }

            $result = $this->db->query(
                $query, array(
                $values['is_active_hidden'][$k],
                $k,
                $values['part_id']
                )
            );
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $message = "Query failed in item_model/delete()";
            throw new Exception($message);
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
