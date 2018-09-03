<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Authentication_model extends CI_Model {

    function authenticate() {
        $query = "
            SELECT DISTINCT
                users.id, 
                users.user_client_id, 
                users.user_name, 
                users.user_first_name, 
                users.user_last_name, 
                users.user_password, 
                users.user_add_1, 
                users.user_add_2, 
                users.user_city, 
                users.user_state, 
                users.user_zip, 
                transaction_header.id AS proposal_id,
                transaction_header.is_active,
                users.user_site_id,
                sites.site_name,
                sites.id as site_id, 
                sites.city_tax, 
                sites.state_tax
            FROM 
                users 
            LEFT JOIN 
                transaction_header 
            ON 
                users.id = transaction_header.user_id 
            AND 
                users.user_client_id = transaction_header.client_id
            LEFT JOIN 
                sites
            ON
                sites.id = users.user_site_id
            WHERE 
	        user_name = ? AND user_password = ? AND users.is_active = true
            LIMIT 1";
        
        $result = $this->db->query(
            $query,
            array(
                $this->input->post('username'),
                md5($this->input->post('password'))
            )
        );
 
        if (!$result) {
            return false;
        } else {
            //if (1 == $result->num_rows()) {
                foreach ($result->result() as $row) {
                    $data = array(
                        'id' => $row->id,
                        'user_client_id' => $row->user_client_id,
                        'user_name' => $row->user_name,
                        'user_first_name' => $row->user_first_name,
                        'user_last_name' => $row->user_last_name,
                        'user_add_1' => $row->user_add_1,
                        'user_add_2' => $row->user_add_2,
                        'user_city' => $row->user_city,
                        'user_state' => $row->user_state,
                        'user_zip' => $row->user_zip,
                        'proposal_id' => $row->proposal_id,
                        'proposal_active' => $row->is_active,
                        'user_site_id' => $row->user_site_id,
                        'site_name' => $row->site_name,
                        'site_id' => $row->site_id,
                        'city_tax' => $row->city_tax,
                        'state_tax' => $row->state_tax,
                        'authenticated' => true
                    );

                    $this->session->set_userdata($data);
                }
            //}
            
            

            return true;
        }
    }

}

?>
