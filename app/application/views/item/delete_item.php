<style type="text/css">

    div.delete_item_div {
        width: 500px;
        margin: 0 auto;
        display: inline-block;
        padding: 20px;
        border: 1px solid #CCCCCC;
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
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_form');
?>

<br>
<div class="alert alert-danger">
    <i class="icon-fire"></i>
    <strong>Warning! </strong>Unchecking the item will make unsearchable for the specific site
</div>
<br>
<?php
if (isset($message)) {
    print $message; //success or error message after adding item
}

?>

<?= form_open('item/validate_delete_item', $attributes) ?>

<div class="delete_item_div">
    

    <div class="control-group">
        <label class="control-label" for="item_name">Part Number:</label>
        <div class="controls">
            <input type="text" id="item_name" name="part_number" value="<?= (isset($_POST['item_name'])) ? $_POST['item_name'] : ''; ?>" placeholder="(autocomplete)">
            <input type="hidden" name="part_id" id="part_id">
            <?php
            if (isset($item_name_error)) {
                echo '<br><span class="text-error">' . $item_name_error . '</span>';
            }
            ?>
        </div>
    </div>
    <?php
    
    foreach ($sites as $site) {
        ?>
        <div class="control-group">
            <label class="control-label" for="is_active"><?= $site['site_name'] ?></label>
            <div class="controls">
                <input class="<?= $site['site_name'] ?>" name="is_active[<?=$site['site_id']?>]" id="item_active" 
                       type="checkbox" value="<?= $site['site_id'] ?>" disabled="disabled">
                <input value="no" class="remove_value" type="hidden" name="is_active_hidden[<?=$site['site_id']?>]" id="<?=$site['site_id']?>">
            </div>
        </div>
        <?php
    }
    ?>
    <div>
        <button type="submit" class="btn btn-danger pull-right submit submit-btn">Delete Item</button>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Deleting Item...">
    </div>

</div>

<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">

<?= form_close() ?>

<script type="text/javascript">

    $(function() {

        var items = <?= $parts ?>;

        $('#item_name').autocomplete({
            source: items,
            maxLength: 3,
            select: function(event, ui) {

                var item = ui.item.value;
                var post_data = {
                    'part_number': item
                };
                
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: post_data,
                    url: $('.base_url').val() + 'item/get_sites',
                    beforeSend: function() {
                        $('.preloader').show();
                    },
                    complete: function() {
                        $('.preloader').hide();
                    },
                    success: function(data) {

                        // Delete previous data before re-populating form
                        $('input:checkbox').removeAttr('checked');
                        $('.remove_value').val('no');

                        data.forEach(function(entry) {
                            
                            $('.'+entry.site_name).prop('checked', true);
                            $('.'+entry.site_name).prop('disabled', false);
                            $('input#' + entry.site_id).val('yes');
                            $('input#part_id').val(entry.part_id);

                        });
                    },
                    error: function() {
                        alert('Autocomplete failed, please complete the part number information.');
                    }
                });
            }
        });
    });
    
    $('input:checkbox').click(function(){

        var id = $(this).closest('div').children('.remove_value').attr('id');
        
        if($(this).prop('checked')) {
            $('#'+id).val('yes');
        } else {
            $('#'+id).val('no');
        }
    });

    $('.submit-btn').click(function() {
        $('.submit-btn').addClass('disabled');
        $('.submit-btn').text('Deleting Item...');
        $('.preloader').show();
    });

</script>