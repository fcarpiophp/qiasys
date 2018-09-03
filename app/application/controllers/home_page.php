<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class home_page extends CI_Controller {

    public function index() {
        if($this->session->userdata('authenticated')) {
            $this->home();
        } else {
            $this->load->view('login_form');
        }
    }
    
    public function auth() {
        
        $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->run();

        $this->load->model('authentication_model');
        $auth = new authentication_model();
        $auth = $auth->authenticate();

        if ($auth) {
            $this->load->helper('url');
            redirect(base_url());
        } else {
            sleep(5);
            $data['error_message'] = 'Authentication error';
            $this->load->view('login_form', $data);
        }
    }

    public function home() {
	    
        // get chart widget
        $this->load->model('widget_model');
        $pulse = new widget_model();
        $data['chart'] = $pulse->get_pulse_data();

        $data['page_title'] = 'Dashboard';

        $this->load->view('header', $data);
/*
 *      Redo
        if (strtolower($_POST['password']) == 'password') {
            $url = base_url() . 'index.php/user/change_password';
            $data['message'] = '<p class="text-error">Please change your default password by clicking <a href="' . $url . '">HERE</a>.</p><br>';
            $this->load->view('blank_message', $data);
        }
*/
        $this->load->view('body');
        $this->load->view('footer');

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home_page');

        if ('localhost' == $_SERVER['SERVER_NAME']) {
            $this->output->enable_profiler(TRUE);
        }
    }

}
