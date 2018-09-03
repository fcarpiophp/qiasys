<style type="text/css">

    div.delete_user_div {
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
if (isset($message)) {
    print $message; //success or error message after adding user
}
?>

<?= form_open('system/execute_identity', $attributes) ?>

<div class="delete_user_div">

    <div style="background-color: #f5f5f5" class="control-group">
        <label class="control-label" for="user_name">User Name:</label>
        <div class="controls">
            <input type="text" id="user_name" name="user_name" value="<?= (isset($_POST['user_name'])) ? $_POST['user_name'] : ''; ?>" placeholder="user@example.com">
            <?php if (isset($user_name_error)) echo '<br><span class="text-error">' . $user_name_error . '</span>'; ?>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary pull-right submit submit-btn">Assume Identity</button>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Deleting User...">
        <button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
    </div>

</div>

<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="application/javascript">

    $(function () {

        var users = <?= $users ?>;

        $('#user_name').autocomplete({
            source: users,
            maxLength: 3,
            select: function (event, ui) {

                var user = ui.item.value;
                var post_data = {
                    'user': user
                };
            }
        });
        });

        $('.submit-btn').click(function () {
        $('.submit-btn').addClass('disabled');
        $('.submit-btn').text('Assuming Identity...');
        $('.preloader').show();
    });

</script>