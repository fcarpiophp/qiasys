<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report_model
 *
 * @author Francisco
 */
class report_model extends CI_Model {

    private $item_id;
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
    private $item_order_qty;
    private $item_site_name;
    private $item_site_id;
    private $item_location;
    private $item_cost;
    private $item_msrp;
    private $item_price;
    private $supplier_id;
    private $manufacturer_id;
    private $qty_sold;
    private $total_sales_last_month;
    private $qty_sold_last_month;
    private $price_sold_last_month;
    private $total_sales_two_months_ago;
    private $qty_sold_two_months_ago;
    private $price_sold_two_months_ago;
    private $last_month;
    private $two_months_ago;
    private $last_month_last_year;
    private $total_sales_last_year;
    private $qty_sold_last_year;
    private $price_sold_last_year;
    
    public function get_item_site_id() {
        return $this->item_site_id;
    }

    public function set_item_site_id($item_site_id) {
        $this->item_site_id = $item_site_id;
    }

    public function get_total_sales_last_year() {
        return $this->total_sales_last_year;
    }

    public function get_qty_sold_last_year() {
        return $this->qty_sold_last_year;
    }

    public function get_price_sold_last_year() {
        return $this->price_sold_last_year;
    }

    public function set_total_sales_last_year($total_sales_last_year) {
        $this->total_sales_last_year = $total_sales_last_year;
    }

    public function set_qty_sold_last_year($qty_sold_last_year) {
        $this->qty_sold_last_year = $qty_sold_last_year;
    }

    public function set_price_sold_last_year($price_sold_last_year) {
        $this->price_sold_last_year = $price_sold_last_year;
    }

    public function get_last_month() {
        return $this->last_month;
    }

    public function get_two_months_ago() {
        return $this->two_months_ago;
    }

    public function get_last_month_last_year() {
        return $this->last_month_last_year;
    }

    public function set_last_month($last_month) {
        $this->last_month = $last_month;
    }

    public function set_two_months_ago($two_months_ago) {
        $this->two_months_ago = $two_months_ago;
    }

    public function set_last_month_last_year($last_month_last_year) {
        $this->last_month_last_year = $last_month_last_year;
    }

    public function get_total_sales_two_months_ago() {
        return $this->total_sales_two_months_ago;
    }

    public function get_qty_sold_two_months_ago() {
        return $this->qty_sold_two_months_ago;
    }

    public function get_price_sold_two_months_ago() {
        return $this->price_sold_two_months_ago;
    }

    public function set_total_sales_two_months_ago($total_sales_two_months_ago) {
        $this->total_sales_two_months_ago = $total_sales_two_months_ago;
    }

    public function set_qty_sold_two_months_ago($qty_sold_two_months_ago) {
        $this->qty_sold_two_months_ago = $qty_sold_two_months_ago;
    }

    public function set_price_sold_two_months_ago($price_sold_two_months_ago) {
        $this->price_sold_two_months_ago = $price_sold_two_months_ago;
    }

    public function get_qty_sold_last_month() {
        return $this->qty_sold_last_month;
    }

    public function get_price_sold_last_month() {
        return $this->price_sold_last_month;
    }

    public function set_qty_sold_last_month($qty_sold_last_month) {
        $this->qty_sold_last_month = $qty_sold_last_month;
    }

    public function set_price_sold_last_month($price_sold_last_month) {
        $this->price_sold_last_month = $price_sold_last_month;
    }

    public function get_total_sales_last_month() {
        return $this->total_sales_last_month;
    }

    public function set_total_sales_last_month($total_sales_last_month) {
        $this->total_sales_last_month = $total_sales_last_month;
    }

    public function get_qty_sold() {
        return $this->qty_sold;
    }

    public function set_qty_sold($qty_sold) {
        $this->qty_sold = $qty_sold;
    }

    public function getItem_id() {
        return $this->item_id;
    }

    public function setItem_id($item_id) {
        $this->item_id = $item_id;
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

    public function get_item_order_qty() {
        return $this->item_order_qty;
    }

    public function set_item_order_qty($item_order_qty) {
        $this->item_order_qty = $item_order_qty;
    }

    public function get_item_site_name() {
        return $this->item_site_name;
    }

    public function set_item_site_name($item_site_name) {
        $this->item_site_name = $item_site_name;
    }

    public function get_item_location() {
        return $this->item_location;
    }

    public function set_item_location($item_location) {
        $this->item_location = $item_location;
    }

    public function get_item_cost() {
        return $this->item_cost;
    }

    public function set_item_cost($item_cost) {
        $this->item_cost = $item_cost;
    }

    public function get_item_msrp() {
        return $this->item_msrp;
    }

    public function set_item_msrp($item_msrp) {
        $this->item_msrp = $item_msrp;
    }

    public function get_item_price() {
        return $this->item_price;
    }

    public function set_item_price($item_price) {
        $this->item_price = $item_price;
    }

    public function get_supplier_id() {
        return $this->supplier_id;
    }

    public function set_supplier_id($supplier_id) {
        $this->supplier_id = $supplier_id;
    }

    public function get_manufacturer_id() {
        return $this->manufacturer_id;
    }

    public function set_manufacturer_id($manufacturer_id) {
        $this->manufacturer_id = $manufacturer_id;
    }
    
    public function __construct() {
        $this->set_last_month(date("m/y", strtotime("last month")));
        $this->set_last_month_last_year(date("m/y", strtotime("last month last year")));
        $this->set_two_months_ago(date("m/y", strtotime("first day of -2 month")));
    }

    /**
     * 
     * @param type $start
     * @param type $items_per_page
     * @return \report_model
     * @throws Exception
     */
    public function order_report($start = 0, $items_per_page = 25) {
        
        //get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();

        $query = "
            SELECT
                items.id,
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
                IF(
                        (
                                (item_sites.item_stock + item_sites.item_on_order) < item_sites.item_min
                        ) 
                        AND 
                        (item_sites.item_max - item_sites.item_on_order - item_sites.item_stock) >= item_sites.item_min_order,
                        item_sites.item_max - item_sites.item_on_order - item_sites.item_stock,
                        0
                ) as item_order_qty,
                item_sites.item_site_name, 
                item_sites.item_site_id, 
                item_sites.item_location, 
                item_sites.item_cost, 
                item_sites.item_msrp, 
                item_sites.item_price,
                suppliers.id as supplier_id,
                manufacturers.id as manufacturer_id
        FROM items 
        LEFT JOIN client_supplier_lkup 
                ON client_supplier_lkup.supplier_id = items.item_supplier_id
        LEFT JOIN suppliers 
                ON client_supplier_lkup.supplier_id = suppliers.id
        LEFT JOIN manufacturers
                ON items.item_manufacturer_id = manufacturers.id
        LEFT JOIN item_sites
                ON item_sites.item_id = items.id
        WHERE client_supplier_lkup.client_id = ?
        AND ((item_sites.item_stock + item_sites.item_on_order) < item_sites.item_min)
        AND (item_sites.item_max - item_sites.item_on_order - item_sites.item_stock) >= item_sites.item_min_order ";
        
        
        if($permission->getAdmin() || $permission->getIronMan()) {
            $query .= "ORDER BY suppliers.supplier_name, item_sites.item_site_name, items.item_part_number ASC
            LIMIT ?, ?";
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    (int) $start,
                    (int) $items_per_page
                )
            );
        } else {
            // filter by site
            $query .= "AND item_sites.item_site_id = ? ";
            $query .= "ORDER BY suppliers.supplier_name, item_sites.item_site_name, items.item_part_number ASC
            LIMIT ?, ?";
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $this->session->userdata('user_site_id'),
                    (int) $start,
                    (int) $items_per_page
                )
            );
        }

        $data = array();

        if (!$result) {
            // if query returns null
            $message = "Query failed in reports/order_report";
            throw new Exception($message);
        } else {
            if (0 < $result->num_rows()) {

                foreach ($result->result() as $row) {

                    $order_line = new report_model();

                    $order_line->setItem_id($row->id);
                    $order_line->set_item_part_number($row->item_part_number);
                    $order_line->set_item_description($row->item_description);
                    $order_line->set_supplier_name($row->supplier_name);
                    $order_line->set_manufacturer_name($row->manufacturer_name);
                    $order_line->set_item_uom($row->item_uom);
                    $order_line->set_item_stock($row->item_stock);
                    $order_line->set_item_on_order($row->item_on_order);
                    $order_line->set_item_min($row->item_min);
                    $order_line->set_item_max($row->item_max);
                    $order_line->set_item_min_order($row->item_min_order);
                    $order_line->set_item_order_qty($row->item_order_qty);
                    $order_line->set_item_site_name($row->item_site_name);
                    $order_line->set_item_site_id($row->item_site_id);
                    $order_line->set_item_location($row->item_location);
                    $order_line->set_item_cost(number_format($row->item_cost, 2, '.', ''));
                    $order_line->set_item_msrp(number_format($row->item_msrp, 2, '.', ''));
                    $order_line->set_item_price(number_format($row->item_price, 2, '.', ''));
                    $order_line->set_supplier_id($row->supplier_id);
                    $order_line->set_manufacturer_id($row->manufacturer_id);

                    $order_lines[] = $order_line;
                }
            }
        }

        if (isset($order_lines)) {
            return $order_lines;
        } else {
            return false;
        }
    }

    /**
     *
     * @return int
     */
    public function count_order_items() {
        
        //get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        
        $query = "
            SELECT 
                items.item_part_number
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
            AND ((item_sites.item_stock + item_sites.item_on_order) < item_sites.item_min)
            AND (item_sites.item_max - item_sites.item_on_order - item_sites.item_stock) >= item_sites.item_min_order ";
        
        if($permission->getAdmin() || $permission->getIronMan()) {
            $query  .= "ORDER BY suppliers.supplier_name, manufacturers.manufacturer_name ASC";
            
            $result = $this->db->query(
                $query,
                array(
                    $this->session->userdata('user_client_id')
                )
            );
            
        } else {
            // filter by site
            $query .= "AND item_sites.item_site_id = ? ";
            $query .= "ORDER BY suppliers.supplier_name, manufacturers.manufacturer_name ASC";
            
            $result = $this->db->query(
                $query,
                array(
                    $this->session->userdata('user_client_id'),
                    $this->session->userdata('user_site_id')
                )
            );
        }

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
     * @param int $start
     * @param int $items_per_page
     * @param int $supplier
     * @param int $manufacturer
     * @param string $location
     * @return array()
     * @throws Exception
     */
    public function order_by_supplier_and_site(
    $supplier = 0, $manufacturer = 0, $location = 0) {

        $query = "
            SELECT 
                items.item_part_number,
                items.item_description, 
                suppliers.supplier_name,
                manufacturers.manufacturer_name,
                items.item_uom, 
                items.item_stock, 
                items.item_on_order, 
                items.item_min, 
                items.item_max, 
                items.item_min_order,
                IF(
                    (
                        (items.item_stock + items.item_on_order) < items.item_min
                    ) 
                    AND 
                    (items.item_max - items.item_on_order - items.item_stock) >= items.item_min_order,
                    items.item_max - items.item_on_order - items.item_stock,
                    0
                ) as item_order_qty,
                items.item_site, 
                items.item_location, 
                items.item_cost, 
                items.item_msrp, 
                items.item_price,
                items.item_price - items.item_cost as gp_dollar,
                ((items.item_price - items.item_cost) / items.item_cost * 100) as gp_percent,
                suppliers.id as supplier_id,
                manufacturers.id as manufacturer_id
            FROM items 
            LEFT JOIN client_supplier_lkup 
                ON client_supplier_lkup.supplier_id = items.item_supplier_id
            LEFT JOIN suppliers 
                ON client_supplier_lkup.supplier_id = suppliers.id
            LEFT JOIN manufacturers
                ON items.item_manufacturer_id = manufacturers.id
            WHERE client_supplier_lkup.client_id = ?
            AND ((items.item_stock + items.item_on_order) < items.item_min)
            AND (items.item_max - items.item_on_order - items.item_stock) >= items.item_min_order
            AND suppliers.id = ?
            AND manufacturers.id = ?
            AND items.item_site = ?
            ORDER BY suppliers.supplier_name, manufacturers.manufacturer_name, items.item_site ASC
        ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id'),
            $supplier,
            $manufacturer,
            $location
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in reports/order_by_supplier_and_location";
            throw new Exception($message);
        } else {
            if (0 < $result->num_rows()) {
                $data[] = array(
                    'item_part_number' => 'Part',
                    'item_description' => 'Description',
                    'supplier_name' => 'Supplier',
                    'manufacturer_name' => 'Manufacturer',
                    'item_uom' => 'UOM',
                    'item_stock' => 'In Stock',
                    'item_on_order' => 'On Order',
                    'item_min' => 'Min',
                    'item_max' => 'Max',
                    'item_min_order' => 'Min Order',
                    'item_order_qty' => 'Order Qty',
                    'item_site' => 'Site',
                    'item_location' => 'Loc',
                    'item_cost' => 'Cost',
                    'item_msrp' => 'MSRP',
                    'item_price' => 'Price',
                    'gp_dollar' => 'Profit $',
                    'gp_percent' => 'Profit %',
                    'supplier_id' => 'Supp ID',
                    'manufacturer_id' => 'Manuf ID'
                );

                foreach ($result->result() as $row) {
                    $data[] = array(
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
                        'item_order_qty' => $row->item_order_qty,
                        'item_site' => $row->item_site,
                        'item_location' => $row->item_location,
                        'item_cost' => number_format($row->item_cost, 2, '.', ''),
                        'item_msrp' => number_format($row->item_msrp, 2, '.', ''),
                        'item_price' => number_format($row->item_price, 2, '.', ''),
                        'gp_dollar' => number_format($row->gp_dollar, 2, '.', ''),
                        'gp_percent' => number_format($row->gp_percent, 2, '.', ''),
                        'supplier_id' => $row->supplier_id,
                        'manufacturer_id' => $row->manufacturer_id
                    );
                }
            }
        }

        return $data;
    }
    
    public function get_suppliers_by_account()
    {
        $query  = 'SELECT supplier_id FROM client_supplier_lkup WHERE client_id = ?';
        
        $result = $this->db->query($query, array($this->session->userdata('user_client_id')));

        if (!$result) {
            // if query returns null
            $message = "Query failed in reports/get_suppliers_by_account";
            throw new Exception($message);
        } else {
            
            $parts = array();
            
            foreach ($result->result() as $row) {
                $part = new report_model();
                
                $part->set_supplier_id($row->supplier_id);
                
                $parts[] = $part;
            }
        }
        
        return $parts;
    }
    
    public function get_last_month_sales($parts)
    {
        $supplier_ids = array();
        
        foreach ($parts as $part){
            // accumulate supplier ids
            $supplier_ids[] = $part->get_supplier_id();
        }
        
        $query = ''
            . 'SELECT '
            . 'sale_line.item_part_number, sale_line.item_description, SUM(qty_sold) as qty_sold, AVG(sell_price) as sell_price, '
            . '(qty_sold * sell_price) as total_sales, sale_line.item_supplier_id '
            . 'FROM  client_supplier_lkup '
            . 'RIGHT JOIN sale_header ON sale_header.sale_client_id = client_supplier_lkup.client_id AND client_supplier_lkup.client_id = ? '
            . 'RIGHT JOIN sale_line ON sale_line.sale_header_id = sale_line.id '
            . 'WHERE sale_line.sale_line_created LIKE concat(LEFT(DATE_SUB(NOW(), interval 1 month),7),"%") '
            . 'AND sale_line.item_supplier_id IN ('.implode(',', $supplier_ids).') '
            . 'GROUP BY item_part_number';

        $result = $this->db->query(
            $query, 
            array(
                $this->session->userdata('user_client_id'),
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in reports/get_last_month_sales";
            throw new Exception($message);
        } else {

            $parts = array();

            foreach ($result->result() as $row) {
                $part = new report_model();

                $part->set_item_part_number($row->item_part_number);
                $part->set_item_description($row->item_description);
                $part->set_qty_sold_last_month($row->qty_sold);
                $part->set_price_sold_last_month($row->sell_price);
                $part->set_total_sales_last_month($row->total_sales);
                $part->set_supplier_id($row->item_supplier_id);

                $parts[] = $part;
            }
        }
        
        return $parts;
    }
    
    public function get_two_months_before_this_sales($parts)
    {
        foreach($parts as $part) {
            
            $query = ''
                . 'SELECT '
                . 'SUM(qty_sold) AS qty_sold, AVG(sell_price) AS sell_price, (SUM(qty_sold) * AVG(sell_price)) AS total_sales '
                . 'FROM client_supplier_lkup '
                . 'RIGHT JOIN sale_header ON sale_header.sale_client_id = client_supplier_lkup.client_id AND client_supplier_lkup.client_id = ? '
                . 'RIGHT JOIN sale_line ON sale_line.sale_header_id = sale_line.id '
                . 'WHERE sale_line.sale_line_created LIKE concat(LEFT(DATE_SUB(NOW(), interval 2 month),7),"%") '
                . 'AND sale_line.item_part_number = ? '
                . 'GROUP BY item_part_number';
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $part->get_item_part_number()
                )
            );

            if (!$result) {
                // if query returns null
                $message = "Query failed in reports/get_two_months_before_this_sales";
                throw new Exception($message);
            } else {

                foreach ($result->result() as $row) {

                    $part->set_qty_sold_two_months_ago($row->qty_sold);
                    $part->set_price_sold_two_months_ago($row->sell_price);
                    $part->set_total_sales_two_months_ago($row->total_sales);
                }
            }
        }
        return $parts;
    }
    
    public function get_items_info($parts)
    {
        foreach($parts as $part) {

            $query = ''
                . 'SELECT item_sites.item_cost, items.item_supplier_id, item_sites.item_uom, suppliers.supplier_name '
                . 'FROM client_supplier_lkup '
                . 'LEFT JOIN items ON items.item_supplier_id = client_supplier_lkup.supplier_id '
                . 'LEFT JOIN item_sites ON item_sites.item_id = items.id '
                . 'LEFT JOIN suppliers ON suppliers.id = client_supplier_lkup.supplier_id '
                . 'WHERE client_supplier_lkup.client_id = ? AND items.item_part_number = ?';

            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $part->get_item_part_number()
                )
            );

            if (!$result) {
                print $this->db->last_query();
                // if query returns null
                $message = "Query failed in reports/get_two_months_before_this_sales";
                print '<pre>';
                throw new Exception(print_r($message));
            } else {

                foreach ($result->result() as $row) {

                    $part->set_item_cost($row->item_cost);
                    $part->set_supplier_id($row->item_supplier_id);
                    $part->set_item_uom($row->item_uom);
                    $part->set_supplier_name($row->supplier_name);
                }
            }
        }

        return $parts;
    }
    
    public function get_last_years_sales($parts)
    {
        foreach($parts as $part) {
            $query = ''
                    . 'SELECT '
                    . 'SUM(qty_sold) AS qty_sold, AVG(sell_price) AS sell_price, (SUM(qty_sold) * AVG(sell_price)) AS total_sales '
                    . 'FROM client_supplier_lkup '
                    . 'RIGHT JOIN sale_header ON sale_header.sale_client_id = client_supplier_lkup.client_id AND client_supplier_lkup.client_id = ? '
                    . 'RIGHT JOIN sale_line ON sale_line.sale_header_id = sale_line.id '
                    . 'WHERE sale_line.sale_line_created LIKE concat(LEFT(DATE_SUB(NOW(), interval 12 month),7),"%") '
                    . 'AND sale_line.item_part_number = ? '
                    . 'GROUP BY item_part_number';

            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $part->get_item_part_number()
                )
            );

            if (!$result) {
                // if query returns null
                $message = "Query failed in reports/get_two_months_before_this_sales";
                throw new Exception($message);
            } else {

                foreach ($result->result() as $row) {

                    $part->set_qty_sold_last_year($row->qty_sold);
                    $part->set_price_sold_last_year($row->sell_price);
                    $part->set_total_sales_last_year($row->total_sales);
                }
            }
        }
        
        return $parts;
    }
}
