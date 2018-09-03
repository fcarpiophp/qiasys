<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class inventory_model extends CI_Model {

    /**
     *
     * @return type
     */
    public function view_inventory($start = 0, $items_per_page = 25) {
        $query = "
            SELECT 
            items.item_part_number,
	    items.item_description, 
	    suppliers.supplier_name,
	    manufacturers.manufacturer_name,
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
            LEFT JOIN item_sites 
                ON item_sites.item_id = items.id
	    LEFT JOIN client_supplier_lkup 
		    ON client_supplier_lkup.supplier_id = items.item_supplier_id
	    LEFT JOIN suppliers 
		    ON client_supplier_lkup.supplier_id = suppliers.id
	    LEFT JOIN manufacturers
		    ON items.item_manufacturer_id = manufacturers.id
	    WHERE client_supplier_lkup.client_id = ?
	    ORDER BY suppliers.supplier_name, items.item_part_number ASC
            LIMIT ?, ?";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            (int) $start,
            (int) $items_per_page
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
            $items = array();

            foreach ($result->result() as $row) {

                $item = new item_model();

                $item->set_item_part_number($row->item_part_number);
                $item->set_item_description($row->item_description);
                $item->set_supplier_name($row->supplier_name);
                $item->set_manufacturer_name($row->manufacturer_name);
                $item->set_item_uom($row->item_uom);
                $item->set_item_stock($row->item_stock);
                $item->set_item_on_order($row->item_on_order);
                $item->set_item_min($row->item_min);
                $item->set_item_max($row->item_max);
                $item->set_item_min_order($row->item_min_order);
                $item->set_item_site($row->item_site_name);
                $item->set_item_location($row->item_location);
                $item->set_item_cost($row->item_cost);
                $item->set_item_msrp($row->item_msrp);
                $item->set_item_price($row->item_price);

                $items[] = $item;
            }
        }
        return $items;
    }

    /**
     *
     * @param type $part_number
     * @return type
     */
    public function get_item_details($part_number) {
        $this->part_number = $part_number;

        $query = "
            SELECT
		items.item_supplier_id,
		items.item_manufacturer_id,
		items.item_part_number,
		items.item_description, 
		suppliers.supplier_name,
		if(manufacturers.manufacturer_name is null, 'n/a', manufacturers.manufacturer_name)
                as manufacturer_name,
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
		item_sites.item_price
	    FROM items 
            LEFT JOIN item_sites ON item_sites.item_id = items.id
            LEFT JOIN sites ON item_sites.item_site_id = sites.id
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
            $this->part_number
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
                $data[] = array(
                    'item_supplier_id' => $row->item_supplier_id,
                    'item_manufacturer_id' => $row->item_manufacturer_id,
                    'item_part_number' => $row->item_part_number,
                    'item_description' => $row->item_description,
                    'supplier_name' => $row->supplier_name,
                    'manufacturer_name' => $row->manufacturer_name,
                    'item_uom' => $row->item_uom,
                    'item_stock' => $row->item_stock,
                    'item_on_order' => $row->item_on_order,
                    'item_min' => $row->item_min,
                    'item_max' => $row->item_max,
                    'item_min_order' => $row->item_min_order,
                    'item_site' => $row->site_name,
                    'item_location' => $row->item_location,
                    'item_cost' => $row->item_cost,
                    'item_msrp' => $row->item_msrp,
                    'item_price' => $row->item_price
                );
            }
        }
        return $data;
    }

    /**
     *
     * @return int
     */
    public function count_inventory() {
        $query = "
            SELECT *
	    FROM items
	    LEFT JOIN client_supplier_lkup
		    ON client_supplier_lkup.supplier_id = items.item_supplier_id
	    LEFT JOIN suppliers
		    ON client_supplier_lkup.supplier_id = suppliers.id
	    WHERE client_supplier_lkup.client_id = ?
	";

        $result = $this->db->query(
            $query, $this->session->userdata('user_client_id')
        );

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            $num_rows = $result->num_rows();
            return $num_rows;
        }
        return 0;
    }

    /**
     *
     * @return type
     */
    public function update_item_details() {
        $query = "
            UPDATE 	
                items 
            LEFT JOIN 
                item_sites 
            ON 
                items.id = item_sites.item_id
            SET 
                items.item_supplier_id = ?, 
                items.item_manufacturer_id = ?, 
                items.item_description = ?, 
                item_sites.item_uom = ?, 
                item_sites.item_stock = ?, 
                item_sites.item_on_order = ?, 
                item_sites.item_min = ?, 
                item_sites.item_max = ?,
                item_sites.item_min_order = ?,
                item_sites.item_location = ?, 
                item_sites.item_cost = ?, 
                item_sites.item_msrp = ?, 
                item_sites.item_price = ? 
            WHERE 
                items.item_supplier_id = ? 
            AND 
                items.item_part_number = ? 
        ";

        $result = $this->db->query(
            $query, array(
            $_POST['supplier_name'],
            $_POST['manufacturer_name'],
            $_POST['item_description'],
            $_POST['item_uom'],
            $_POST['item_stock'],
            $_POST['item_on_order'],
            $_POST['item_min'],
            $_POST['item_max'],
            $_POST['item_min_order'],
            $_POST['item_location'],
            $_POST['item_cost'],
            $_POST['item_msrp'],
            $_POST['item_price'],
            $_POST['item_supplier_id'],
            $_POST['item_part_number']
            )
        );

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            return ($result) ? true : false;
        }
    }

    /**
     *
     * @param type $supplier_id
     * @return type
     */
    public function get_supplier_details($supplier_id) {
        $query = '
            SELECT 
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
                    supplier_rep_fax
            FROM
                    suppliers
            WHERE
                    id = ?';

        $result = $this->db->query($query, array($supplier_id));

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $data[] = array(
                    'id' => $row->id,
                    'supplier_name' => $row->supplier_name,
                    'supplier_add_1' => $row->supplier_add_1,
                    'supplier_add_2' => $row->supplier_add_2,
                    'supplier_city' => $row->supplier_city,
                    'supplier_state' => $row->supplier_state,
                    'supplier_zip' => $row->supplier_zip,
                    'supplier_phone' => $row->supplier_phone,
                    'supplier_fax' => $row->supplier_fax,
                    'supplier_email' => $row->supplier_email,
                    'supplier_rep' => $row->supplier_rep,
                    'supplier_rep_email' => $row->supplier_rep_email,
                    'supplier_rep_phone' => $row->supplier_rep_phone,
                    'supplier_rep_fax' => $row->supplier_rep_fax
                );
            }
        }
        return $data;
    }

    /**
     *
     * @param type $manufacturer_id
     * @return type
     */
    public function get_manufacturer_details($manufacturer_id) {
        $query = "
            SELECT 
                    id,
                    manufacturer_name,
                    manufacturer_add_1,
                    manufacturer_add_2,
                    manufacturer_city,
                    manufacturer_state,
                    manufacturer_zip,
                    manufacturer_phone,
                    manufacturer_fax,
                    manufacturer_email,
                    manufacturer_rep,
                    manufacturer_rep_email,
                    manufacturer_rep_phone,
                    manufacturer_rep_fax
            FROM 
                    manufacturers
            WHERE
                    id = ?
		";

        $result = $this->db->query($query, array($manufacturer_id));

        $data = array();

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $data[] = array(
                    'id' => $row->id,
                    'manufacturer_name' => $row->manufacturer_name,
                    'manufacturer_add_1' => $row->manufacturer_add_1,
                    'manufacturer_add_2' => $row->manufacturer_add_2,
                    'manufacturer_city' => $row->manufacturer_city,
                    'manufacturer_state' => $row->manufacturer_state,
                    'manufacturer_zip' => $row->manufacturer_zip,
                    'manufacturer_phone' => $row->manufacturer_phone,
                    'manufacturer_fax' => $row->manufacturer_fax,
                    'manufacturer_email' => $row->manufacturer_email,
                    'manufacturer_rep' => $row->manufacturer_rep,
                    'manufacturer_rep_email' => $row->manufacturer_rep_email,
                    'manufacturer_rep_phone' => $row->manufacturer_rep_phone,
                    'manufacturer_rep_fax' => $row->manufacturer_rep_fax
                );
            }
        }
        return $data;
    }

    /**
     *
     * @param type $client_id
     * @return type
     */
    public function get_all_suppliers($client_id) {
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

        $result = $this->db->query($query, array($client_id));

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $data[] = array(
                    'id' => $row->id,
                    'supplier_name' => $row->supplier_name,
                    'supplier_add_1' => $row->supplier_add_1,
                    'supplier_add_2' => $row->supplier_add_2,
                    'supplier_city' => $row->supplier_city,
                    'supplier_state' => $row->supplier_state,
                    'supplier_zip' => $row->supplier_zip,
                    'supplier_phone' => $row->supplier_phone,
                    'supplier_fax' => $row->supplier_fax,
                    'supplier_email' => $row->supplier_email,
                    'supplier_rep' => $row->supplier_rep,
                    'supplier_rep_email' => $row->supplier_rep_email,
                    'supplier_rep_phone' => $row->supplier_rep_phone,
                    'supplier_rep_fax' => $row->supplier_rep_fax
                );
            }
        }
        return $data;
    }

    /**
     *
     * @param type $client_id
     */
    public function get_all_manufacturers($client_id) {
        $query = "
            SELECT DISTINCT 
                    m.id,
                    m.manufacturer_name,
                    m.manufacturer_phone,
                    m.manufacturer_email,
                    m.manufacturer_fax,
                    m.manufacturer_add_1,
                    m.manufacturer_add_2,
                    m.manufacturer_city,
                    m.manufacturer_state,
                    m.manufacturer_zip,
                    m.manufacturer_rep,
                    m.manufacturer_rep_email,
                    m.manufacturer_rep_fax,
                    m.manufacturer_rep_phone
            FROM
                    clients c
            LEFT JOIN 
                    client_supplier_lkup csl 
            ON 
                    csl.client_id = ?
            LEFT JOIN 
                    items i 
            ON 
                    i.item_supplier_id = csl.supplier_id
            LEFT JOIN 
                    manufacturers m 
            ON 
                    i.item_manufacturer_id = m.id
            WHERE 
                    c.id = ?
            AND 
                    m.manufacturer_name <> ''
            ORDER BY manufacturer_name ASC
		";

        $result = $this->db->query(
            $query, array(
            $client_id,
            $client_id
            )
        );

        $data = array();

        if (!$result) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
            $data['msg'] = "Error(" . $num . ") " . $msg;
            $this->load->view('db_error', $data);
        } else {
            foreach ($result->result() as $row) {
                $data[] = array(
                    'id' => $row->id,
                    'manufacturer_name' => $row->manufacturer_name,
                    'manufacturer_add_1' => $row->manufacturer_add_1,
                    'manufacturer_add_2' => $row->manufacturer_add_2,
                    'manufacturer_city' => $row->manufacturer_city,
                    'manufacturer_state' => $row->manufacturer_state,
                    'manufacturer_zip' => $row->manufacturer_zip,
                    'manufacturer_phone' => $row->manufacturer_phone,
                    'manufacturer_fax' => $row->manufacturer_fax,
                    'manufacturer_email' => $row->manufacturer_email,
                    'manufacturer_rep' => $row->manufacturer_rep,
                    'manufacturer_rep_email' => $row->manufacturer_rep_email,
                    'manufacturer_rep_phone' => $row->manufacturer_rep_phone,
                    'manufacturer_rep_fax' => $row->manufacturer_rep_fax
                );
            }
        }
        return $data;
    }

    /**
     * 
     * @param array $data
     * @param type $last_insert_id
     * @return boolean
     */
    public function process_proposal(array $data, $last_insert_id, $phone, $email) {

        $this->db->trans_start();
        $i = 0;

        foreach ($data as $item) {
            //deplete inventory
            $query = "
                UPDATE item_sites
                JOIN items ON items.id = item_sites.item_id 
                SET item_sites.item_stock = item_sites.item_stock - ?
                WHERE items.item_part_number = ?
                AND items.item_supplier_id = ?
                AND item_sites.item_site_id = ?
            ";

            $this->db->query(
                $query, array(
                    $item['item_qty'],
                    $item['item_part_number'],
                    $item['supplier_id'],
                    $item['site_id']
                )
            );
        }

        //add records to the transaction header table
        $query = "
            insert into 
                sale_header
                (
                    sale_client_id, 
                    sale_user_id,
                    sale_customer_id, 
                    sale_date_created, 
                    sale_created_by,
		    sold_to_email,
		    sold_to_phone,
                    sale_site_id
                )
            values
            (?,?,?,now(),?,?,?,?)
            on duplicate key update
                sale_date_created = now()
        ";

        $this->db->query(
            $query, array(
                $item['client_id'],
                $this->session->userdata('user_name'),
                $last_insert_id,
                $this->session->userdata('user_name'),
                $email,
                $phone,
                $item['site_id']
            )
        );

        $sale_header_id = mysql_insert_id();

        $this->load->helper('luhn_helper');
        $sale_number = generate_luhn($sale_header_id);

        $query = "update sale_header set sale_id_number = ? where id = ?";

        $this->db->query(
            $query, array(
                $sale_number,
                $sale_header_id
            )
        );

        foreach ($data as $item) {
            //add records to the transaction line table
            $query = "
                insert into 
                    sale_line
                    (
                        sale_header_id, 
                        sale_line_number,
                        item_description, 
                        item_part_number,
                        item_supplier_id,
                        qty_sold,
                        sell_price,
                        sale_line_created,
                        sale_line_created_by
                    )
                values
                (?,?,?,?,?,?,?,now(),?)
                on duplicate key update sale_line_created = now()
            ";

            $this->db->query(
                $query,
                array(
                    $sale_header_id,
                    $i,
                    self::get_item_description($item['item_part_number'], $item['supplier_id'], $item['manufacturer_id']),
                    $item['item_part_number'],
                    $item['supplier_id'],
                    $item['item_qty'],
                    $item['item_price'],
                    $this->session->userdata('user_name')
                )
            );

            $i++;
        }

        // used for reporting on sales
        foreach ($data as $item) {
            $query = "
                insert into
                    sell_history (
                        supplier_id,
                        manufacturer_id,
                        item_part_number,
                        item_description,
                        client_id,
                        qty_sold,
                        cost_price,
                        sell_price,
                        msrp,
                        customer_id,
                        sold_by,
                        sell_date
                    )
                values (?,?,?,?,?,?,?,?,?,?,?,now())
            ";

            $item_array = self::get_item_details($item['item_part_number']);

            $this->db->query(
                $query, array(
                $item_array[0]['item_supplier_id'],
                $item_array[0]['item_manufacturer_id'],
                $item_array[0]['item_part_number'],
                $item_array[0]['item_description'],
                $this->session->userdata('user_client_id'),
                $item['item_qty'],
                $item_array[0]['item_cost'],
                $item['item_price'],
                $item_array[0]['item_msrp'],
                $item['client_id'],
                $this->session->userdata('user_name')
                )
            );
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            //to be usewd as transaction id for confirmation
            return $sale_number;
        }
    }

    private function get_item_description($part_number, $supplier_id, $manufacturer_id) {
        $query = "
			SELECT DISTINCT 
                item_description
            FROM
                items
            WHERE
                item_part_number = ?
            AND
                item_supplier_id = ?
            AND
                item_manufacturer_id = ?

		";

        $result = $this->db->query(
            $query, array(
            $part_number,
            $supplier_id,
            $manufacturer_id
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
                $description = $row->item_description;
            }
        }

        return $description;
    }

    public function find_po_number($po_number) {

        $query = "
            SELECT COUNT(order_number) as count_po
            FROM order_header
            WHERE order_number = ? AND order_client_id = ?";

        $result = $this->db->query(
            $query, array(
            $po_number,
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query fails
            $message = "Query failed in inventory/find_po_number()";
            throw new Exception($message);
        } else {
            foreach ($result->result() as $row) {
                $po = $row->count_po;
            }
        }

        return $po;
    }

    public function export_csv() {
        $query = "
            SELECT 
                    items.item_part_number, items.item_description, suppliers.supplier_name, manufacturers.manufacturer_name, item_sites.item_uom, 
                    item_sites.item_stock, item_sites.item_on_order, item_sites.item_min, item_sites.item_max, item_sites.item_min_order, 
                    item_sites.item_site_name, item_sites.item_location, item_sites.item_cost, item_sites.item_msrp, item_sites.item_price, 
                    item_sites.item_price - item_sites.item_cost as gp_dollar, ((item_sites.item_price - item_sites.item_cost) / item_sites.item_cost * 100) 	
                    as gp_percent 
            FROM items 
            LEFT JOIN item_sites ON item_sites.item_id = items.id 
            LEFT JOIN client_supplier_lkup ON client_supplier_lkup.supplier_id = items.item_supplier_id 
            LEFT JOIN suppliers ON client_supplier_lkup.supplier_id = suppliers.id 
            LEFT JOIN manufacturers ON items.item_manufacturer_id = manufacturers.id 
            WHERE client_supplier_lkup.client_id = " . $this->session->userdata('user_client_id') . "
            ORDER BY suppliers.supplier_name, items.item_part_number ASC";

        $this->load->dbutil();
        $delimiter = ",";
        $newline = "\r\n";
        $result = $this->db->query($query, array($this->session->userdata('user_client_id')));

        return $this->dbutil->csv_from_result($result, $delimiter, $newline);
    }

}
