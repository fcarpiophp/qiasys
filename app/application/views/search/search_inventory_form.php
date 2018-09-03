<style>
	.search_div {
		width: 400px; /*can be in percentage also.*/
		height: auto;
		margin: 0 auto;
		padding: 10px;
		position: relative;
	}

	.wrapper > .container {
		padding: 0px;
	}
</style>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$item_part_number = array(
	'name' => 'item_part_number',
	'type' => 'text',
	'placeholder' => 'Part Number...',
	'class' => 'form_input'
);

$item_description = array(
	'name' => 'item_description',
	'type' => 'text',
	'placeholder' => 'Description...',
	'class' => 'form_input'
);

$supplier_name = array(
	'name' => 'supplier_name',
	'type' => 'text',
	'placeholder' => 'Supplier Name...',
	'class' => 'form_input'
);

$item_site = array(
	'name' => 'item_site',
	'type' => 'text',
	'placeholder' => 'Site...',
	'class' => 'form_input'
);

$attributes = array('class' => 'form-horizontal');
if (!isset($error_message)) {
	$error_message = "";
}
?>

<div style="margin: auto;" class="container">
	<div class="search_div">
		<?= "<p class='text-error'>" . $error_message . "</p>" ?>
		<?= form_open('search/search_inventory', $attributes) ?>
		<div class="control-group">
			<label class="control-label"><strong>Part Number:</strong></label>

			<div class="controls">
				<?= form_input($item_part_number) ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Description:</strong></label>

			<div class="controls">
				<?= form_input($item_description) ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Supplier Name:</strong></label>

			<div class="controls">
				<?= form_input($supplier_name) ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><strong>Site:</strong></label>

			<div class="controls">
				<?= form_input($item_site) ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary pull-right submit">Search</button>
				<img class="preloader pull-right" style="display: none; margin-right: 30px;"
				     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>

<script type="text/javascript">
	$('.btn-primary').click(function () {
		$('.submit').addClass('disabled');
		$('.submit').text('Processing...');
		$('.preloader').show();
	});
</script>