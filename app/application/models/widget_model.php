<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widget_model
 *
 * @author Francisco
 */
class widget_model extends CI_Model {

    public function profit_dollar_widget() {
	$query = "
            select 
                sale_line.item_part_number,
                sale_line.item_description,
                avg(sale_line.sell_price) as AvgSellPrice,
                avg(item_sites.item_cost) as AvgCost,
                avg(sale_line.sell_price) - avg(item_sites.item_cost) as profit_widget
            from 
                    sale_line
            left join 
                    sale_header on sale_header.id = sale_line.sale_header_id
            left join 
                    items on items.item_part_number = sale_line.item_part_number
            left join 
                    client_supplier_lkup on client_supplier_lkup.supplier_id = items.item_supplier_id
            left join 
                    suppliers on client_supplier_lkup.supplier_id = suppliers.id
            left join 
                    manufacturers on items.item_manufacturer_id = manufacturers.id
            left join 
                    item_sites on items.id = item_sites.item_id
            where 
                    client_supplier_lkup.client_id = ?
            group by 
                    sale_line.item_part_number
            order by 
                    profit_widget desc
            limit 6        
        ";

	$data = array();

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    )
	);

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in widget/profit_dollar_widget";
	    throw new Exception($message);
	} else {
	    if (0 < $result->num_rows()) {
		$data[] = array(
		    'item_part_number' => 'Part #',
		    'item_description' => 'Description',
		    'AvgSellPrice' => 'Sold',
		    'AvgCost' => 'Cost',
		    'profit_widget' => 'Profit($)'
		);

		foreach ($result->result() as $row) {
		    $data[] = array(
			'item_part_number' => $row->item_part_number,
			'item_description' => $row->item_description,
			'AvgSellPrice' => number_format($row->AvgSellPrice, 2, '.', ''),
			'AvgCost' => number_format($row->AvgCost, 2, '.', ''),
			'profit_widget' => number_format($row->profit_widget, 2, '.', '')
		    );
		}
	    }
	}

	return $data;
    }

    public function percent_dollar_widget() {
	$query = "
            select 
                sale_line.item_part_number,
                sale_line.item_description,
                avg(sale_line.sell_price) as AvgSellPrice,
                avg(item_sites.item_cost) as AvgCost,
                (avg(sale_line.sell_price) - avg(item_sites.item_cost))/avg(item_sites.item_cost) * 100 as profit_widget
            from 
                sale_line
            left join 
                sale_header on sale_header.id = sale_line.sale_header_id
            left join 
                items on items.item_part_number = sale_line.item_part_number
            left join 
                client_supplier_lkup on client_supplier_lkup.supplier_id = items.item_supplier_id
            left join 
                suppliers on client_supplier_lkup.supplier_id = suppliers.id
            left join 
                manufacturers on items.item_manufacturer_id = manufacturers.id
            left join 
                item_sites on items.id = item_sites.item_id
            where 
                client_supplier_lkup.client_id = ?
            group by 
                sale_line.item_part_number
            order by 
                profit_widget desc
            limit 6         
        ";

	$data = array();

	$result = $this->db->query(
	    $query, array(
	    $this->session->userdata('user_client_id'),
	    )
	);

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in widget/percent_dollar_widget";
	    throw new Exception($message);
	} else {
	    if (0 < $result->num_rows()) {
		$data[] = array(
		    'item_part_number' => 'Part #',
		    'item_description' => 'Description',
		    'AvgSellPrice' => 'Sold',
		    'AvgCost' => 'Cost',
		    'profit_widget' => 'Profit(%)'
		);

		foreach ($result->result() as $row) {
		    $data[] = array(
			'item_part_number' => $row->item_part_number,
			'item_description' => $row->item_description,
			'AvgSellPrice' => number_format($row->AvgSellPrice, 2, '.', ''),
			'AvgCost' => number_format($row->AvgCost, 2, '.', ''),
			'profit_widget' => number_format($row->profit_widget, 2, '.', '')
		    );
		}
	    }
	}

	return $data;
    }

    public function get_monthly_sales($month, $year) {
	//update sell_history set sell_date = concat('2013-', (FLOOR( 1 + RAND( ) *13 )),'-', (FLOOR( 1 + RAND( ) *31 )) ) where floor(sell_price) % 2 = 0
	$query = "
            SELECT 
		sum(sell_price) as total_sales 
	    FROM 
		sell_history
            WHERE 
		month(sell_date) = ? 
	    AND year(sell_date) = ?
            AND client_id = ?
        ";

	$result = $this->db->query(
	    $query, array(
	    $month,
	    $year,
	    $this->session->userdata('user_client_id'),
	    )
	);

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in widgets/get_monthly_totals";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->total_sales;
	    }
	}

	return (int) $total;
    }

    public function get_monthly_cost($month, $year) {
	$query = "
            SELECT 
		sum(cost_price) as total_cost 
	    FROM 
		sell_history
            WHERE 
		month(sell_date) = ? 
	    AND year(sell_date) = ?
            AND client_id = ?
        ";

	$result = $this->db->query(
	    $query, array(
	    $month,
	    $year,
	    $this->session->userdata('user_client_id'),
	    )
	);

	if (!$result) {
	    // if query returns null
	    $message = "Query failed in widget/get_monthly_cost";
	    throw new Exception($message);
	} else {
	    foreach ($result->result() as $row) {
		$total = $row->total_cost;
	    }
	}

	return (int) $total;
    }
    
    public function get_pulse_data() {
	
	$data = array();

	// set x data
	$this_month = date('m') - 1;
	$this_year = date('Y');
	$this_year_display = date('y');
	
	

	for ($i = 11; $i >= 0; $i--) {
	    if (1 > $this_month) {
		$this_month = 12;
		$this_year--;
		$this_year_display--;
		$data[] = array(
		    '\''.$this_month . '-' . $this_year_display.'\'', 
		    $this->get_monthly_cost($this_month, $this_year) , 
		    $this->get_monthly_sales($this_month, $this_year) - $this->get_monthly_cost($this_month, $this_year)
		);
	    } else {
		
		$data[] = array(
		    '\''.$this_month . '-' . $this_year_display.'\'', 
		    $this->get_monthly_cost($this_month, $this_year), 
		    $this->get_monthly_sales($this_month, $this_year) - $this->get_monthly_cost($this_month, $this_year)
		);
	    }
	    $this_month--;
	}
	
	$data[] = array('\'Date\'', '\'Cost\'', '\'Profit\'');
	return array_reverse($data);
    }
}

?>
