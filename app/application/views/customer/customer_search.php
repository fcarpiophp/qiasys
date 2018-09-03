<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 11/11/13
 * Time: 6:43 PM
 */
?>
<script type="text/css">
    ul, li {
	list-style: none !important;
    }

</script>

</head>
<body>
    <?php
    if (!empty($error_message)) {
	echo '<span class="text-error">' . $error_message . '</span><br>';
    }
    ?>
    <br>
    <p style="display:block;" class="muted">To add a new Customer enter the Customer information and click the <strong>Submit</strong> button.</p>
    <br>
    <div class="cust_info_container">
	<form action="<?= base_url() ?>index.php/customer/process_search" method="post" class="form-horizontal">
	    <div>
		<div class="pull-left user_info_form_container_left">
		    <div class="control-group">
			<label class="control-label" for="firstName">First Name:</label>

			<div class="controls">
			    <input name="firstName" class="input-medium" type="text" id="firstName"
				   value="<?= (isset($_POST['firstName'])) ? $_POST['firstName'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="lastName">Last Name:</label>

			<div class="controls">
			    <input name="lastName" class="input-medium" type="text" id="lastName"
				   value="<?= (isset($_POST['lastName'])) ? $_POST['lastName'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="email">Email:</label>

			<div class="controls">
			    <input name="email" class="input-medium" type="text" id="email" placeholder="(autocomplete)"
				   value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
			    <img class="preloader_email" style="display: none;"
				 src="<?= base_url() ?>application/images/preloader_small.gif">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="phone">Phone:</label>

			<div class="controls">
			    <input name="phone" class="input-medium" type="text" id="phone" placeholder="(autocomplete)"
				   value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : '' ?>">
			    <img style="display: none;" class="preloader_phone pull-right"
				 src="<?= base_url() ?>application/images/preloader_small.gif">
			</div>
		    </div>
		</div>

		<div class="pull-left user_info_form_container_right">
		    <div class="control-group">
			<label class="control-label" for="address1">Address:</label>

			<div class="controls">
			    <input name="address1" class="input-medium" type="text" id="address1"
				   value="<?= (isset($_POST['address1'])) ? $_POST['address1'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="address2">Address Cont'd:</label>

			<div class="controls">
			    <input name="address2" class="input-medium" type="text" id="address2"
				   value="<?= (isset($_POST['address2'])) ? $_POST['address2'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="city">City:</label>

			<div class="controls">
			    <input name="city" class="input-medium" type="text" id="city"
				   value="<?= (isset($_POST['city'])) ? $_POST['city'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="state">State:</label>

			<div class="controls">
			    <input name="state" class="input-medium" type="text" id="state"
				   value="<?= (isset($_POST['state'])) ? $_POST['state'] : '' ?>">
			</div>
		    </div>

		    <div class="control-group">
			<label class="control-label" for="zip">Zip Code:</label>

			<div class="controls">
			    <input name="zip" class="input-medium" type="text" id="zip"
				   value="<?= (isset($_POST['zip'])) ? $_POST['zip'] : '' ?>">
			</div>
		    </div>
		</div>
		<button value="submit" name="action" type="submit" id="submit-button" class="btn btn-primary pull-right">Submit</button>
		<button value="search" name="action" style="margin-right: 10px;" type="submit" id="view-orders-button" class="btn btn-primary pull-right">Search Orders</button>
	    </div>
	    <input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">
	</form>

    </div>

    <script type="text/javascript">
	$(function() {
	    var phone_numbers = <?= $phone_numbers ?>;
	    var emails = <?= $emails ?>;

	    $("#phone").autocomplete({
		source: phone_numbers,
		maxLength: 3,
		select: function(event, ui) {

		    var phone_number = ui.item.value;
		    var post_data = {
			'phone_number': phone_number
		    };

		    $.ajax({
			type: 'post',
			dataType: 'json',
			data: post_data,
			url: $('.base_url').val() + 'proposal/get_customer_data',
			beforeSend: function() {
			    $('.preloader_phone').show();
			},
			complete: function() {
			    $('.preloader_phone').hide();
			},
			success: function(data) {
			    $('#firstName').val(data.first_name);
			    $('#lastName').val(data.last_name);
			    $('#email').val(data.email);
			    $('#phone').val(data.phone);
			    $('#address1').val(data.address1);
			    $('#address2').val(data.address2);
			    $('#city').val(data.city);
			    $('#state').val(data.state);
			    $('#zip').val(data.zip);
			},
			error: function() {
			    alert('Autocomplete from phone number failed, please type the customer information.');
			}
		    });


		}
		//$('#view-orders-button').show();

	    });

	    $("#email").autocomplete({
		source: emails,
		maxLength: 3,
		select: function(event, ui) {

		    var email = ui.item.value;
		    var post_data = {
			'email': email
		    };

		    $.ajax({
			type: 'post',
			dataType: 'json',
			data: post_data,
			url: $('.base_url').val() + 'proposal/get_customer_data',
			beforeSend: function() {
			    $('.preloader_email').show();
			},
			complete: function() {
			    $('.preloader_email').hide();
			},
			success: function(data) {
			    $('#firstName').val(data.first_name);
			    $('#lastName').val(data.last_name);
			    $('#email').val(data.email);
			    $('#phone').val(data.phone);
			    $('#address1').val(data.address1);
			    $('#address2').val(data.address2);
			    $('#city').val(data.city);
			    $('#state').val(data.state);
			    $('#zip').val(data.zip);
			},
			error: function() {
			    alert('Autocomplete from email failed, please type the customer information.');
			}
		    });
		}
	    });
	});

    </script>
