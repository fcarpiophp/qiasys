<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_model
 *
 * @author fcarpio
 */
class menu_model extends CI_Model {
    
    public function get_menu_items() {
        
        $query = 'SELECT id, name, label, url, parent, permission FROM menu';
        
        $result = $this->db->query($query);
        
        if (!$result) {
            // if query returns null
            $message = "Query failed in menu_model/get_item()";
            throw new Exception($message);
        } else {

            $menu_item = array();
            $menu = array();

            foreach ($result->result() as $row) {

                $menu_item['id']            = $row->id;
                $menu_item['name']          = $row->name;
                $menu_item['label']         = $row->label;
                $menu_item['url']           = $row->url;
                $menu_item['parent']        = $row->parent;
                $menu_item['permissions']   = $row->permission;
                $menu_item['children']      = $this->has_child($row->id);
                $menu[] = $menu_item;
            }
        }
        return $menu;
    }
    
    public function has_child($item) {
        
        $query  = 'select count(*) as child_count from menu where parent = ?';
        
        $result = $this->db->query(
            $query,
            array($item)
        );
        
        if (!$result) {
            return 0;
        } else {

            foreach ($result->result() as $row) {
                $child_count = $row->child_count;
            }
        }

        return $child_count;
    }
}
