<style type="text/css">
    .item_details {
	width: 640px; /*can be in percentage also.*/
	height: auto;
	margin: 0 auto;
	padding: 10px;
	position: relative;
    }

    .show_form {
	margin-right: 15px;
    }

    .icon-pencil {
	margin-right: 10px;
    }

    .icon-shopping-cart {
	margin-left: 10px;
	margin-top: 2px;
    }

    .icon-pencil:hover,
    .icon-shopping-cart:hover {
	cursor: pointer;
    }
</style>
<?php
$qty = array(
    'name' => 'item_qty',
    'id' => 'item_qty',
    'class' => 'span1 pull-right',
    'value' => 1,
    'maxlength' => '5',
    'size' => '5'
);
$hidden_fields = array('item_part_number' => $item_details[0]['item_part_number']);
?>

<!-- modal start -->
<?= form_open('proposal/add_to_proposal', '', $hidden_fields) ?>
<div id="add_to_cart" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
	<a class="close" data-dismiss="modal">x</a>
	<h4 class="text-left">Add part no. <?= $item_details[0]['item_part_number'] ?> to cart</h4>
    </div>
    <div class="text-left modal-body">
	<p><strong>Description</strong></p>

	<div class="pull-left">
	    <?= $item_details[0]['item_description'] ?>
	</div>

	<br><br>

	<div style="width: 80%; margin-left: 10%;">
	    <div class="pull-left">Quantity: </div>
	    <div style="white-space: nowrap; min-width: 90px;" class="input-append pull-right">
		<span class="add-on pull-right"><?= $item_details[0]['item_uom'] ?></span>
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

<br>

<div class="row-fluid display">
    <div class="item_details">
	<table class='table table-striped'>
	    <tr>
		<td colspan="3" class="text-left">
		    <strong>Description:</strong> <?= $item_details[0]['item_description'] ?>
		</td>
	    </tr>
	    <tr>
		<td class="text-left" style="padding-right: 10px;"><strong>Part
			Number: </strong><?= $item_details[0]['item_part_number'] ?></td>
		<td class="text-left"><strong>Supplier:</strong> <?= $item_details[0]['supplier_name'] ?></td>
		<td class="text-left"><strong>Manufacturer:</strong> 
                <?= 
                    (isset($item_details[0]['manufacturer_name'])) ? $item_details[0]['manufacturer_name']: ''; 
                ?>
                </td>
	    </tr>
	    <tr>
		<td class="text-left"><strong>Unit of Measure:</strong> <?= $item_details[0]['item_uom'] ?></td>
		<td class="text-left"><strong>In Stock:</strong> <?= $item_details[0]['item_stock'] ?></td>
		<td class="text-left"><strong>On Order:</strong> <?= $item_details[0]['item_on_order'] ?></td>
	    </tr>
	    <tr>
		<td class="text-left"><strong>Min:</strong> <?= $item_details[0]['item_min'] ?></td>
		<td class="text-left"><strong>Max:</strong> <?= $item_details[0]['item_max'] ?></td>
		<td class="text-left"><strong>Order Qty:</strong> <?= $item_details[0]['item_order_qty'] ?></td>
	    </tr>
	    <tr>
		<td class="text-left"><strong>Min Order:</strong> <?= $item_details[0]['item_min_order'] ?></td>
		<td class="text-left"><strong>Item Site:</strong> <?= $item_details[0]['item_site'] ?></td>
		<td class="text-left"><strong>Item Location:</strong> <?= $item_details[0]['item_location'] ?></td>
	    </tr>
	    <tr>
		<td class="text-left"><strong>Cost:</strong> <?= $item_details[0]['item_cost'] ?></td>
		<td class="text-left"><strong>Item MSRP:</strong> <?= $item_details[0]['item_msrp'] ?></td>
		<td class="text-left"><strong>Item Price:</strong> <?= $item_details[0]['item_price'] ?></td>
	    </tr>
	    <tr>
		<td colspan="3">
		    <?php
		    if ($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) {
			print("<a href='" . base_url() . "index.php/inventory/edit_item_details/" . $item_details[0]['item_part_number'] . "' class='btn pull-left'>Edit Item</a>");
		    }

                    if ($permission->getIronMan() || $permission->getAdmin() || $permission->getSell() || $permission->getProposal()) {
                        print("<button class='btn btn-success pull-right show-modal'><i class='icon-shopping-cart pull-right icon-white'></i>Add to Proposal</button>");
                    }
		    ?>
		</td>
	    </tr>
	</table>
    </div>
</div>

<script type="text/javascript">

    $('.show-modal').click(function() {
	$('#add_to_cart').modal('show');
    });

    $('.submit').click(function() {
	$('.submit').addClass('disabled');
	$('.submit').text('Processing...');
	$('.preloader').show();
    });
</script>