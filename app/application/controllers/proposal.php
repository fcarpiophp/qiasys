<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proposal
 *
 * @author Francisco
 */
class proposal extends CI_Controller
{

    /**
     *
     */
    public function create_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {

            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $result = $proposal->create_proposal();

            if (!$result) {
                //load the error
                $data['message'] = 'I am sorry, something terrible has happened with the database. The Proposal was not
                    created. Please try again.';
                $this->load->view('header', $data);
                $this->load->view('error/error_page', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function add_to_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal() || $permission->getSell()) {
            $this->load->model('item_model');
            $item = new item_model();
            $item->instantiateItemFromPartNumber($_POST['item_part_number']);

            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $added = $proposal->add_to_proposal($item, $_POST['item_qty']);

            if ($added) {
                redirect('/proposal/view_proposal/', 'refresh');
            } else {
                //load the error
                $data['message'] = 'I am sorry, something terrible has happened with the database. Please try again.';
                $this->load->view('header', $data);
                $this->load->view('error/error_page', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function view_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {

            //handle proposal_model and transaction_model via this controller.
            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $data['proposal_lines'] = $proposal->get_proposal($this->session->userdata('proposal_id'));

            //check if empty to display message
            if ($proposal->proposal_item_count() < 1) {
                $data['msg'] = 'This Shopping Cart is empty';
                $data['page_title'] = 'Shopping Cart';
                $this->load->view('header', $data);
                $this->load->view('message', $data);
                $this->load->view('footer');
            } else {

                $data['page_title'] = 'Shopping Cart';

                //load the views
                $this->load->view('header', $data);
                $this->load->view('proposal/view_proposal', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function delete_item_from_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $result = $proposal->delete_item($_POST['item_part']);

            if ($result) {
                $proposal = new proposal();
                $proposal->view_proposal();
            } else {
                //load the error
                $data['message'] = 'I am sorry, something terrible has happened with the database. Please try again.';
                $this->load->view('header', $data);
                $this->load->view('error/error_page', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function edit_proposal_item()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $result = $proposal->edit_item();

            if ($result) {
                $proposal = new proposal();
                $proposal->view_proposal();
            } else {
                //load the error
                $data['message'] = 'I am sorry, something terrible has happened with the database. Please try again.';
                $this->load->view('header', $data);
                $this->load->view('error/error_page', $data);
                $this->load->view('footer');
            }
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function process_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
            //handle proposal_model and transaction_model vis this controller.
            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $proposal->deplete_inventory($this->session->userdata('proposal_id'));

            //send data array to build a formatted table
            $this->load->model('display_tabular_data');
            $data['proposal'] = $this->display_tabular_data->build_table($data, true);
            $data['proposal_total'] = $proposal->get_proposal_total($this->session->userdata('proposal_id'));
            $data['page_title'] = 'Shopping Cart';

            //load the views
            $this->load->view('header', $data);
            $this->load->view('proposal/view_proposal', $data);
            $this->load->view('footer');
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     * @param String $error_message
     */
    public function customer_information($error_message = '')
    {

        // check if proposal has any items
        $this->load->model('proposal_model');
        $proposal = new proposal_model();
        $proposal_lines = $proposal->get_proposal($this->session->userdata('proposal_id'));

        if (!$proposal_lines) {
            $this->view_proposal();
            return;
        }

        $data['error_message'] = $error_message;

        $this->load->model('autocomplete_model');
        $information = new autocomplete_model();
        $data['emails'] = $information->get_email_address();
        $data['phone_numbers'] = $information->get_phone_numbers();

        $data['page_title'] = 'Get Customer Information';

        //load the views
        $this->load->view('header', $data);
        $this->load->view('proposal/get_customer_information', $data);
        $this->load->view('footer');

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     *
     */
    public function get_customer_data()
    {
        $info['phone'] = !empty($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $info['email'] = !empty($_POST['email']) ? $_POST['email'] : '';

        $this->load->model('proposal_model');
        $proposal = new proposal_model();
        $data = $proposal->get_customer_information($info);

        echo json_encode($data);
    }

    /**
     *
     */
    public function execute_proposal()
    {

        // check if proposal has any items
        $this->load->model('proposal_model');
        $proposal = new proposal_model();
        $proposal_lines = $proposal->get_proposal($this->session->userdata('proposal_id'));

        if (!$proposal_lines) {
            $this->view_proposal();
            return;
        }

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
            $data['error_message'] = '';

            // Do validation
            if (empty($_POST['phone']) && empty($_POST['email'])) {
                $data['error_message'] = 'An email or phone number must be provided.';
                $this->customer_information($data['error_message']);
                return;
            }

            if (!empty($_POST['email'])) {
                if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $data['error_message'] = 'Enter a valid email address.';
                    $this->customer_information($data['error_message']);
                    return;
                }
            }

            if (!empty($_POST['phone'])) {
                if ((!is_numeric($_POST['phone']) || strlen($_POST['phone']) != 10)) {
                    $data['error_message'] = 'Phone number must be in the <b>8885551212</b> format.';
                    $this->customer_information($data['error_message']);
                    return;
                }
            }

            if (empty($_POST['email']) && !empty($_POST['email-checkbox'])) {
                $data['error_message'] = 'An email address must be provided if the "Send confirmation via email" option is selected.';
                $this->customer_information($data['error_message']);
                return;
            }

            if (empty($_POST['email']) && ('invoice' == $_POST['payment-type'])) {
                $data['error_message'] = 'An email address must be provided for "Terms" transactions.';
                $this->customer_information($data['error_message']);
                return;
            }

            //check if customer exists, if not then add to customer table
            $this->load->model('customer_model');
            $customer = new customer_model();

            $last_insert_id = $customer->add_update_customer();


            if (!$last_insert_id) {
                $data['error_message'] = 'Customer insert/update error, please try again';
                $this->customer_information($data['error_message']);
            }

            //get items from proposal
            $this->load->model('proposal_model');
            $proposal = new proposal_model();

            //build confirmation
            $data['header_details'] = $proposal->get_proposal_header_details($last_insert_id);
            $data['proposal_summary'] = $proposal->get_proposal_summary();
            $data['proposal_items'] = $proposal->get_proposal_items($this->session->userdata('proposal_id'));

            //deplete items from stock and add records to purchase table
            $this->load->model('inventory_model');
            $inventory = new inventory_model();

            if (!empty($data['proposal_items'])) {
                $data['sale_number'] = $inventory->process_proposal($data['proposal_items'], $last_insert_id, $_POST['phone'], $_POST['email']);

                //delete proposal
                $proposal->delete_proposal($this->session->userdata('proposal_id'));

                $this->load->view('header', $data);
                $this->load->view('proposal/proposal_confirmation', $data);
                $this->load->view('footer');
            }

        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if (isset($_POST['email-checkbox'])) {
            if (('on' == $_POST['email-checkbox']) && ('pos' == $_POST['payment-type'])) {

                $this->load->model('qmail');
                $qmail = new qmail();

                $file_name = 'OrderConfirmation.pdf';
                $from_email = $data['header_details']->getClientEmail();
                $from_name = $data['header_details']->getClientName();
                $to_email = $data['header_details']->getCustomersEmail();
                $reply_to = $data['header_details']->getCustomersEmail();
                $subject = 'Order Confirmation - ' . $data['header_details']->getClientName();
                $message = 'Order Details Attached.';
                $view = $this->load->view('documents/order_confirmation', $data, true);

                $result = $qmail->send($file_name, $view, $from_email, $from_name, $to_email, $reply_to, $subject, $message);
            }
        }

        if ('invoice' == $_POST['payment-type']) {

            $this->load->model('invoice_header');
            $invoice = new invoice_header();
            $result = $invoice->create_invoice($data);
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function delete_proposal()
    {

        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;

        if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
            $this->load->model('proposal_model');
            $proposal = new proposal_model();
            $data['deleted'] = $proposal->delete_proposal($this->session->userdata('proposal_id'));

            //load the views
            $this->view_proposal();
        } else {

            $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

            $this->load->view('header');
            $this->load->view('blank_message', $data);
            $this->load->view('footer');
        }

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }
}
