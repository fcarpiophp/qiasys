<style type="text/css">

    div.new_user {
        width: 1050px;
        margin: 0 auto;
        display: inline-block;
    }

    .new_user_personal_info {
        float: left;
    }

    .new_user_permissions {
        float: left;
    }
    .new_user_permissions .controls {
        margin-left: 80px;
    }

    .permissions {
        margin-left: 80px;
    }

    .new_user_permissions label {
        text-align: left;
    }

    .wrapper {
        width: 100%;
    }

    .new_user_business_info {
        float: left;
    }

    .form-actions {
        margin-top: -20px;
    }

</style>

<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 2/16/14
 * Time: 5:45 PM
 */
$attributes = array('class' => 'form-horizontal');
?>

<br><br>
<?php
if (isset($message)) {
    print $message; //success or error message after adding user
}
?>

<?= form_open('user/validate_new_user', $attributes) ?>
<div class="new_user">

    <div class="new_user_personal_info">

        <div class="control-group">
            <label class="control-label" for="user_name">User Name:</label>
            <div class="controls">
                <input type="text" id="user_name" name="user_name" value="<?= (isset($_POST['user_name'])) ? $_POST['user_name'] : ''; ?>" placeholder="user@example.com">
                <?php if (isset($user_name_error)) echo '<br><span class="text-error">' . $user_name_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="first_name">First Name:</label>
            <div class="controls">
                <input type="text" id="first_name" name="first_name" value="<?= (isset($_POST['first_name'])) ? $_POST['first_name'] : ''; ?>" placeholder="First Name">
                <?php if (isset($first_name_error)) echo '<br><span class="text-error">' . $first_name_error . '</span>'; ?>
            </div>

        </div>

        <div class="control-group">
            <label class="control-label" for="last_name">Last Name:</label>
            <div class="controls">
                <input type="text" id="last_name" name="last_name" value="<?= (isset($_POST['last_name'])) ? $_POST['last_name'] : ''; ?>" placeholder="Last Name">
                <?php if (isset($last_name_error)) echo '<br><span class="text-error">' . $last_name_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="site">Site:</label>
            <div class="controls">
                <select name="site">
                    <option selected>Select Site</option>
                    <?php
                    foreach ($sites as $site) {

                        if ($_POST['site'] == $site['id']) {
                            $selected = ' selected';
                        } else {
                            $selected = '';
                        }

                        echo '<option value="' . $site['id'] . '"' . $selected . '>' . $site['site_name'] . '</option>';
                    }
                    ?>
                </select>
                <?php if (isset($site_error)) echo '<br><span class="text-error">' . $site_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="phone">Phone:</label>
            <div class="controls">
                <input type="text" id="phone" name="phone" value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>" placeholder="Phone">
            </div>
        </div>
    </div>

    <div class="new_user_business_info">

        <div class="control-group">
            <label class="control-label" for="add1">Address:</label>
            <div class="controls">
                <input type="text" id="add1" name="add1" value="<?= (isset($_POST['add1'])) ? $_POST['add1'] : ''; ?>" placeholder="Address">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="add2">Address Cont'd:</label>
            <div class="controls">
                <input type="text" id="add2" name="add2" value="<?= (isset($_POST['add2'])) ? $_POST['add2'] : ''; ?>" placeholder="Address Continued">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="city">City:</label>
            <div class="controls">
                <input type="text" id="city" name="city" value="<?= (isset($_POST['city'])) ? $_POST['city'] : ''; ?>" placeholder="City">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="state">State:</label>
            <div class="controls">
                <input type="text" id="state" name="state" value="<?= (isset($_POST['state'])) ? $_POST['state'] : ''; ?>" placeholder="State">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="zip">Zip Code:</label>
            <div class="controls">
                <input type="text" id="zip" name="zip" value="<?= (isset($_POST['zip'])) ? $_POST['zip'] : ''; ?>" placeholder="zip">
            </div>
        </div>

    </div>

    <div class="new_user_permissions">
        <?php
        //trim array values
        if (isset($_POST['permission'])) {
            $_POST['permission'] = array_map('trim', $_POST['permission']);
        }

        if (isset($permission_error))
            echo '<span class="text-error permissions">' . $permission_error . '</span>';
        foreach ($permissions as $permission) {
            ?>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input id="<?= $permission->get_permission() ?>" type="checkbox" value="<?= $permission->get_permission() ?>" name="permission[]"
                        <?php
                        if (isset($_POST['permission'])) {
                            if (in_array($permission->get_permission(), $_POST['permission'])) {
                                print 'checked';
                            }
                        }
                        ?>><!-- input close tag -->
                               <?= $permission->get_permission_name() ?>
                    </label>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div>
        <button type="submit" class="btn btn-primary pull-right submit submit-btn">Create User</button>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Creating User...">
        <button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
    </div>

</div>

<?= form_close() ?>

<script type="text/javascript">
    $('.submit-btn').click(function() {
        $('.error-message').remove()
        $('.submit-btn').addClass('disabled');
        $('.submit-btn').text('Creating User...');
        $('.preloader').show();
    });

    $('.reset-btn').click(function() {
        $('input:checkbox').removeAttr('checked');
    });

    $("#admin").change(function() {
        if (this.checked) {
            $(this).closest('body').find(':checkbox').prop('checked', this.checked);
        }
        else {
            $('input:checkbox').removeAttr('checked');
        }
    });

</script>