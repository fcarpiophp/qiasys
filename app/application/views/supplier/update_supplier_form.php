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

    .supplier_info_1,
    .supplier_info_2 {
        float: left;
    }

    div.new_supplier {
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
if (isset($message)) {
    print $message; //success or error message after adding supplier
}
?>

<?= form_open('supplier/validate_update_supplier', $attributes) ?>

<div class="new_supplier">

    <div class="supplier_info_1">

        <div class="control-group">
            <label class="control-label" for="supplier_name">Supplier Name:</label>
            <div class="controls">
                <input type="text" id="supplier_name" name="supplier_name" value="<?= (isset($_POST['supplier_name'])) ? $_POST['supplier_name'] : ''; ?>" placeholder="(autocomplete)">
                <?php if (isset($supplier_name_error)) echo '<br><span class="text-error">' . $supplier_name_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_add_1">Supplier Address:</label>
            <div class="controls">
                <input type="text" id="supplier_add_1" name="supplier_add_1" value="<?= (isset($_POST['supplier_add_1'])) ? $_POST['supplier_add_1'] : ''; ?>" placeholder="Supplier Address">
                <?php if (isset($supplier_add_1_error)) echo '<br><span class="text-error">' . $supplier_add_1_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_add_2">Supplier Address Cont'd:</label>
            <div class="controls">
                <input type="text" id="supplier_add_2" name="supplier_add_2" value="<?= (isset($_POST['supplier_add_2'])) ? $_POST['supplier_add_2'] : ''; ?>" placeholder="Supplier Address Cont'd">
                <?php if (isset($supplier_add_2_error)) echo '<br><span class="text-error">' . $supplier_add_2_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_city">Supplier City:</label>
            <div class="controls">
                <input type="text" id="supplier_city" name="supplier_city" value="<?= (isset($_POST['supplier_city'])) ? $_POST['supplier_city'] : ''; ?>" placeholder="Supplier City">
                <?php if (isset($supplier_city_error)) echo '<br><span class="text-error">' . $supplier_city_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_state">Supplier State:</label>
            <div class="controls">
                <input type="text" id="supplier_state" name="supplier_state" value="<?= (isset($_POST['supplier_state'])) ? $_POST['supplier_state'] : ''; ?>" placeholder="Supplier State">
                <?php if (isset($supplier_state_error)) echo '<br><span class="text-error">' . $supplier_state_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_zip">Supplier Zip:</label>
            <div class="controls">
                <input type="text" id="supplier_zip" name="supplier_zip" value="<?= (isset($_POST['supplier_zip'])) ? $_POST['supplier_zip'] : ''; ?>" placeholder="Supplier Zip">
                <?php if (isset($supplier_zip_error)) echo '<br><span class="text-error">' . $supplier_zip_error . '</span>'; ?>
            </div>
        </div>

        <?php
        if (isset($_POST['supplier_active'])) {
            if ($_POST['supplier_active'] == 1) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
        } else {
            $checked = '';
        }
        ?>

        <div class="control-group">
            <label class="control-label" for="supplier_active">Active:</label>
            <div class="controls">
                <input class="pull-left checked" type="checkbox" id="supplier_active" value="1" name="supplier_active" <?= $checked ?>>
            </div>
        </div>

    </div>

    <div class="supplier_info_2">

        <div class="control-group">
            <label class="control-label" for="supplier_phone">Supplier Phone:</label>
            <div class="controls">
                <input type="text" id="supplier_phone" name="supplier_phone" value="<?= (isset($_POST['supplier_phone'])) ? $_POST['supplier_phone'] : ''; ?>" placeholder="Supplier Phone">
<?php if (isset($supplier_phone_error)) echo '<br><span class="text-error">' . $supplier_phone_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_fax">Supplier Fax:</label>
            <div class="controls">
                <input type="text" id="supplier_fax" name="supplier_fax" value="<?= (isset($_POST['supplier_fax'])) ? $_POST['supplier_fax'] : ''; ?>" placeholder="Supplier Fax">
<?php if (isset($supplier_fax_error)) echo '<br><span class="text-error">' . $supplier_fax_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_email">Supplier Email:</label>
            <div class="controls">
                <input type="text" id="supplier_email" name="supplier_email" value="<?= (isset($_POST['supplier_email'])) ? $_POST['supplier_email'] : ''; ?>" placeholder="Supplier Email">
<?php if (isset($supplier_email_error)) echo '<br><span class="text-error">' . $supplier_email_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_rep_name">Sales Rep. Name:</label>
            <div class="controls">
                <input type="text" id="supplier_rep_name" name="supplier_rep_name" value="<?= (isset($_POST['supplier_rep_name'])) ? $_POST['supplier_rep_name'] : ''; ?>" placeholder="Sales Rep. Name">
<?php if (isset($supplier_rep_name_error)) echo '<br><span class="text-error">' . $supplier_rep_name_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_rep_phone">Sales Rep. Phone:</label>
            <div class="controls">
                <input type="text" id="supplier_rep_phone" name="supplier_rep_phone" value="<?= (isset($_POST['supplier_rep_phone'])) ? $_POST['supplier_rep_phone'] : ''; ?>" placeholder="Sales Rep. Phone">
<?php if (isset($supplier_rep_phone_error)) echo '<br><span class="text-error">' . $supplier_rep_phone_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_rep_fax">Sales Rep. Fax:</label>
            <div class="controls">
                <input type="text" id="supplier_rep_fax" name="supplier_rep_fax" value="<?= (isset($_POST['supplier_rep_fax'])) ? $_POST['supplier_rep_fax'] : ''; ?>" placeholder="Sales Rep. Fax">
<?php if (isset($supplier_rep_fax_error)) echo '<br><span class="text-error">' . $supplier_rep_fax_error . '</span>'; ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="supplier_rep_email">Sales Rep. Email:</label>
            <div class="controls">
                <input type="text" id="supplier_rep_email" name="supplier_rep_email" value="<?= (isset($_POST['supplier_rep_email'])) ? $_POST['supplier_rep_email'] : ''; ?>" placeholder="Sales Rep. Email">
<?php if (isset($supplier_rep_email_error)) echo '<br><span class="text-error">' . $supplier_rep_email_error . '</span>'; ?>
            </div>
        </div>

    </div>

    <div>
        <button type="submit" class="btn btn-primary pull-right submit submit-btn">Update Supplier</button>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Updating Supplier...">
        <button style="margin-right: 20px;" class="btn pull-right reset-btn" type="reset" value="Reset">Clear Form</button>
    </div>

</div>

<input type="hidden" name="supplier_id" id="supplier_id" value="">
<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="text/javascript">

    $(function() {

        var suppliers = <?= $suppliers ?>;

        $('#supplier_name').autocomplete({
            source: suppliers,
            maxLength: 3,
            select: function(event, ui) {

                var supplier_name = ui.item.value;
                var post_data = {
                    'supplier_name': supplier_name
                };

                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: post_data,
                    url: $('.base_url').val() + 'supplier/get_supplier_data',
                    beforeSend: function() {
                        $('.preloader').show();
                    },
                    complete: function() {
                        $('.preloader').hide();
                    },
                    success: function(data) {

                        $('#supplier_id').val(data.supplier_id);
                        $('#supplier_name').val(data.supplier_name);
                        $('#supplier_add_1').val(data.supplier_add_1);
                        $('#supplier_add_2').val(data.supplier_add_2);
                        $('#supplier_city').val(data.supplier_city);
                        $('#supplier_state').val(data.supplier_state);
                        $('#supplier_zip').val(data.supplier_zip);
                        $('#supplier_phone').val(data.supplier_phone);
                        $('#supplier_fax').val(data.supplier_fax);
                        $('#supplier_email').val(data.supplier_email);
                        $('#supplier_rep_name').val(data.supplier_rep);
                        $('#supplier_rep_email').val(data.supplier_rep_email);
                        $('#supplier_rep_phone').val(data.supplier_rep_phone);
                        $('#supplier_rep_fax').val(data.supplier_rep_fax);
                        $('#supplier_name').val(data.supplier_name);

                        if (data.supplier_active == 1) {
                            $('#supplier_active').attr('checked', true);
                        }
                        else {
                            $('#supplier_active').attr('checked', false);
                        }

                    },
                    error: function() {
                        alert('Autocomplete from supplier name failed, please type the supplier information.');
                    }
                });
            }
        });
    });

    $('.submit-btn').click(function() {
        $('.error-message').remove()
        $('.submit-btn').addClass('disabled');
        $('.submit-btn').text('Updating Supplier...');
        $('.preloader').show();
    });

    $('.reset-btn').click(function() {
        $('input:checkbox').removeAttr('checked');
    });

</script>
