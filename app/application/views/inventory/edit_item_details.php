<style type="text/css">
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

if (isset($manufacturer[0]['manufacturer_name'])) {
    $manuf = isset($manufacturer[0]['manufacturer_name']);
} elseif (isset($_POST['manufacturer_name'])) {
    $manuf = $_POST['manufacturer_name'];
} else {
    $manuf = 'n/a';
}

$manufacturer_name = array(
    'name' => 'manufacturer_name',
    'id' => 'manufacturer_name',
    'class' => 'span5 pull-right',
    'value' => $manuf,
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
    'title' => 'Calculated fields are not editable',
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
    'value' => (isset($_POST['item_cost'])) ? $_POST['item_cost'] : $item_details[0]['item_cost'],
    'maxlength' => '45'
);

$item_msrp = array(
    'name' => 'item_msrp',
    'id' => 'item_msrp',
    'class' => 'span7 pull-right',
    'value' => (isset($_POST['item_msrp'])) ? $_POST['item_msrp'] : $item_details[0]['item_msrp'],
    'maxlength' => '45'
);

$item_price = array(
    'name' => 'item_price',
    'id' => 'item_price',
    'class' => 'span7 pull-right',
    'value' => (isset($_POST['item_price'])) ? $_POST['item_price'] : $item_details[0]['item_price'],
    'maxlength' => '45'
);

$hidden_fields = array(
    'item_part_number' => (isset($_POST['item_part_number'])) ? $_POST['item_part_number'] : $item_details[0]['item_part_number'],
    'item_supplier_id' => (isset($_POST['item_supplier_id'])) ? $_POST['item_supplier_id'] : $item_details[0]['item_supplier_id']
);
?>
<!-- FORM START -->
<div class="row-fluid edit_details">
    <?= form_open('inventory/update_item_details', '', $hidden_fields); ?>
    <div class="span6 offset3">
	<?php echo '<div class="text-error">' . validation_errors() . '</div>'; ?>
	<table class='table table-striped'>
	    <tr>
		<td colspan="3"><strong class="pull-left">Description:</strong><?= form_input($item_description) ?></td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Part Number: </strong>
		    <input
			title="Part numbers cannot be edited. If you need a new part number, a new item must be created."
			class="span5 pull-right" type="text" value="<?=
	(isset($_POST['item_part_number'])) ?
	    $_POST['item_part_number'] : $item_details[0]['item_part_number']
	?>" disabled>
		</td>
	    </tr>
	    <tr>
		<td>
		    <strong class="pull-left">Supplier:</strong>
		    <select name="supplier_name" class="selectpicker span5 pull-right">
			<?php
			foreach ($all_suppliers as $supplier_row) {
			    print '<option value="' . $supplier_row['id'] . '"';
			    ($supplier[0]['supplier_name'] == $supplier_row['supplier_name']) ? print ' selected' : print '';
			    print '>' . $supplier_row['supplier_name'] . '</option>';
			}
			?>
		    </select>
		</td>
	    </tr>
	    <tr>
		<td>
		    <strong class="pull-left">Manufacturer:</strong>
		    <select name="manufacturer_name" class="selectpicker span5 pull-right">
			<?php
			foreach ($all_manufacturers as $manufacturer_row) {
			    print '<option value="' . $manufacturer_row['id'] . '"';
			    ($manufacturer[0]['manufacturer_name'] == $manufacturer_row['manufacturer_name']) ? print ' selected' : print '';
			    print '>' . $manufacturer_row['manufacturer_name'] . '</option>';
			}
			?>
		    </select>
		</td>

	    </tr>
	    <tr>
		<td><strong class="pull-left">UOM:</strong><?= form_input($item_uom) ?></td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">In Stock:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
			    (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
				$item_details[0]['item_uom']
			    ?></span>
<?= form_input($item_stock) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">On Order:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
			    (isset($_POST['item_uom'])) ? $_POST['item_uom'] :
				$item_details[0]['item_uom']
			    ?></span>
<?= form_input($item_on_order) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Min:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
			(isset($_POST['item_uom'])) ? $_POST['item_uom'] :
			    $item_details[0]['item_uom']
			?></span>
<?= form_input($item_min) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Max:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
(isset($_POST['item_uom'])) ? $_POST['item_uom'] :
    $item_details[0]['item_uom']
?></span>
<?= form_input($item_max) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Order Qty:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
(isset($_POST['item_uom'])) ? $_POST['item_uom'] :
    $item_details[0]['item_uom']
?></span>
<?= form_input($item_order_qty) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Min Order:</strong>

		    <div style="width: 46%;" class="input-append pull-right">
			<span class="add-on pull-right"><?=
(isset($_POST['item_uom'])) ? $_POST['item_uom'] :
    $item_details[0]['item_uom']
?></span>
		    <?= form_input($item_min_order) ?>
		    </div>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Item Site:</strong>
<?= form_input($item_site) ?>
		</td>
	    </tr>
	    <tr>
		<td><strong class="pull-left">Item Location:</strong>
<?= form_input($item_location) ?>
		</td>

	    </tr>
	    <tr>
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
	    </tr>
	    <tr>
		<td><strong class="pull-left">Sell Price:</strong>

		    <div style="width: 60%;" class="input-prepend pull-right">
<?= form_input($item_price) ?>
			<span class="add-on pull-right">$</span>
		    </div>
		</td>
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
    $(document).ready(function() {
	$('.cancel').click(function() {
	    window.history.go(-1);
	});

	$('.btn-primary').click(function() {
	    $('.submit').addClass('disabled');
	    $('.submit').text('Processing...');
	    $('.preloader').show();
	});
    });


</script>