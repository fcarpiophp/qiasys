<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system_model
 *
 * @author fcarpio
 */
class system_model extends CI_Model {

    function assume_identity($user_name) {
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
                transaction_header.is_active
            FROM 
                    users 
            LEFT JOIN 
                    transaction_header 
            ON 
                    users.id = transaction_header.user_id 
            AND 
                    users.user_client_id = transaction_header.client_id
            WHERE 
                    user_name = ? LIMIT 1";

        $result = $this->db->query($query, array($user_name));
        
        print $this->db->last_query();

        if (!$result) {
            return false;
        } else {
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
                    'authenticated' => true,
                    'style' => true,
                    'admin_user_name' => $this->session->userdata('user_name')

                );

                $this->session->set_userdata($data);
            }
            return true;
        }
    }
    
    function return_identity($user_name) {
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
                users.user_type,
                transaction_header.id AS proposal_id,
                transaction_header.is_active,
                users.user_site
            FROM 
                    users 
            LEFT JOIN 
                    transaction_header 
            ON 
                    users.id = transaction_header.user_id 
            AND 
                    users.user_client_id = transaction_header.client_id
            WHERE 
                    user_name = ?";

        $result = $this->db->query($query, array($user_name));

        if ($result->num_rows() != 1) {
            return false;
        } else {
            if (1 == $result->num_rows()) {
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
                        'user_type' => $row->user_type,
                        'proposal_id' => $row->proposal_id,
                        'proposal_active' => $row->is_active,
                        'user_site' => $row->user_site,
                        'authenticated' => true
                    );

                    $this->session->sess_destroy();
                    $this->session->set_userdata($data);
                }
            }
            return true;
        }
    }

}
