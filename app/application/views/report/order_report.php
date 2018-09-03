<style type="text/css">
    #tab_data td:hover {
	cursor: pointer;
    }

    a.submit_order {
	position: relative;
	right: 2px;
    }

    .order_report_checkbox {
        margin-top: -4px !important;
    }
</style>


<div style="border: 1px solid #CCC; margin: 10px; padding: 10px; background-color: #DFF0D8; display: none;" class="selected_result success">
    <span class="text-success">Selected orders were successfully processed.</span>
</div>

<div style="border: 1px solid #CCC; margin: 10px; padding: 10px; background-color: #F2DEDE; display: none;" class="selected_result error">
    <span class="text-error">There was a problem processing the selected orders, please try again.</span>
</div>

<form id='process_order_form' method="post" action="<?= base_url() . 'index.php/order/submit_selected_orders' ?>">
    <button class="btn btn-success pull-right process_selected"
	    style="margin-right: 10px;" type="submit" disabled>Process Selected</button>
<!--	    
    <a href="<?= base_url() ?>index.php/order/submit_orders" class="btn btn-warning pull-right submit_order"
       style="margin-right: 10px;" type="submit">Process All</a>
-->

    <br><br>

    <table class="table table-hover order_report_table">
        <tr>
            <th class="text-info order_report_checkbox">
                <input class="check_all_control order_report_checkbox" type="checkbox">
            </th>
            <th class="text-info order_report_part_number">Part#</th>
            <th class="text-info order_report_description">Description</th>
            <th class="text-info order_report_supplier">Supplier</th>
            <th class="text-info order_report_manufacturer">Manufacturer</th>
            <th class="text-info order_report_qty">Order Qty</th>
            <th class="text-info order_report_uom">UOM</th>
            <th class="text-info order_report_stock">Stock</th>
            <th class="text-info order_report_on_order">On Order</th>
            <th class="text-info order_report_min">Min</th>
            <th class="text-info order_report_max">Max</th>
            <th class="text-info order_report_min_order">Min Order</th>
            <th class="text-info order_report_site">Site</th>
            <th class="text-info order_report_location">Location</th>
            <th class="text-info order_report_cost">Cost</th>
            <th class="text-info order_report_msrp">MSRP</th>
            <th class="text-info order_report_price">Price</th>
            <th class="text-info order_report_supp_id">Supp ID</th>
            <th class="text-info order_report_mfr_id">Mfr ID</th>
            <th class="text-info order_report_dropdown"></th>
        </tr>
	<?php
	foreach ($to_order as $order_line) {
	    
	    // I call shenanigans!
	    
	    $lines = array();

	    $lines[$order_line->getItem_id()]['part_id'] = $order_line->getItem_id();
	    $lines[$order_line->getItem_id()]['part_number'] = $order_line->get_item_part_number();
	    $lines[$order_line->getItem_id()]['description'] = $order_line->get_item_description();
	    $lines[$order_line->getItem_id()]['supplier_name'] = $order_line->get_supplier_name();
	    $lines[$order_line->getItem_id()]['manufacturer_name'] = $order_line->get_manufacturer_name();
	    $lines[$order_line->getItem_id()]['order_qty'] = $order_line->get_item_order_qty();
	    $lines[$order_line->getItem_id()]['uom'] = $order_line->get_item_uom();
	    $lines[$order_line->getItem_id()]['in_stock'] = $order_line->get_item_stock();
	    $lines[$order_line->getItem_id()]['on_order'] = $order_line->get_item_on_order();
	    $lines[$order_line->getItem_id()]['item_min'] = $order_line->get_item_min();
	    $lines[$order_line->getItem_id()]['item_max'] = $order_line->get_item_max();
	    $lines[$order_line->getItem_id()]['min_order'] = $order_line->get_item_min_order();
	    $lines[$order_line->getItem_id()]['site_name'] = $order_line->get_item_site_name();
            $lines[$order_line->getItem_id()]['site_id'] = $order_line->get_item_site_id();
	    $lines[$order_line->getItem_id()]['location'] = $order_line->get_item_location();
	    $lines[$order_line->getItem_id()]['cost'] = $order_line->get_item_cost();
	    $lines[$order_line->getItem_id()]['msrp'] = $order_line->get_item_msrp();
	    $lines[$order_line->getItem_id()]['price'] = $order_line->get_item_price();
	    $lines[$order_line->getItem_id()]['supplier_id'] = $order_line->get_supplier_id();
	    $lines[$order_line->getItem_id()]['manufacturer_id'] = $order_line->get_manufacturer_id();
	?>	
    	<tr>
    	    <td class="order_report_checkbox">
		<input id="<?= $order_line->getItem_id() ?>" name="selected[]" value="<?= base64_encode(serialize($lines)) ?>"
    		       class="check_all order_report_checkbox" type="checkbox">
    	    </td>
    	    <td class="order_report_part_number">
    		<div class="order_report_part_number">
		    <?= $order_line->get_item_part_number() ?>
    		</div>
    	    </td>
    	    <td class="order_report_description">
    		<div class="order_report_description">
		    <?= $order_line->get_item_description() ?>
    		</div>
    	    </td>
    	    <td class="order_report_supplier"><?= $order_line->get_supplier_name() ?></td>
    	    <td class="order_report_manufacturer"><?= $order_line->get_manufacturer_name() ?></td>
    	    <td class="order_report_qty"><?= $order_line->get_item_order_qty() ?></td>
    	    <td class="order_report_uom"><?= $order_line->get_item_uom() ?></td>
    	    <td class="in_stock 
    <?php
    if ($order_line->get_item_stock() < 0) {
	echo ' text-error';
    }
    ?>"><?= $order_line->get_item_stock() ?></td>
    	    <td class="order_report_on_order"><?= $order_line->get_item_on_order() ?></td>
    	    <td class="order_report_min"><?= $order_line->get_item_min() ?></td>
    	    <td class="order_report_max"><?= $order_line->get_item_max() ?></td>
    	    <td class="order_report_min_order"><?= $order_line->get_item_min_order() ?></td>
    	    <td class="order_report_site"><?= $order_line->get_item_site_name() ?></td>
    	    <td class="order_report_location"><?= $order_line->get_item_location() ?></td>
    	    <td class="order_report_cost"><?= $order_line->get_item_cost() ?></td>
    	    <td class="order_report_msrp"><?= $order_line->get_item_msrp() ?></td>
    	    <td class="order_report_price"><?= $order_line->get_item_price() ?></td>
    	    <td class="order_report_supp_id"><?= $order_line->get_supplier_id() ?></td>
    	    <td class="order_report_mfr_id"><?= $order_line->get_manufacturer_id() ?></td>
    	    <td class="order_report_dropdown">
                <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getPurchase() || 
                    $permission->getInventory()) { ?>
    		<div class="btn-group pull-right">
    		    <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
    			<i class="icon-chevron-down"></i>
    		    </a>
    		    <ul class="dropdown-menu dropdown-position">
                        <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) { ?>
    			<li>
    			    <a class="edit_details" href="#">Edit Item Details</a>
    			</li>
                        <?php } 
                        
                        if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() || 
                            $permission->getPurchase()) {
                        ?>
    			<li>
    			    <a class="view_details" href="#">View Item Details</a>
    			</li>
                        <?php } ?>
    		    </ul>
    		</div>
                <?php } ?>
    	    </td>
    	</tr>
    <?php
}
?>
    </table>
</form>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">
<script type="text/javascript">
    $(document).ready(function() {

	$('.order_report_checkbox').attr('checked', false);

	// enable/disable submit button on check/uncheck all
	$('.check_all_control').click(function() {

	    if($(this).prop('checked')) {
		$('input:checkbox').prop('checked', this.checked);
		$('.process_selected').removeAttr('disabled');    
	    }
	    else {
		$('input:checkbox').removeAttr('checked');
		$('.process_selected').attr('disabled', 'disabled');
	    }
	});
	
	// enable/disable submit button on single checks
	$('.check_all').click(function() {
	     var n = $( "input:checked" ).length;
	     
	     if(n > 0) {
		 $('.process_selected').removeAttr('disabled');
	     }
	     else {
		 $('.process_selected').attr('disabled', 'disabled');
	     }
	});

	$('.edit_details').click(function() {
	    var part_number = $.trim($(this).closest('tr').find('div.order_report_part_number').html());
	    var href = $('.base_url').val() + 'inventory/edit_item_details/' + part_number;

	    if (part_number) {
		window.location = href;
	    }
	});
        
        $('.view_details').click(function() {
	    var part_number = $.trim($(this).closest('tr').find('div.order_report_part_number').html());
	    var href = $('.base_url').val() + 'inventory/item_details/' + part_number;

	    if (part_number) {
		window.location = href;
	    }
	});

	$('.submit').click(function() {
	    
	    $('.submit').addClass('disabled');
	    $('.submit').text('Processing...');
	    $('.preloader').show();
	});
    });
</script>