<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author fcarpio
 */
class MY_auth extends CI_Controller {
    
    function MY_auth(){
        parent::home_page();
    }

    public function auth() {
        
        $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->run();

        $this->load->model('authentication_model');
        $auth = new authentication_model();
        $auth = $auth->authenticate();

        if ($auth) {
            $this->home();
        } else {
            sleep(5);
            $data['error_message'] = 'Authentication error';
            $this->load->view('login_form', $data);
        }
    }
}
