<style type="text/css">

	div.delete_manufacturer_div {
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
	print $message;//success or error message after adding manufacturer
}
?>

<?= form_open('manufacturer/validate_delete_manufacturer', $attributes) ?>

<div class="delete_manufacturer_div">

	<div style="background-color: #f5f5f5" class="control-group">
		<label class="control-label" for="manufacturer_name">Manufacturer Name:</label>
		<div class="controls">
			<input type="text" id="manufacturer_name" name="manufacturer_name" value="<?=(isset($_POST['manufacturer_name'])) ? $_POST['manufacturer_name'] : '' ; ?>" placeholder="(autocomplete)">
			<?php if(isset($manufacturer_name_error)) echo '<br><span class="text-error">'.$manufacturer_name_error.'</span>'; ?>
		</div>
	</div>

	<div>
		<button type="submit" class="btn btn-primary pull-right submit submit-btn">Delete Manufacturer</button>
		<img class="preloader pull-right" style="display: none; margin-right: 30px;"
		     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Deleting Manufacturer...">
		<button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
	</div>

</div>

<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="application/javascript">

	$(function () {

		var manufacturers = <?=$manufacturers?>;

		$('#manufacturer_name').autocomplete({
			source: manufacturers,
			maxLength: 3,
			select: function (event, ui) {

				var manufacturer = ui.item.value;
				var post_data = {
					'manufacturer': manufacturer
				};
			}
		});
	});

	$('.submit-btn').click(function () {
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Deleting Manufacturer...');
		$('.preloader').show();
	});
    
</script>