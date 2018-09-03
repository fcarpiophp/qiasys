<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widget
 *
 * @author Francisco
 */
class widget extends CI_Controller {
   public function profit_widget() {
        //get the data from the model
        $this->load->model('widget_model');
        $widget_data = $this->widget_model->profit_dollar_widget();
        
        //send data array to build a formatted table
        $this->load->model('display_tabular_data');
        $widget_table = $this->display_tabular_data->build_table($widget_data);
        
        return $widget_table;
   }
}

?>
