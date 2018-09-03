<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system
 *
 * @author fcarpio
 */
class system extends CI_Controller {
    
        
    public function assume_identity()
    {
        
        //get user permissions
	$this->load->model('permission_model');
	$permissions = new permission_model();
	$permission = $permissions->getUserPermissions();
        $data['permission'] = $permission;
        
        if($permission->getIronMan()) {
            
            //get users for autocomplete
            $this->load->model('autocomplete_model');
            $all_users = new autocomplete_model();
            $data['users'] = $all_users->get_all();
            
            $data['page_title'] = 'Assume Identity';
            
            $this->load->view('header', $data);
	    $this->load->view('system/assume_ident', $data);
	    $this->load->view('footer');
        } else {

	    $data['message'] = '<p class="text-error">You do not have permission to view this page.</p>';

	    $this->load->view('header');
	    $this->load->view('blank_message', $data);
	    $this->load->view('footer');
	}
    }
    
    public function execute_identity()
    {
        
        $this->load->model('system_model');
        $auth = new system_model();
        $assumed = $auth->assume_identity($_POST['user_name']);
        
        if($assumed) {
            // get chart widget
            $this->load->model('widget_model');
            $pulse = new widget_model();
            $data['chart'] = $pulse->get_pulse_data();

            //$data['page_title'] = 'Dashboard';

            //$this->load->view('header', $data);
            //$this->load->view('body');
            //$this->load->view('footer');
            $this->load->view('system/redirect');
        } else {
            $this->load->view('header', $data);
            print 'Woops! Assuming Identity failed. :(';
            $this->load->view('footer');
        }

    }
    
    public function return_identity()
    {
        
        $this->load->model('system_model');
        $auth = new system_model();
        $assumed = $auth->return_identity($this->session->userdata('admin_user_name'));
        
        if($assumed) {
            // get chart widget
            $this->load->model('widget_model');
            $pulse = new widget_model();
            $data['chart'] = $pulse->get_pulse_data();

            $this->load->view('system/redirect');

        } else {
            $this->load->view('header', $data);
            print 'Woops! Assuming Identity failed. :(';
            $this->load->view('footer');
        }

    }
}
