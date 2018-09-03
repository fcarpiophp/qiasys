<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report
 *
 * @author Francisco
 */
class report extends CI_controller {

    public function order_report() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getReport() || $permission->getPurchase()) {
            //get the data from the model
            $this->load->model('report_model');
            //$this->uri->segment(3) defaults to 0 if not available
            $report = new report_model();
            $data['to_order'] = $report->order_report($this->uri->segment(3), ITEMS_PER_PAGE);

            //send data array to build a formatted table
            if (!$data['to_order']) {
                $data['msg'] = 'No automatic orders.';
                $this->load->view('header', $data);
                $this->load->view('message', $data);
                $this->load->view('footer');
                return;
            }

            $data['page_title'] = 'Order Report';

            //pagination start
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'index.php/report/order_report';
            $config['total_rows'] = $this->report_model->count_order_items();
            $config['per_page'] = 1000000; //some large number
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
            //pagination end

            if (isset($data['to_order'])) {
                //load the views
                $this->load->view('header', $data);
                $this->load->view('report/order_report', $data);
                $this->load->view('footer');
                return;
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function order_items() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getReport()) {
            //get the data from the model
            $this->load->model('report_model');
            $data = $this->report_model->order_by_supplier_and_site(
                $this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5)
            );

            $supplier_name = $data[1]['supplier_name'];
            $location = $this->uri->segment(5);

            if (isset($location)) {
                $supplier_name .= ' (' . $location . ')';
            }

            //send data array to build a formatted table
            $this->load->model('display_tabular_data');
            $data['body_data'] = $this->display_tabular_data->build_table($data);

            $data['page_title'] = 'Order Report for ' . $supplier_name;
            //load the views
            $this->load->view('header', $data);
            $this->load->view('report/order_report_by_supplier_and_site', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function sales_report() {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        $this->load->model('report_model');
        $sales = new report_model();

        // build sales report
        // get suppliers for this account
        $report = $sales->get_suppliers_by_account();

        // populate report object with items
        $report = $sales->get_last_month_sales($report);

        // get values for two months ago
        $report = $sales->get_two_months_before_this_sales($report);

        // get last year's sales
        $report = $sales->get_last_years_sales($report);

        // get cost and other items table related info
        $data['sales'] = $sales->get_items_info($report);

        $data['page_title'] = 'Previous Month Sales Report';

        if (!empty($data['sales'])) {
            $this->load->view('header', $data);
            $this->load->view('report/sales_report', $data);
            $this->load->view('footer');
        } else {
            $data['message'] = '<p class="text-error">You do not have any sales transactions in this time range.</p>';

            $this->load->view('header', $data);
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }
    }

}
