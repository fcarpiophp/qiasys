<?php

/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 1/21/14
 * Time: 8:34 AM
 */
class order_model extends CI_Model {

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $order_supplier_id;

    /**
     * @var
     */
    private $order_client_id;

    /**
     * @var
     */
    private $order_user_id;

    /**
     * @var
     */
    private $order_ship_to;

    /**
     * @var
     */
    private $order_bill_to;

    /**
     * @var
     */
    private $order_type;

    /**
     * @var
     */
    private $order_number;

    /**
     * @var
     */
    private $email_status;
    
    /**
     *
     * @var type string
     */
    private $order_site_name;
    
    /**
     *
     * @var type int
     */
    private $order_site_id;

    /**
     * @var
     */
    private $order_date_created;

    /**
     * @var
     */
    private $order_created_by;

    /**
     * @var
     */
    private $order_modified;

    /**
     * @var
     */
    private $order_modified_by;

    /**
     * @var
     */
    private $order_header_id;

    /**
     * @var
     */
    private $order_line_num;

    /**
     * @var
     */
    private $item_description;

    /**
     * @var
     */
    private $item_part_number;

    /**
     * @var
     */
    private $requisition_line_qty_ordered;

    /**
     * @var
     */
    private $requisition_line_qty_received;

    /**
     * @var
     */
    private $requisition_line_price;

    /**
     * @var
     */
    private $order_line_created;

    /**
     * @var
     */
    private $order_line_created_by;

    /**
     * @var
     */
    private $order_line_modified;

    /**
     * @var
     */
    private $order_line_modified_by;

    /**
     * @var
     */
    private $item_uom;
    
    /**
     * 
     * @return string
     */
    public function get_order_site_name() {
        return $this->order_site_name;
    }

    /**
     * 
     * @return int
     */
    public function get_order_site_id() {
        return $this->order_site_id;
    }

    /**
     * 
     * @param string $order_site_name
     */
    public function set_order_site_name($order_site_name) {
        $this->order_site_name = $order_site_name;
    }

    /**
     * 
     * @param int $order_site_id
     */
    public function set_order_site_id($order_site_id) {
        $this->order_site_id = $order_site_id;
    }

    
    /**
     * @param mixed $email_status
     */
    public function setEmailStatus($email_status) {
        $this->email_status = $email_status;
    }

    /**
     * @return mixed
     */
    public function getEmailStatus() {
        return $this->email_status;
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
     * @param mixed $order_bill_to
     */
    public function setOrderBillTo($order_bill_to) {
        $this->order_bill_to = $order_bill_to;
    }

    /**
     * @return mixed
     */
    public function getOrderBillTo() {
        return $this->order_bill_to;
    }

    /**
     * @param mixed $order_client_id
     */
    public function setOrderClientId($order_client_id) {
        $this->order_client_id = $order_client_id;
    }

    /**
     * @return mixed
     */
    public function getOrderClientId() {
        return $this->order_client_id;
    }

    /**
     * @param mixed $order_created_by
     */
    public function setOrderCreatedBy($order_created_by) {
        $this->order_created_by = $order_created_by;
    }

    /**
     * @return mixed
     */
    public function getOrderCreatedBy() {
        return $this->order_created_by;
    }

    /**
     * @param mixed $order_date_created
     */
    public function setOrderDateCreated($order_date_created) {
        $this->order_date_created = $order_date_created;
    }

    /**
     * @return mixed
     */
    public function getOrderDateCreated() {
        return $this->order_date_created;
    }

    /**
     * @param mixed $order_header_id
     */
    public function setOrderHeaderId($order_header_id) {
        $this->order_header_id = $order_header_id;
    }

    /**
     * @return mixed
     */
    public function getOrderHeaderId() {
        return $this->order_header_id;
    }

    /**
     * @param mixed $order_line_created
     */
    public function setOrderLineCreated($order_line_created) {
        $this->order_line_created = $order_line_created;
    }

    /**
     * @return mixed
     */
    public function getOrderLineCreated() {
        return $this->order_line_created;
    }

    /**
     * @param mixed $order_line_created_by
     */
    public function setOrderLineCreatedBy($order_line_created_by) {
        $this->order_line_created_by = $order_line_created_by;
    }

    /**
     * @return mixed
     */
    public function getOrderLineCreatedBy() {
        return $this->order_line_created_by;
    }

    /**
     * @param mixed $order_line_modified
     */
    public function setOrderLineModified($order_line_modified) {
        $this->order_line_modified = $order_line_modified;
    }

    /**
     * @return mixed
     */
    public function getOrderLineModified() {
        return $this->order_line_modified;
    }

    /**
     * @param mixed $order_line_modified_by
     */
    public function setOrderLineModifiedBy($order_line_modified_by) {
        $this->order_line_modified_by = $order_line_modified_by;
    }

    /**
     * @return mixed
     */
    public function getOrderLineModifiedBy() {
        return $this->order_line_modified_by;
    }

    /**
     * @param mixed $order_line_num
     */
    public function setOrderLineNum($order_line_num) {
        $this->order_line_num = $order_line_num;
    }

    /**
     * @return mixed
     */
    public function getOrderLineNum() {
        return $this->order_line_num;
    }

    /**
     * @param mixed $order_modified
     */
    public function setOrderModified($order_modified) {
        $this->order_modified = $order_modified;
    }

    /**
     * @return mixed
     */
    public function getOrderModified() {
        return $this->order_modified;
    }

    /**
     * @param mixed $order_modified_by
     */
    public function setOrderModifiedBy($order_modified_by) {
        $this->order_modified_by = $order_modified_by;
    }

    /**
     * @return mixed
     */
    public function getOrderModifiedBy() {
        return $this->order_modified_by;
    }

    /**
     * @param mixed $order_number
     */
    public function setOrderNumber($order_number) {
        $this->order_number = $order_number;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber() {
        return $this->order_number;
    }

    /**
     * @param mixed $order_ship_to
     */
    public function setOrderShipTo($order_ship_to) {
        $this->order_ship_to = $order_ship_to;
    }

    /**
     * @return mixed
     */
    public function getOrderShipTo() {
        return $this->order_ship_to;
    }

    /**
     * @param mixed $order_supplier_id
     */
    public function setOrderSupplierId($order_supplier_id) {
        $this->order_supplier_id = $order_supplier_id;
    }

    /**
     * @return mixed
     */
    public function getOrderSupplierId() {
        return $this->order_supplier_id;
    }

    /**
     * @param mixed $order_type
     */
    public function setOrderType($order_type) {
        $this->order_type = $order_type;
    }

    /**
     * @return mixed
     */
    public function getOrderType() {
        return $this->order_type;
    }

    /**
     * @param mixed $order_user_id
     */
    public function setOrderUserId($order_user_id) {
        $this->order_user_id = $order_user_id;
    }

    /**
     * @return mixed
     */
    public function getOrderUserId() {
        return $this->order_user_id;
    }

    /**
     * @param mixed $requisition_line_price
     */
    public function setRequisitionLinePrice($requisition_line_price) {
        $this->requisition_line_price = $requisition_line_price;
    }

    /**
     * @return mixed
     */
    public function getRequisitionLinePrice() {
        return $this->requisition_line_price;
    }

    /**
     * @param mixed $requisition_line_qty_ordered
     */
    public function setRequisitionLineQtyOrdered($requisition_line_qty_ordered) {
        $this->requisition_line_qty_ordered = $requisition_line_qty_ordered;
    }

    /**
     * @return mixed
     */
    public function getRequisitionLineQtyOrdered() {
        return $this->requisition_line_qty_ordered;
    }

    /**
     * @param $requisition_line_qty_received
     */
    public function setRequisitionLineQtyReceived($requisition_line_qty_received) {
        $this->requisition_line_qty_received = $requisition_line_qty_received;
    }

    /**
     * @return mixed
     */
    public function getRequisitionLineQtyReceived() {
        return $this->requisition_line_qty_received;
    }

    /**
     * @param $item_uom
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
     * @param $data
     * @return bool
     */
    public function insert_order($data) {

        //start transaction
        $this->db->trans_begin();

        //insert order_header table
        //I NEED TO ADD 'SITE' TO THE ORDER HEADER
        $query = "
	    INSERT INTO
		order_header
		(
		    order_supplier_id,
		    order_client_id,
		    order_user_id,
		    order_ship_to,
		    order_bill_to,
		    order_type,
		    order_number,
		    order_date_created,
		    order_created_by
		)
	    VALUES
		(
		    ?,?,?,?,?,'PO',?,now(),?
		)
	    ";

        $conditions = array(
            $data['supplier']->get_supplier_id(),
            $this->session->userdata('user_client_id'),
            $this->session->userdata('user_name'),
            $data['client']->get_id(),
            $data['client']->get_billto_clients_id(),
            $data['new_po_number'],
            $this->session->userdata('user_name')
        );

        $this->db->query($query, $conditions);
        $last_insert_id = $this->db->insert_id();
        $i = 0;

        //insert order_line table
        foreach ($data['order_lines'] as $order_line) {
            $query = "
		INSERT INTO
		    order_line
		    (
			order_header_id,
			order_line_num,
			item_description,
			item_part_number,
			requisition_line_qty_ordered,
			requisition_line_uom,
			requisition_line_price,
			order_line_created,
			order_line_created_by
		    )
		VALUES
		    (
			?,?,?,?,?,?,?,now(),?
		    )
		";

            $conditions = array(
                $last_insert_id,
                ++$i,
                $order_line->get_item_description(),
                $order_line->get_item_part_number(),
                $order_line->get_item_order_qty(),
                $order_line->get_item_uom(),
                $order_line->get_item_cost(),
                $this->session->userdata('user_name')
            );

            $this->db->query($query, $conditions);

            //update item table

            $query = "
		UPDATE
		    items
		SET
		    item_on_order = item_on_order + ?
		WHERE
		    item_supplier_id = ?
		AND
		    item_part_number = ?
		";

            $conditions = array(
                $order_line->get_item_order_qty(),
                $order_line->get_supplier_id(),
                $order_line->get_item_part_number()
            );

            $this->db->query($query, $conditions);
        }

        if ($this->db->trans_status() == false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function get_last_po_id() {

        $query = "
            SELECT MAX(id) as max_id FROM order_header
        ";

        $result = $this->db->query($query);

        if (!$result) {
            // if query fails
            $message = "Query failed in order_model/get_last_po_id()";
            throw new Exception($message);
        } else {
            foreach ($result->result() as $row) {
                $id = $row->max_id;
            }
        }

        return $id;
    }

    /**
     * @param $po_number
     * @param $email_status
     * @return bool
     */
    public function update_order_email_status($po_number, $email_status) {

        $updateData = array("email_status" => $email_status);
        $this->db->where("order_number", $po_number);
        $this->db->update("order_header", $updateData);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    /**
     * @param $po_number
     * @return order_model
     * @throws Exception
     */
    public function get_po_header($po_number) {
        $query = "
            SELECT DISTINCT
                    id,
                    order_supplier_id,
                    order_client_id,
                    order_user_id,
                    order_ship_to,
                    order_bill_to,
                    order_type,
                    order_number,
                    email_status,
                    order_site_name,
                    order_site_id,
                    order_date_created,
                    order_created_by,
                    order_modified,
                    order_modified_by
            FROM
                    order_header
            WHERE
                    order_number = ?
    ";

        $result = $this->db->query($query, array($po_number));

        if (!$result) {
            // if query fails
            $message = "Query failed in order_model/get_po_header()";
            throw new Exception($message);
        } else {

            $order_header = new order_model();

            foreach ($result->result() as $row) {
                $order_header->setId($row->id);
                $order_header->setOrderSupplierId($row->order_supplier_id);
                $order_header->setOrderClientId($row->order_client_id);
                $order_header->setOrderUserId($row->order_user_id);
                $order_header->setOrderShipTo($row->order_ship_to);
                $order_header->setOrderBillTo($row->order_bill_to);
                $order_header->setOrderType($row->order_type);
                $order_header->setOrderNumber($row->order_number);
                $order_header->setEmailStatus($row->email_status);
                $order_header->set_order_site_name($row->order_site_name);
                $order_header->set_order_site_id($row->order_site_id);
                $order_header->setOrderDateCreated($row->order_date_created);
                $order_header->setOrderCreatedBy($row->order_created_by);
                $order_header->setOrderModified($row->order_modified);
                $order_header->setOrderModifiedBy($row->order_modified_by);
            }
        }

        return $order_header;
    }

    /**
     * @param $order_header_id
     * @return array
     * @throws Exception
     */
    public function get_po_lines($order_header_id) {
        $query = "
            SELECT
                    order_header_id,
                    order_line_num,
                    item_description,
                    item_part_number,
                    requisition_line_qty_ordered,
                    requisition_line_qty_received,
                    requisition_line_price,
                    requisition_line_uom,
                    order_line_created,
                    order_line_created_by,
                    order_line_modified,
                    order_line_modified_by
            FROM
                    order_line
            WHERE
                    order_header_id = ?
		";

        $result = $this->db->query($query, array($order_header_id));

        if (!$result) {
            // if query fails
            $message = "Query failed in order_model/get_po_lines()";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {

                $order_line = new order_model();

                $order_line->setOrderHeaderId($row->order_header_id);
                $order_line->setOrderLineNum($row->order_line_num);
                $order_line->setItemDescription($row->item_description);
                $order_line->setItemPartNumber($row->item_part_number);
                $order_line->setRequisitionLineQtyOrdered($row->requisition_line_qty_ordered);
                $order_line->setRequisitionLineQtyReceived($row->requisition_line_qty_received);
                $order_line->setRequisitionLinePrice($row->requisition_line_price);
                $order_line->setItemUom($row->requisition_line_uom);
                $order_line->setOrderLineCreated($row->order_line_created);
                $order_line->setOrderLineCreatedBy($row->order_line_created_by);
                $order_line->setOrderLineModified($row->order_line_modified);
                $order_line->setOrderLineModifiedBy($row->order_line_modified_by);

                $order_lines[] = $order_line;
            }
        }

        return $order_lines;
    }

    public function update_po_information(array $items) {

        //start transaction
        $this->db->trans_begin();

        foreach ($items['part_number'] as $k => $v) {
            $query = "
                UPDATE items
                LEFT JOIN item_sites ON item_sites.item_id = items.id
                LEFT JOIN client_supplier_lkup ON client_supplier_lkup.client_id = ?
                    AND client_supplier_lkup.supplier_id = ?
                LEFT JOIN order_header ON order_header.order_number = ?
                LEFT JOIN order_line ON order_header.id = order_line.order_header_id
                    AND order_line.item_part_number = ?
                SET item_sites.item_on_order = item_sites.item_on_order - ?,
                    item_sites.item_stock = item_sites.item_stock + ?,
                    order_line.requisition_line_qty_received = order_line.requisition_line_qty_received + ?
                WHERE items.item_part_number = ? AND items.item_supplier_id = ? AND item_sites.item_site_id = ?
        ";

            $conditions = array(
                $this->session->userdata('user_client_id'),
                $items['supplier_id'],
                $items['po_number'],
                $items['part_number'][$k],
                $items['qty'][$k],
                $items['qty'][$k],
                $items['qty'][$k],
                $items['part_number'][$k],
                $items['supplier_id'],
                $_POST['site_id']
            );

            $this->db->query($query, $conditions);
        }

        if ($this->db->trans_status() == false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function process_selected($part, $po_number, $order_header_id, $line_number) {

        //start transaction
        $this->db->trans_begin();

        if (1 == $line_number) {
            //insert order_header table
            $query = "
		INSERT INTO
		    order_header
		    (
			order_supplier_id,
			order_client_id,
			order_user_id,
			order_ship_to,
			order_bill_to,
			order_type,
			order_number,
			order_site_name,
                        order_site_id,
			order_date_created,
			order_created_by
		    )
		VALUES
		    (
			?,?,?,?,?,'PO',?,?,?,now(),?
		    )
		";

            $conditions = array(
                $part['supplier_id'],
                $this->session->userdata('user_client_id'),
                $this->session->userdata('user_name'),
                $this->session->userdata('user_client_id'),
                $part['client']['billto_client_id'],
                $po_number,
                $part['site_name'],
                $part['site_id'],
                $this->session->userdata('user_name')
            );

            $this->db->query($query, $conditions);
        }

        $last_insert_id = $this->db->insert_id();

        $query = "
	    INSERT INTO
		order_line
		(
		    order_header_id,
		    order_line_num,
		    item_description,
		    item_part_number,
		    requisition_line_qty_ordered,
		    requisition_line_uom,
		    requisition_line_price,
		    order_line_created,
		    order_line_created_by
		)
	    VALUES
		(
		    ?,?,?,?,?,?,?,now(),?
		)
	    ";

        $conditions = array(
            $order_header_id,
            $line_number,
            $part['description'],
            $part['part_number'],
            $part['order_qty'],
            $part['uom'],
            $part['cost'],
            $this->session->userdata('user_name')
        );

        $this->db->query($query, $conditions);

        // update item_sites table
        $query = "
	    UPDATE item_sites
            RIGHT JOIN items ON item_sites.item_id = items.id
	    SET item_on_order = item_on_order + ?
	    WHERE item_supplier_id = ?
	    AND item_part_number = ? 
            AND item_site_id = ?
	    ";

        $conditions = array(
            $part['order_qty'],
            $part['supplier']['id'],
            $part['part_number'],
            $part['site_id']
        );

        $this->db->query($query, $conditions);

        if ($this->db->trans_status() == false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getLineNumber(array $part) {

        $query = '
	    SELECT COUNT(order_line_num) as line_num
	    FROM order_line 
	    LEFT JOIN order_header ON order_header.id = order_line.order_header_id 
	    WHERE TIMESTAMPDIFF(MINUTE, order_line_created, NOW()) <= 1
	    AND order_header.order_supplier_id = ?
	    AND order_header.order_client_id = ?';

        $conditions = array(
            $part['supplier_id'],
            $this->session->userdata('user_client_id')
        );

        $result = $this->db->query($query, $conditions);

        foreach ($result->result() as $row) {
            $line_num = $row->line_num;
        }

        return $line_num;
    }

}
