<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<style type="text/css">
	table {
		width: 100%;
	}

	tr {
		height: 50px;
	}

	td {
		padding: 5px;
		padding-right: 15px;
	}

	.show_form {
		margin-right: 15px;
	}
</style>

<br>

<?php
$item_description = array(
	'name' => 'item_description',
	'id' => 'item_description',
	'class' => 'span10 offset1 pull-right',
	'value' => (isset($_POST['item_description'])) ? $_POST['item_description'] : $item_details[0]['item_description'],
	'maxlength' => '200'
);

$supplier_name = array(
	'name' => 'supplier_name',
	'id' => 'supplier_name',
	'class' => 'span5 pull-right',
	'value' => (isset($_POST['supplier_name'])) ? $_POST['supplier_name'] : $item_details[0]['supplier_name'],
	'maxlength' => '45'
);

$item_uom = array(
	'name' => 'item_uom',
	'id' => 'item_uom',
	'class' => 'span5 pull-right',
	'value' => (isset($_POST['item_uom'])) ? $_POST['item_uom'] : $item_details[0]['item_uom'],
	'maxlength' => '3'
);

$item_stock = array(
	'name' => 'item_stock',
	'id' => 'item_stock',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_stock'])) ? $_POST['item_stock'] : $item_details[0]['item_stock'],
	'maxlength' => '11'
);

$item_on_order = array(
	'name' => 'item_on_order',
	'id' => 'item_on_order',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_on_order'])) ? $_POST['item_on_order'] : $item_details[0]['item_on_order'],
	'maxlength' => '11'
);

$item_min = array(
	'name' => 'item_min',
	'id' => 'item_min',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_min'])) ? $_POST['item_min'] : $item_details[0]['item_min'],
	'maxlength' => '11'
);

$item_max = array(
	'name' => 'item_max',
	'id' => 'item_max',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_max'])) ? $_POST['item_max'] : $item_details[0]['item_max'],
	'maxlength' => '11'
);

$item_min_order = array(
	'name' => 'item_min_order',
	'id' => 'item_min_order',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_min_order'])) ? $_POST['item_min_order'] : $item_details[0]['item_min_order'],
	'maxlength' => '11'
);

$item_order_qty = array(
	'name' => 'item_order_qty',
	'id' => 'item_order_qty',
	'class' => 'span8 pull-right',
	'value' => (isset($_POST['item_order_qty'])) ? $_POST['item_order_qty'] : $item_details[0]['item_order_qty'],
	'maxlength' => '11',
	'readonly' => 'readonly'
);

$item_site = array(
	'name' => 'item_site',
	'id' => 'item_site',
	'class' => 'span5 pull-right',
	'value' => (isset($_POST['item_site'])) ? $_POST['item_site'] : $item_details[0]['item_site'],
	'maxlength' => '45'
);

$item_location = array(
	'name' => 'item_location',
	'id' => 'item_location',
	'class' => 'span5 pull-right',
	'value' => (isset($_POST['item_location'])) ? $_POST['item_location'] : $item_details[0]['item_location'],
	'maxlength' => '45'
);

$item_cost = array(
	'name' => 'item_cost',
	'id' => 'item_cost',
	'class' => 'span7 pull-right',
	'value' => (isset($_POST['item_cost'])) ? number_format($_POST['item_cost'], 2, '.', ' ') : number_format($item_details[0]['item_cost'], 2, '.', ' '),
	'maxlength' => '45'
);

$item_msrp = array(
	'name' => 'item_msrp',
	'id' => 'item_msrp',
	'class' => 'span7 pull-right',
	'value' => (isset($_POST['item_msrp'])) ? number_format($_POST['item_msrp'], 2, '.', ' ') : number_format($item_details[0]['item_msrp'], 2, '.', ' '),
	'maxlength' => '45'
);

$item_price = array(
	'name' => 'item_price',
	'id' => 'item_price',
	'class' => 'span7 pull-right',
	'value' => (isset($_POST['item_price'])) ? number_format($_POST['item_price'], 2, '.', ' ') : number_format($item_details[0]['item_price'], 2, '.', ' '),
	'maxlength' => '45'
);

$hidden_fields = array(
	'item_part_number' => (isset($_POST['item_part_number'])) ? $_POST['item_part_number'] : $item_details[0]['item_part_number'],
	'item_supplier_id' => (isset($_POST['item_supplier_id'])) ? $_POST['item_supplier_id'] : $item_details[0]['item_supplier_id']
);
$item_part_number = (isset($_POST['item_description'])) ? $_POST['item_description'] : $item_details[0]['item_description']
?>
<!-- FORM START -->
<div class="row-fluid edit_details">
	<?= form_open('inventory/update_item_details', '', $hidden_fields); ?>
	<div class="span6 offset3">
		<?php echo '<div class="text-error">' . validation_errors() . '</div>'; ?>
		<table class='table-striped'>
			<tr>
				<th colspan="3">
					<h4>Edit Item Details for Part# <?=
						(isset($_POST['item_part_number']))
							? $_POST['item_part_number'] : $item_details[0]['item_part_number']?></h4>
				</th>
			</tr>
			<tr>
				<td colspan="3">
					<strong>Description:</strong><?= form_input($item_description) ?>
				</td>
			</tr>
			<tr>
				<td><strong>Part Number: </strong>
					<input
						title="Part numbers cannot be edited. If you need a new part number, a new item must be created."
						class="span5 pull-right" type="text" value="<?=
					(isset($_POST['item_part_number'])) ?
						$_POST['item_part_number'] : $item_details[0]['item_part_number']?>" disabled>
				</td>
				<td>
					<strong>Supplier Name:</strong><?= form_input($supplier_name) ?>
				</td>
				<td><strong>Unit of Measure:</strong><?= form_input($item_uom) ?></td>
			</tr>
			<tr>
				<td><strong class="pull-left">In Stock:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_stock) ?>
					</div>
				</td>
				<td><strong class="pull-left">On Order:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_on_order) ?>
					</div>
				</td>
				<td><strong class="pull-left">Min:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_min) ?>
					</div>
				</td>
			</tr>
			<tr>
				<td><strong class="pull-left">Max:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_max) ?>
					</div>
				</td>
				<td><strong class="pull-left">Order Qty:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_order_qty) ?>
					</div>
				</td>
				<td><strong class="pull-left">Min Order:</strong>

					<div style="width: 46%;" class="input-append pull-right">
                            <span class="add-on pull-right"><?=
	                            (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
		                            $item_details[0]['item_uom']?></span>
						<?= form_input($item_min_order) ?>
					</div>
				</td>
			</tr>
			<tr>
				<td><strong>Item Site:</strong>
					<?= form_input($item_site) ?>
				</td>
				<td><strong>Item Location:</strong>
					<?= form_input($item_location) ?>
				</td>
				<td><strong class="pull-left">Cost:</strong>

					<div style="width: 60%;" class="input-prepend pull-right">
						<?= form_input($item_cost) ?>
						<span class="add-on pull-right">$</span>
					</div>
				</td>
			</tr>
			<tr>
				<td><strong class="pull-left">MSRP:</strong>

					<div style="width: 60%;" class="input-prepend pull-right">
						<?= form_input($item_msrp) ?>
						<span class="add-on pull-right">$</span>
					</div>
				</td>
				<td><strong class="pull-left">Sell Price:</strong>

					<div style="width: 60%;" class="input-prepend pull-right">
						<?= form_input($item_price) ?>
						<span class="add-on pull-right">$</span>
					</div>
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3">
					<button type="button" class="btn pull-left cancel">Cancel</button>
					<button type="submit" class="btn btn-primary pull-right submit">Submit</button>
					<img class="preloader pull-right" style="display: none; margin-right: 30px;"
					     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
				</td>
			</tr>
		</table>
	</div>
	<?= form_close() ?>
</div>
<!-- FORM END -->

<script type="text/javascript">
	$('.btn-primary').click(function () {
		$('.submit').addClass('disabled');
		$('.submit').text('Processing...');
		$('.preloader').show();
	});
</script>
