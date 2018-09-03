<style type="text/css">
    #tab_data td:hover {
	cursor: pointer;
    }
</style>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<table class="table table-hover">
    <thead>
	<tr>
	    <th style="white-space: nowrap;" class="text-info title_search_part_num"><strong>Part</strong></th>
	    <th class="text-info title_search_description"><strong>Description</strong></th>
	    <th class="text-info title_search_supplier_name"><strong>Supplier</strong></th>
	    <th class="text-info title_search_in_stock"><strong>In Stock</strong></th>
	    <th class="text-info title_search_uom"><strong>UOM</strong></th>
	    <th class="text-info title_search_on_order"><strong>On Order</strong></th>
	    <th class="text-info title_search_min"><strong>Min</strong></th>
	    <th class="text-info title_search_max"><strong>Max</strong></th>
	    <th class="text-info title_search_min_order"><strong>Min Order</strong></th>
	    <th class="text-info title_search_site"><strong>Site</strong></th>
	    <th class="text-info title_search_location"><strong>Location</strong></th>
	    <th class="text-info title_search_cost"><strong>Cost</strong></th>
	    <th class="text-info title_search_msrp"><strong>MSRP</strong></th>
	    <th class="text-info title_search_price"><strong>Price</strong></th>
	    <th class="text-info title_search_gp_dollar"><strong>GP$</strong></th>
	    <th class="text-info title_search_gp_percent"><strong>GP%</strong></th>
	    <th class="text-info title_search_actions"></th>
	</tr>
    </thead>

    <tbody>
<?php
foreach ($search_results as $line) {
    ?>
    	<tr id="<?= $line->getItemPartNumber() ?>">
    	    <td class="search_part_num" style="white-space: nowrap;">
                <span class="search_part_num" style="float:left;"><?= $line->getItemPartNumber() ?></span>
                <span style="white-space: nowrap;" class="part_num_nowrap pull-right">
    <?php
    if ($line->getItemStock() < $line->getItemMin()) {
	print '
	    <div class="part_num_img_wrapper" style="float:right;">
	    <img
	    src="' . base_url() . 'application/images/FatCow_Icons16x16/bullet_red.png"
	    id="pop" data-toggle="popover" data-content="Low Inventory" title="Alert!">
	    </div>';
    }
    ?>
                </span>
    	    </td>
    	    <td class="search_description">
                    <div class="search_description">
                        <?= $line->getItemDescription() ?>
                    </div>
                </td>
    	    <td class="search_supplier"><?= $line->getSupplierName() ?></td>
    	    <td class="search_in_stock <?php if ($line->getItemStock() < 0) print 'text-error'; ?>"><?= $line->getItemStock() ?></td>
    	    <td class="search_uom"><?= $line->getItemUom() ?></td>
    	    <td class="search_on_order"><?= $line->getItemOnOrder() ?></td>
    	    <td class="search_min"><?= $line->getItemMin() ?></td>
    	    <td class="search_max"><?= $line->getItemMax() ?></td>
    	    <td class="search_min_order"><?= $line->getItemMinOrder() ?></td>
    	    <td class="search_site"><?= $line->getItemSite() ?></td>
    	    <td class="search_location"><?= $line->getItemLocation() ?></td>
    	    <td class="search_cost"><?= $line->getItemCost() ?></td>
    	    <td class="search_msrp"><?= $line->getItemMsrp() ?></td>
    	    <td class="search_price"><?= $line->getItemPrice() ?></td>
    	    <td class="search__gp_dollar"><?= $line->getGpDollar() ?></td>
    	    <td class="search_gp_percent"><?= $line->getGpPercent() ?></td>
    	    <td class="search_actions">
    		<div class="btn-group pull-right">
                <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() ||
                    $permission->getSell() || $permission->getProposal()) { ?>    
    		    <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-chevron-down"></i></a>
    		    <ul class="dropdown-menu dropdown-position">
                        <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) { ?>
    			<li>
    			    <a class="edit_details" href="#">Edit Item Details</a>
    			</li>
                        <?php } ?>
                        <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() ||
                            $permission->getSell() || $permission->getProposal()) { ?>
    			<li>
    			    <a class="view_details" href="#">View Item Details</a>
    			</li>
                        <?php } ?>
                        <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getSell() || 
                            $permission->getProposal()) { ?>
    			<li>
    			    <a class="add_to_proposal" href="#">Add To Proposal</a>
    			</li>
                        <?php } ?>
    		    </ul>
                <?php } ?>    
    		</div>
    	    </td>
    	</tr>
    <?php
}
?>
    </tbody>
</table>

<input type="hidden" class="base_url" value="<?= base_url() ?>">

<?php
$qty = array(
    'name' => 'item_qty',
    'id' => 'item_qty',
    'class' => 'span1 pull-right',
    'value' => 1,
    'maxlength' => '5',
    'size' => '5'
);
?>

<!-- modal start -->
<?= form_open('proposal/add_to_proposal') ?>
<input class="modal_hidden_part_number" type="hidden" name="item_part_number" value="">
<div id="add_to_cart" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
	<a class="close" data-dismiss="modal">x</a>
	<h4 class="text-left modal_part_num"></h4>
    </div>
    <div class="text-left modal-body">
	<p><strong>Description</strong></p>

	<div class="pull-left modal_description"></div>

	<br><br>

	<div style="width: 80%; margin-left: 10%;">
	    <div class="pull-left">Quantity: </div>
	    <div style="white-space: nowrap; min-width: 90px;" class="input-append pull-right">
		<span class="add-on pull-right modal_uom"></span>
<?= form_input($qty) ?>
	    </div>
	</div>
    </div>
    <div class="modal-footer">
	<button type="submit" class="btn btn-success pull-right submit">Add to Proposal</button>
	<a href="#" class="btn pull-left" data-dismiss="modal">Close</a>
	<img class="preloader pull-right" style="display: none; margin-right: 30px;"
	     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
    </div>
</div>
<?= form_close() ?>
<!-- modal end -->

<script type="text/javascript">

    $(document).ready(function() {

	$('.edit_details').click(function() {
	    var href = $('.base_url').val() + 'index.php/inventory/edit_item_details/' + $(this).closest('tr').find('span.search_part_num').html();

	    if (href) {
		window.location = href;
	    }
	});

	$('.view_details').click(function() {
	    var href = $('.base_url').val() + 'index.php/inventory/item_details/' + $(this).closest('tr').find('span.search_part_num').html();

	    if (href) {
		window.location = href;
	    }
	});

	$('.add_to_proposal').click(function() {
	    var part_num = $(this).closest('tr').find('span.search_part_num').html();
	    var description = $(this).closest('tr').find('.search_description').html();
	    var uom = $(this).closest('tr').find('.search_uom').html();

	    $('.modal_part_num').html('Add part no. ' + part_num + ' to cart');
	    $('.modal_description').html(description);
	    $('.modal_uom').html(uom);
	    $('.modal_hidden_part_number').val(part_num);

	    $('#add_to_cart').modal('show');
	});

	$('[data-toggle="popover"]').popover({
	    trigger: 'click',
	    'placement': 'right'
	});

	//var part_num_width = $('.part_num_img_wrapper').width() + $('td.search_part_num').width();

	//$('table td.search_part_num').css('width', part_num_width + 'px');
	//$('div.part_num_nowrap').css('width', part_num_width + 'px');

    });
</script>