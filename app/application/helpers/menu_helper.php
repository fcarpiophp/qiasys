<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author fcarpio
 */
class menu extends CI_Controller {
    
    public function get_menu() {
        
        $this->load->model('menu_model');
        $menu_item = new menu_model();
        $menu = array();
        $menu = $menu_item->get_menu_items();
  
        return $this->buildTree($menu);
    }
    
    public function buildTree($tree, $parent = 0){
        $menuTree = array();
        foreach($tree as $i => $item){
            if($item['parent'] == $parent){
                
                $menuTree[$item['id']] = $item;
                $menuTree[$item['id']]['submenu'] = $this->buildTree($tree, $item['id']);
            }
        }
        return $menuTree;
    }
}
