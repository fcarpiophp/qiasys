<style type="text/css">

	div.delete_supplier_div {
		width: 500px;
		margin: 0 auto;
		display: inline-block;
		background-color: #F5F5F5;
		padding-top: 20px;
		border-top: 1px solid #E5E5E5;
	}

	.form-actions {
		border-top: 0px;
	}

</style>

<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 2/20/14
 * Time: 2:47 PM
 */

	$attributes = array('class' => 'form-horizontal');
?>

<br><br>
<?php
if(isset($message)) {
	print $message;//success or error message after adding supplier
}
?>

<?= form_open('supplier/validate_delete_supplier', $attributes) ?>

<div class="delete_supplier_div">

	<div style="background-color: #f5f5f5" class="control-group">
		<label class="control-label" for="supplier_name">Supplier Name:</label>
		<div class="controls">
			<input type="text" id="supplier_name" name="supplier_name" value="<?=(isset($_POST['supplier_name'])) ? $_POST['supplier_name'] : '' ; ?>" placeholder="(autocomplete)">
			<?php if(isset($supplier_name_error)) echo '<br><span class="text-error">'.$supplier_name_error.'</span>'; ?>
		</div>
	</div>

	<div>
		<button type="submit" class="btn btn-primary pull-right submit submit-btn">Delete Supplier</button>
		<img class="preloader pull-right" style="display: none; margin-right: 30px;"
		     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Deleting Supplier...">
		<button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
	</div>

</div>

<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="application/javascript">

	$(function () {

		var suppliers = <?=$suppliers?>;

		$('#supplier_name').autocomplete({
			source: suppliers,
			maxLength: 3,
			select: function (event, ui) {

				var supplier = ui.item.value;
				var post_data = {
					'supplier': supplier
				};
			}
		});
	});

	$('.submit-btn').click(function () {
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Deleting Supplier...');
		$('.preloader').show();
	});
    
</script>