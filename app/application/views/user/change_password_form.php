<style type="text/css">
    
    div.change_password_form_container {
        display: inline-block;
        margin: 0 auto;
        width: 500px;
    }
</style>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$attributes = array('class' => 'form-horizontal');

?>
<div class="change_password_form_container">
    
    <?= form_open('user/validate_change_password', $attributes) ?>
    
    <div class="control-group">
        <label class="control-label" for="newpass1">New Password:</label>
        <div class="controls">
            <input type="password" id="newpass1" name="newpass1" value="<?=(isset($_POST['newpass1'])) ? $_POST['newpass1'] : '' ; ?>" placeholder="New Password">
            <?php if(isset($newpass1_error)) echo '<br><span class="text-error">'.$newpass1_error.'</span>'; ?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="newpass2">Retype Password:</label>
        <div class="controls">
            <input type="password" id="newpass2" name="newpass2" value="<?=(isset($_POST['newpass2'])) ? $_POST['newpass2'] : '' ; ?>" placeholder="Retype Password">
            <?php if(isset($newpass2_error)) echo '<br><span class="text-error">'.$newpass2_error.'</span>'; ?>
        </div>
    </div>
    
    <div>
        <button type="submit" class="btn btn-primary pull-right submit submit-btn">Change Password</button>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Changing Password...">
    </div>
    
    <?= form_close() ?>
    
</div>

<script type="text/javascript">
	$('.submit-btn').click(function () {
		$('.error-message').remove()
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Changing Password...');
		$('.preloader').show();
	});
</script>