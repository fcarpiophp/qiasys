<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 2/25/14
 * Time: 5:45 PM
 */
	$attributes = array('class' => 'form-horizontal');
?>
<style type="text/css">

	.manufacturer_info_1,
	.manufacturer_info_2 {
		float: left;
	}

	div.new_manufacturer {
		display: inline-block;
		margin: 0 auto;
		width: 800px;
	}

</style>

<br><br>
<?php
	if(isset($message)) {
		print $message;//success or error message after adding manufacturer
	}
?>

<?= form_open('manufacturer/validate_new_manufacturer', $attributes) ?>

	<div class="new_manufacturer">

		<div class="manufacturer_info_1">

			<div class="control-group">
				<label class="control-label" for="manufacturer_name">Manufacturer Name:</label>
				<div class="controls">
					<input type="text" id="manufacturer_name" name="manufacturer_name" value="<?=(isset($_POST['manufacturer_name'])) ? $_POST['manufacturer_name'] : '' ; ?>" placeholder="Manufacturer Name">
					<?php if(isset($manufacturer_name_error)) echo '<br><span class="text-error">'.$manufacturer_name_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_add_1">Manufacturer Address:</label>
				<div class="controls">
					<input type="text" id="manufacturer_add_1" name="manufacturer_add_1" value="<?=(isset($_POST['manufacturer_add_1'])) ? $_POST['manufacturer_add_1'] : '' ; ?>" placeholder="Manufacturer Address">
					<?php if(isset($manufacturer_add_1_error)) echo '<br><span class="text-error">'.$manufacturer_add_1_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_add_2">Manufacturer Address Cont'd:</label>
				<div class="controls">
					<input type="text" id="manufacturer_add_2" name="manufacturer_add_2" value="<?=(isset($_POST['manufacturer_add_2'])) ? $_POST['manufacturer_add_2'] : '' ; ?>" placeholder="Manufacturer Address Cont'd">
					<?php if(isset($manufacturer_add_2_error)) echo '<br><span class="text-error">'.$manufacturer_add_2_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_city">Manufacturer City:</label>
				<div class="controls">
					<input type="text" id="manufacturer_city" name="manufacturer_city" value="<?=(isset($_POST['manufacturer_city'])) ? $_POST['manufacturer_city'] : '' ; ?>" placeholder="Manufacturer City">
					<?php if(isset($manufacturer_city_error)) echo '<br><span class="text-error">'.$manufacturer_city_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_state">Manufacturer State:</label>
				<div class="controls">
					<input type="text" id="manufacturer_state" name="manufacturer_state" value="<?=(isset($_POST['manufacturer_state'])) ? $_POST['manufacturer_state'] : '' ; ?>" placeholder="Manufacturer State">
					<?php if(isset($manufacturer_state_error)) echo '<br><span class="text-error">'.$manufacturer_state_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_zip">Manufacturer Zip:</label>
				<div class="controls">
					<input type="text" id="manufacturer_zip" name="manufacturer_zip" value="<?=(isset($_POST['manufacturer_zip'])) ? $_POST['manufacturer_zip'] : '' ; ?>" placeholder="Manufacturer Zip">
					<?php if(isset($manufacturer_zip_error)) echo '<br><span class="text-error">'.$manufacturer_zip_error.'</span>'; ?>
				</div>
			</div>

		</div>

		<div class="manufacturer_info_2">

			<div class="control-group">
				<label class="control-label" for="manufacturer_phone">Manufacturer Phone:</label>
				<div class="controls">
					<input type="text" id="manufacturer_phone" name="manufacturer_phone" value="<?=(isset($_POST['manufacturer_phone'])) ? $_POST['manufacturer_phone'] : '' ; ?>" placeholder="Manufacturer Phone">
					<?php if(isset($manufacturer_phone_error)) echo '<br><span class="text-error">'.$manufacturer_phone_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_fax">Manufacturer Fax:</label>
				<div class="controls">
					<input type="text" id="manufacturer_fax" name="manufacturer_fax" value="<?=(isset($_POST['manufacturer_fax'])) ? $_POST['manufacturer_fax'] : '' ; ?>" placeholder="Manufacturer Fax">
					<?php if(isset($manufacturer_fax_error)) echo '<br><span class="text-error">'.$manufacturer_fax_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_email">Manufacturer Email:</label>
				<div class="controls">
					<input type="text" id="manufacturer_email" name="manufacturer_email" value="<?=(isset($_POST['manufacturer_email'])) ? $_POST['manufacturer_email'] : '' ; ?>" placeholder="Manufacturer Email">
					<?php if(isset($manufacturer_email_error)) echo '<br><span class="text-error">'.$manufacturer_email_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_rep_name">Sales Rep. Name:</label>
				<div class="controls">
					<input type="text" id="manufacturer_rep_name" name="manufacturer_rep_name" value="<?=(isset($_POST['manufacturer_rep_name'])) ? $_POST['manufacturer_rep_name'] : '' ; ?>" placeholder="Sales Rep. Name">
					<?php if(isset($manufacturer_rep_name_error)) echo '<br><span class="text-error">'.$manufacturer_rep_name_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_rep_phone">Sales Rep. Phone:</label>
				<div class="controls">
					<input type="text" id="manufacturer_rep_phone" name="manufacturer_rep_phone" value="<?=(isset($_POST['manufacturer_rep_phone'])) ? $_POST['manufacturer_rep_phone'] : '' ; ?>" placeholder="Sales Rep. Phone">
					<?php if(isset($manufacturer_rep_phone_error)) echo '<br><span class="text-error">'.$manufacturer_rep_phone_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_rep_fax">Sales Rep. Fax:</label>
				<div class="controls">
					<input type="text" id="manufacturer_rep_fax" name="manufacturer_rep_fax" value="<?=(isset($_POST['manufacturer_rep_fax'])) ? $_POST['manufacturer_rep_fax'] : '' ; ?>" placeholder="Sales Rep. Fax">
					<?php if(isset($manufacturer_rep_fax_error)) echo '<br><span class="text-error">'.$manufacturer_rep_fax_error.'</span>'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="manufacturer_rep_email">Sales Rep. Email:</label>
				<div class="controls">
					<input type="text" id="manufacturer_rep_email" name="manufacturer_rep_email" value="<?=(isset($_POST['manufacturer_rep_email'])) ? $_POST['manufacturer_rep_email'] : '' ; ?>" placeholder="Sales Rep. Email">
					<?php if(isset($manufacturer_rep_email_error)) echo '<br><span class="text-error">'.$manufacturer_rep_email_error.'</span>'; ?>
				</div>
			</div>

		</div>

		<div>
			<button type="submit" class="btn btn-primary pull-right submit submit-btn">Create Manufacturer</button>
			<img class="preloader pull-right" style="display: none; margin-right: 30px;"
			     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Creating Manufacturer...">
			<button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
		</div>

	</div>

<?= form_close() ?>

<script type="text/javascript">
	$('.submit-btn').click(function () {
		$('.error-message').remove()
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Creating Manufacturer...');
		$('.preloader').show();
	});

	$('.reset-btn').click(function() {
		$('input:checkbox').removeAttr('checked');
	});

</script>
