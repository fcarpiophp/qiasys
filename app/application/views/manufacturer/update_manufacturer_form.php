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
    
    .checked {
        margin-top: 8px !important;
    }

</style>

<br><br>
<?php
	if(isset($message)) {
		print $message;//success or error message after adding manufacturer
	}
?>

<?= form_open('manufacturer/validate_update_manufacturer', $attributes) ?>

	<div class="new_manufacturer">

		<div class="manufacturer_info_1">

			<div class="control-group">
				<label class="control-label" for="manufacturer_name">Manufacturer Name:</label>
				<div class="controls">
					<input type="text" id="manufacturer_name" name="manufacturer_name" value="<?=(isset($_POST['manufacturer_name'])) ? $_POST['manufacturer_name'] : '' ; ?>" placeholder="(autocomplete)">
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
            
            <?php
                if(isset($_POST['manufacturer_active'])) {
                    if($_POST['manufacturer_active'] == 1) {
                        $checked = 'checked';
                    }
                    else {
                        $checked = '';
                    }
                }
                else {
                    $checked = '';
                }
            ?>
            <div class="control-group">
				<label class="control-label" for="manufacturer_active">Active:</label>
				<div class="controls">
                    <input class="pull-left checked" type="checkbox" id="manufacturer_active" value="1" name="manufacturer_active" <?=$checked?>>
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
			<button type="submit" class="btn btn-primary pull-right submit submit-btn">Update Manufacturer</button>
			<img class="preloader pull-right" style="display: none; margin-right: 30px;"
			     src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Updating Manufacturer...">
			<button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
		</div>

	</div>

    <input type="hidden" name="manufacturer_id" id="manufacturer_id" value="">
	<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="text/javascript">

	$(function () {

		var manufacturers = <?=$manufacturers?>;

		$('#manufacturer_name').autocomplete({
			source: manufacturers,
			maxLength: 3,
			select: function (event, ui) {

				var manufacturer_name = ui.item.value;
				var post_data = {
					'manufacturer_name': manufacturer_name
				};

				$.ajax({
					type: 'post',
					dataType: 'json',
					data: post_data,
					url: $('.base_url').val() + 'manufacturer/get_manufacturer_data',
					beforeSend: function () {
						$('.preloader').show();
					},
					complete: function () {
						$('.preloader').hide();
					},
					success: function (data) {

                        $('#manufacturer_id').val(data.manufacturer_id);
						$('#manufacturer_name').val(data.manufacturer_name);
                        $('#manufacturer_add_1').val(data.manufacturer_add_1);
                        $('#manufacturer_add_2').val(data.manufacturer_add_2);
                        $('#manufacturer_city').val(data.manufacturer_city);
                        $('#manufacturer_state').val(data.manufacturer_state);
                        $('#manufacturer_zip').val(data.manufacturer_zip);
                        $('#manufacturer_phone').val(data.manufacturer_phone);
                        $('#manufacturer_fax').val(data.manufacturer_fax);
                        $('#manufacturer_email').val(data.manufacturer_email);
                        $('#manufacturer_rep_name').val(data.manufacturer_rep);
                        $('#manufacturer_rep_email').val(data.manufacturer_rep_email);
                        $('#manufacturer_rep_phone').val(data.manufacturer_rep_phone);
                        $('#manufacturer_rep_fax').val(data.manufacturer_rep_fax);
                        $('#manufacturer_name').val(data.manufacturer_name);
                        
                        if(data.manufacturer_active == 1) {
                            $('#manufacturer_active').attr('checked', true);
                        }
                        else {
                            $('#manufacturer_active').attr('checked', false);
                        }

					},
					error: function () {
						alert('Autocomplete from manufacturer name failed, please type the manufacturer information.');
					}
				});
			}
		});
	});

	$('.submit-btn').click(function () {
		$('.error-message').remove()
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Updating Manufacturer...');
		$('.preloader').show();
	});

	$('.reset-btn').click(function() {
		$('input:checkbox').removeAttr('checked');
	});

</script>
