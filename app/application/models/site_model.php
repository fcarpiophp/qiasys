<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of site
 *
 * @author fcarpio
 */
class site_model extends CI_Model {
    
    public function get_site_count()
    {
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        
        if($permission->getAdmin() || $permission->getIronMan()) {
            
            $query = 'SELECT count(*) as count FROM sites WHERE client_id = ?';
        } else {
            
            return 1;
        }
        
        $result = $this->db->query($query, array($this->session->userdata('user_client_id')));

        if (!$result) {
            // if query returns null
            $message = "Query failed in site/count_sites()";
            throw new Exception($message);
        } else {
            
            foreach ($result->result() as $row) {
                $count = $row->count;
            }

            return $count;
        }
    }
    
    public function get_all_sites() 
    {
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        
        if($permission->getAdmin() || $permission->getIronMan()) {
            $query = 'SELECT id, site_name FROM sites WHERE client_id = ?';
            $result = $this->db->query($query, array($this->session->userdata('user_client_id')));
        } else {
            $query  = 
                'SELECT users.user_site_id as id, sites.site_name as site_name 
                FROM users 
                JOIN sites on users.user_site_id = sites.id 
                WHERE user_client_id = ? AND users.user_name = ?';
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $this->session->userdata('user_name')
                )
            );
        }

        if (!$result) {
            // if query returns null
            $message = "Query failed in site_model/get_all_sites()";
            throw new Exception($message);
        } else {
            
            $sites = array();
            $site = array();
            
            foreach ($result->result() as $row) {
                $site['site_id'] = $row->id;
                $site['site_name'] = $row->site_name;
                $sites[] = $site;
            }

            return $sites;
        }
    }
    
    public function get_active_sites($part_number) 
    {
        //get user permissions
        $this->load->model('permission_model');
        $permissions = new permission_model();
        $permission = $permissions->getUserPermissions();
        
        if($permission->getAdmin() || $permission->getIronMan()) {
            $query = 'select item_sites.item_site_id, item_sites.item_site_name, item_sites.is_active, items.id from items
                left join client_supplier_lkup on client_id = ? and client_supplier_lkup.supplier_id = items.item_supplier_id
                left join item_sites on item_sites.item_id = items.id
                where item_part_number = ? and item_sites.is_active = 1';
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $part_number
                )
            );
        } else {
            $query = 'select item_sites.item_site_id, item_sites.item_site_name, item_sites.is_active, items.id from items
                left join client_supplier_lkup on client_id = ? and client_supplier_lkup.supplier_id = items.item_supplier_id
                left join item_sites on item_sites.item_id = items.id
                where item_part_number = ? and item_sites.item_site_id = ? and item_sites.is_active = 1';
            
            $result = $this->db->query(
                $query, 
                array(
                    $this->session->userdata('user_client_id'),
                    $part_number,
                    $this->session->userdata('site_id')
                )
            );
        }

        if (!$result) {
            // if query returns null
            $message = "Query failed in site_model/get_all_sites()";
            throw new Exception($message);
        } else {

            $site = array();
            $sites = array();
            
            foreach ($result->result() as $row) {
                $site['site_id'] = $row->item_site_id;
                $site['site_name'] = $row->item_site_name;
                $site['is_active'] = $row->is_active;
                $site['part_id'] = $row->id;
                $sites[] = $site;
            }

            return $sites;
        }
    }
}
