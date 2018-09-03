<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<style type="text/css">

    .general_item_info,
    .site_specific_info, 
    .control-group {
        float: left;
    }

    div.new_item {
        //display: inline-block;
        margin: 0 auto;
        width: 90%;
    }

    .form_buttons {
        width: 100%;
        float: right;
    }

    legend + .control-group {
        margin-top: 0px;
    }

    .wrapper {
        text-align: left;
    }
    
    .odd {
        background-color: #EEE;
    }

</style>

<?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'update_form');
?>

<br>

<!-- FORM START -->
<div class="row-fluid edit_details">
    <?= form_open('item/validate_update_item', $attributes); ?>
    
    <div class="new_item">

        <div class="general_item_info">
            
            <p class='text-info'>General Information</p>
            <div class="control-group">
                <label class="control-label" for="part_number">Part No.:</label>
                <div class="controls">
                    <input type="text" id="part_number" name="part_number" value="<?= (isset($_POST['part_number'])) ? $_POST['part_number'] : ''; ?>" placeholder="(autocomplete)">
                    <input type="hidden"  name="part_id" id="part_id">
                    <?php if (isset($part_number_error)) echo '<br><span class="text-error">' . $part_number_error . '</span>'; ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="item_description">Description:</label>
                <div class="controls">
                    <input type="text" id="item_description" name="item_description" value="<?= (isset($_POST['item_description'])) ? $_POST['item_description'] : ''; ?>" placeholder="Description">
                    <?php if (isset($item_description_error)) echo '<br><span class="text-error">' . $item_description_error . '</span>'; ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="supplier_name">Supplier:</label>
                <div class="controls">
                    <select id="supplier_name" name="supplier_name" class="pull-right">
                        <?php if (empty($_POST['supplier_name']) || $_POST['supplier_name'] == "not selected") { ?>
                            <option value="not selected" selected>Select Supplier</option>
                            <?php
                        }
                        foreach ($suppliers as $supplier) {
                            print '<option value="' . $supplier->getId() . '"';

                            if (isset($_SESSION['new_item_supp_id'])) {
                                if ($_SESSION['new_item_supp_id'] == $supplier->getId()) {
                                    print ' selected';
                                }
                            }
                            print'>' . $supplier->getSupplierName() . '</option>';
                        }
                        ?>
                    </select>
                    <input type="hidden"  name="original_supplier_id" id="original_supplier_id">
                    <?php if (isset($supplier_name_error)) echo '<br><span class="text-error">' . $supplier_name_error . '</span>'; ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="manufacturer_name">Manufacturer:</label>
                <div class="controls">

                    <select id="manufacturer_name" name="manufacturer_name" class="pull-right">
                        <?php if (empty($_POST['manufacturer_name']) || $_POST['manufacturer_name'] == "not selected") { ?>
                            <option value="not selected" selected>Select Manufacturer</option>
                            <?php
                        }
                        foreach ($manufacturers as $manufacturer) {
                            print '<option value="' . $manufacturer->getManufacturer_id() . '"';

                            if (isset($_SESSION['new_item_manuf_id'])) {
                                if ($manufacturer->getManufacturer_id() == $_SESSION['new_item_manuf_id']) {
                                    print ' selected';
                                }
                            }

                            print'>' . $manufacturer->getManufacturer_name() . '</option>';
                        }
                        ?>
                    </select>
                    <?php if (isset($manufacturer_name_error)) echo '<br><span class="text-error">' . $manufacturer_name_error . '</span>'; ?>
                </div>
            </div>
        </div>

        <div class="site_specific_info">
            <p class='text-info'>Site Specific Information</p>

<?php 
        if(isset($all_empty) && $all_empty) echo '<p class="text-error">At least one item must be filled in.</p>'; 

        $i = 0;

        foreach ($sites as $site) { 
            if ($i == 0) {
                $class = 'first';
            } else {
                $class = 'rest';
            }
            
            if($i % 2 == 0) {
                $table_class = 'odd';
            } else {
                $table_class = 'even';
            }
            
?>  
            <table class="<?=$table_class.' '.$site['site_name']?>" style="border: 1px solid #CCCCCC; padding:10px; margin-bottom: 15px"><tr><td>
                
                <input type="hidden" name="site_id[]" value="<?=$site['site_id']?>">
                <input type="hidden" name="site_name[]" value="<?=$site['site_name']?>">
                <div class="control-group">
                    <label class="control-label" for="site">Site:</label>
                    <div class="controls">
                        <input type="text" id="site" name="site[]" value="<?=$site['site_name']?>" placeholder="Site" disabled>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_uom">Unit of Measure:</label>
                    <div class="controls">
                        <input class="item_uom-<?=$class?>" type="text" id="item_uom" name="item_uom[]" value="<?= (isset($_POST['item_uom'][$i])) ? $_POST['item_uom'][$i] : ''; ?>" placeholder="Unit of Measure">
                        <?php if (isset($item_uom_error[$i])) echo '<br><span class="text-error">' . $item_uom_error[$i] . '</span>'; ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="item_stock">In Stock:</label>
                    <div class="controls">
                        <input class="item_stock-<?=$class?>" type="text" id="item_stock" name="item_stock[]" value="0">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_min">Item Min:</label>
                    <div class="controls">
                        <input  class="item_min-<?=$class?>" type="text" id="item_min" name="item_min[]" value="<?= (isset($_POST['item_min'][$i])) ? $_POST['item_min'][$i] : ''; ?>" placeholder="Item Min">
                        <?php if (isset($item_min_error[$i])) echo '<br><span class="text-error">' . $item_min_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_max">Item Max:</label>
                    <div class="controls">
                        <input  class="item_max-<?=$class?>" type="text" id="item_max" name="item_max[]" value="<?= (isset($_POST['item_max'][$i])) ? $_POST['item_max'][$i] : ''; ?>" placeholder="Item Max">
                        <?php if (isset($item_max_error[$i])) echo '<br><span class="text-error">' . $item_max_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_min_order">Item Min Order:</label>
                    <div class="controls">
                        <input  class="item_min_order-<?=$class?>" type="text" id="item_min_order" name="item_min_order[]" value="<?= (isset($_POST['item_min_order'][$i])) ? $_POST['item_min_order'][$i] : ''; ?>" placeholder="Item Min Order">
                        <?php if (isset($item_min_order_error[$i])) echo '<br><span class="text-error">' . $item_min_order_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_location">Item Location:</label>
                    <div class="controls">
                        <input  class="item_location-<?=$class?>" type="text" id="item_location" name="item_location[]" value="<?= (isset($_POST['item_location'][$i])) ? $_POST['item_location'][$i] : ''; ?>" placeholder="Item Location">
                        <?php if (isset($item_location_error[$i])) echo '<br><span class="text-error">' . $item_location_error[$i] . '</span>'; ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="item_cost">Item Cost:</label>
                    <div class="controls">
                        <input  class="item_cost-<?=$class?>" type="text" id="item_cost" name="item_cost[]" value="<?= (isset($_POST['item_cost'][$i])) ? $_POST['item_cost'][$i] : ''; ?>" placeholder="Item Cost">
                        <?php if (isset($item_cost_error[$i])) echo '<br><span class="text-error">' . $item_cost_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_msrp">Item MSRP:</label>
                    <div class="controls">
                        <input  class="item_msrp-<?=$class?>" type="text" id="item_msrp" name="item_msrp[]" value="<?= (isset($_POST['item_msrp'][$i])) ? $_POST['item_msrp'][$i] : ''; ?>" placeholder="Item MSRP">
                        <?php if (isset($item_msrp_error[$i])) echo '<br><span class="text-error">' . $item_msrp_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="item_price">Sell Price:</label>
                    <div class="controls">
                        <input  class="item_price-<?=$class?>" type="text" id="item_price" name="item_price[]" value="<?= (isset($_POST['item_price'][$i])) ? $_POST['item_price'][$i] : ''; ?>" placeholder="Item Price">
                        <?php if (isset($item_price_error[$i])) echo '<br><span class="text-error">' . $item_price_error[$i] . '</span>'; ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="is_active">Active:</label>
                    <div class="controls">
                        <input class="item_active active-<?=$i?>" name="is_active[]" id="item_active" type="checkbox"
                            <?=isset($checkbox) ? $checkbox : ''?>>
                        <input value="no" class="is_active_hidden-<?=$i?>" type="hidden" name="is_active_hidden[]" id="is_active_hidden">
                    </div>
                </div>
                
                </td></tr></table>
<?php 
            $i++;
        } 
?>
        </div>
        <div class="form_buttons">
            <button style="margin-left: 5px;" class="btn btn-primary pull-right submit submit-btn">Update Item</button>
            <img class="preloader pull-right" style="display: none; margin-right: 30px;"
                 src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Creating Item...">
            <button style="margin-right: 20px;" class="btn pull-left reset-btn" type="reset" value="Reset">Clear Form</button>
        </div>

    </div>
    <input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">
    <?= form_close() ?>

</div>
<!-- FORM END -->
<script type="text/javascript">

    $(function() {
        
        $('.item_active').change(function(){

            var thisClass = $(this).attr('class');
            var thisIndex = thisClass.split('-');
            
            if($(this).prop('checked')) {
                $('.is_active_hidden-' + thisIndex[1]).val('yes');
            } else {
                $('.is_active_hidden-' + thisIndex[1]).val('no');
            }
        });

        var part_numbers = <?= $part_numbers ?>;

        $('#part_number').autocomplete({
            source: part_numbers,
            maxLength: 3,
            select: function(event, ui) {

                var part_number = ui.item.value;
                var post_data = {
                    'part_number': part_number
                };

                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: post_data,
                    url: $('.base_url').val() + 'item/get_item_data',
                    beforeSend: function() {
                        $('.preloader').show();
                    },
                    complete: function() {
                        $('.preloader').hide();
                    },
                    success: function(data) {

                        var i = 0;
                        var part_number = $('#part_number').val();

                        // Delete previous data before re-populating form
                        $('#update_form')[0].reset();
                        $('input:checkbox').removeAttr('checked');
                        
                        // Re-populate form
                        $('#part_number').val(part_number);
                        $('#item_description').val(data.item_description[0]);
                        $('#supplier_name').val(data.item_supplier_id[0]);
                        $('#original_supplier_id').val(data.item_supplier_id[0]);
                        $('#manufacturer_name').val(data.item_manufacturer_id[0]);
                        $('#part_id').val(data.item_id[0]);

                        data.item_site_name.forEach(function(entry) {
                            
                            $('table.' + entry + ' #item_uom').val(data.item_uom[i]);
                            $('table.' + entry + ' #item_min').val(data.item_min[i]);
                            $('table.' + entry + ' #item_max').val(data.item_max[i]);
                            $('table.' + entry + ' #item_min_order').val(data.item_min_order[i]);
                            $('table.' + entry + ' #item_cost').val(data.item_cost[i]);
                            $('table.' + entry + ' #item_msrp').val(data.item_msrp[i]);
                            $('table.' + entry + ' #item_price').val(data.item_price[i]);
                            $('table.' + entry + ' #item_id').val(data.item_id[i]);

                            if (data.is_active[i] == 1) {
                                $('table.' + entry + ' #item_active').prop('checked', true);
                                $('table.' + entry + ' #is_active_hidden').val('yes');
                            }
                            else {
                                $('table.' + entry + ' #item_active').prop('checked', false);
                                $('table.' + entry + ' #is_active_hidden').val('no');
                            }
                            
                            i++;
                        });
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

    $(document).ready(function() {

        $('.add-supplier').click(function() {
            window.scrollTo(0, 0);
            $('.new_supplier').modal('show');
        });

        $('.add-manufacturer').click(function() {
            window.scrollTo(0, 0);
            $('.new_manufacturer').modal('show');
        });

        $('.cancel').click(function() {
            window.history.go(-1);
        });

        $('.submit').click(function() {
            $('.submit').addClass('disabled');
            $('.submit').text('Processing...');
            $('.preloader').show();
        });

    });

</script>

