<style type="text/css">

    .row {
        margin-right: 10px;
    }
    .input-qty {
        width: 50px;
    }

    .price {
        width: 50px;
    }

    .desc_content {
        padding-bottom: 15px;
    }

    a.process_order {
        position: relative;
        right: 5px;
    }

    a.delete_proposal_btn {
        position: relative;
        right: 15px;
    }

    td.summary_ext_total {
        text-align: right;
    }

    .icon-info-sign {
        margin-left: 3px;
    }

</style>
<a href="<?= base_url() ?>index.php/proposal/customer_information" class="btn btn-success pull-right process_order" type="submit">Checkout</a>
<a class="btn btn-danger pull-right delete_proposal_btn" type="submit">Empty Cart</a>
<br>
<br>

<table class="table table-hover">
    <thead>
        <tr>
            <td class="text-info title_proposal_line_num"><strong>#</strong></td>
            <td class="text-info title_proposal_part_num"><strong>Part</strong></td>
            <td class="text-info title_proposal_description"><strong>Description</strong></td>
            <td class="text-info title_proposal_quantity"><strong>Qty</strong></td>
            <td class="text-info title_proposal_uom"><strong>UOM</strong></td>
            <td class="text-info title_proposal_supplier"><strong>Supplier</strong></td>
            <td class="text-info title_proposal_manufacturer"><strong>Manufacturer</strong></td>
            <td class="text-info title_proposal_in_stock"><strong>In Stock</strong></td>
            <td class="text-info title_proposal_on_order"><strong>On Order</strong></td>
            <td class="text-info title_proposal_site"><strong>Site</strong></td>
            <td class="text-info title_proposal_location"><strong>Location</strong></td>
            <td class="text-info title_proposal_msrp"><strong>MSRP</strong></td>
            <td class="text-info title_proposal_cost"><strong>Cost</strong></td>
            <td class="text-info title_proposal_price"><strong>Price</strong></td>
            <td class="text-info title_proposal_ext_total"><strong>Ext. Total</strong></td>
            <td class="text-info title_proposal_actions"></td>
        </tr>
    </thead>
    <?php
    $i = 0;
    $total = 0;
    $tax = 6.5; // need to get from DB
    $fees = 0;
    ?>
    <tbody>
    <?php
    foreach ($proposal_lines as $line) {
        ?>
            <tr>
                <td class="proposal_line_num"><?= ++$i ?></td>
                <td class="proposal_part_num"><div class="proposal_part_num pull-left"><?= $line->getItemPartNumber() ?></div>
    <?php
    if ($line->getItemQty() > $line->getItemStock()) {
        print '
            <div class="part_status pull-right">
                <img src="' . base_url() . 'application/images/FatCow_Icons16x16/bullet_red.png"
                    id="pop"
                    data-toggle="popover"
                    data-content="Insufficient Inventory In Stock"
                    title="Alert!">
            </div>';
    }
    ?>
                </td>
                <td class="proposal_description"><div class="proposal_description"><?= $line->getItemDescription() ?></div></td>
                <td class="proposal_quantity"><?= $line->getItemQty() ?></td>
                <td class="proposal_uom"><?= $line->getItemUom() ?></td>
                <td class="proposal_supplier"><?= $line->getItemSupplierName() ?></td>
                <td class="proposal_manufacturer"><?= $line->getItemManufacturerName() ?></td>
                <td class="proposal_in_stock <?php if ($line->getItemStock() < 0) print 'text-error'; ?>"><?= $line->getItemStock() ?></td>
                <td class="proposal_on_order"><?= $line->getItemOnOrder() ?></td>
                <td class="proposal_site"><?= $line->getItemSite() ?></td>
                <td class="proposal_location"><?= $line->getItemLocation() ?></td>
                <td class="proposal_msrp"><?= $line->getItemMsrp() ?></td>
                <td class="proposal_cost"><?= $line->getItemCost() ?></td>
                <td class="proposal_price"><?= $line->getItemPrice() ?></td>
                <td class="proposal_ext_total"><?= $line->getItemTotal() ?></td>
                <td class="proposal_actions">
                    <div class="btn-group pull-right">
                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-chevron-down"></i></a>
                        <ul class="dropdown-menu dropdown-position">
                            <li>
                                <a class="edit" href="#">Edit</a>
                            </li>
                            <li>
                                <a class="delete" href="#">Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>


    <?php
    $total = $total + $line->getItemTotal();
}
?>
        <tr class="total summary">
            <td class="summary_line_num"></td>
            <td class="summary_part_num"></td>
            <td class="summary_description"></td>
            <td class="summary_quantity"></td>
            <td class="summary_uom"></td>
            <td class="summary_supplier"></td>
            <td class="summary_manufacturer"></td>
            <td class="summary_in_stock"></td>
            <td class="summary_on_order"></td>
            <td class="summary_site"></td>
            <td class="summary_location"></td>
            <td class="summary_cost"></td>
            <td colspan="2" class="summary_price">Total</td>
            <td class="summary_ext_total">$<?= number_format($total, 2, '.', '') ?></td>
            <td class="proposal_actions"></td>
            <td style="display:none;" class="padding"></td>
        </tr>

        <tr class="fees summary">
            <td class="summary_line_num"></td>
            <td class="summary_part_num"></td>
            <td class="summary_description"></td>
            <td class="summary_quantity"></td>
            <td class="summary_uom"></td>
            <td class="summary_supplier"></td>
            <td class="summary_manufacturer"></td>
            <td class="summary_in_stock"></td>
            <td class="summary_on_order"></td>
            <td class="summary_site"></td>
            <td class="summary_location"></td>
            <td class="summary_cost"></td>
            <td colspan="2" class="summary_price">Fees</td>
            <td class="summary_ext_total">$<?= number_format($fees, 2, '.', '') ?></td>
            <td class="proposal_actions"></td>
            <td style="display:none;" class="padding"></td>
        </tr>

<?php
$total_tax = number_format((($total + $fees) * $tax / 100), 2, '.', ',');
?>

        <tr class="taxes summary">
            <td class="summary_line_num"></td>
            <td class="summary_part_num"></td>
            <td class="summary_description"></td>
            <td class="summary_quantity"></td>
            <td class="summary_uom"></td>
            <td class="summary_supplier"></td>
            <td class="summary_manufacturer"></td>
            <td class="summary_in_stock"></td>
            <td class="summary_on_order"></td>
            <td class="summary_site"></td>
            <td class="summary_location"></td>
            <td class="summary_cost"></td>
            <td colspan="2" class="summary_price">Taxes</td>
            <td class="summary_ext_total">$<?= $total_tax ?></td>
            <td class="proposal_actions"></td>
            <td style="display:none;" class="padding"></td>
        </tr>

        <tr class="grand_total summary">
            <td class="summary_line_num"></td>
            <td class="summary_part_num"></td>
            <td class="summary_description"></td>
            <td class="summary_quantity"></td>
            <td class="summary_uom"></td>
            <td class="summary_supplier"></td>
            <td class="summary_manufacturer"></td>
            <td class="summary_in_stock"></td>
            <td class="summary_on_order"></td>
            <td class="summary_site"></td>
            <td class="summary_location"></td>
            <td class="summary_cost"></td>
            <td colspan="2" class="summary_price"><strong>Grand Total</strong></td>
            <td class="summary_ext_total"><strong>$<?= number_format($total + $total_tax + $fees, 2, '.', '') ?></strong></td>
            <td class="proposal_actions"></td>
            <td style="display:none;" class="padding"></td>
        </tr>

    </tbody>
</table>
<!-- SHOW THE TALLY -->

<!-- edit modal start -->
<?php
$attributes = array('class' => 'form-horizontal');
?>

<?= form_open('proposal/edit_proposal_item', $attributes) ?>
<div id="edit_cart" class="modal hide fade in" style="display: none;">

    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h4 class="text-left title"></h4>
    </div>

    <br>
    <span style="margin-left: 25px; margin-right: 25px;" class="pull-left"><b>Description:</b></span>
    <br>
    <span style="text-align: left; margin-left: 25px; margin-right: 25px;" class="pull-left description desc_content"></span>
    <br><br>


    <div class="control-group">
        <label class="control-label" for="inputQuantity">Quantity:</label>
        <div class="controls">
            <div class="input-append" style="white-space: normal !important">
                <input name="item_quantity" class="item-qty" type="text" value="?">
                <span class="add-on uom"></span>
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPrice">Price:</label>
        <div class="controls">
            <div class="input-prepend" style="white-space: normal !important">
                <span class="add-on">$</span>
                <input name="item_price" class="item-price" type="text" value="?">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right submit">Save</button>
        <a href="#" class="btn pull-left" data-dismiss="modal">Close</a>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
    </div>
</div>
<input name="item_part" class="pull-right item-part" type="hidden" value="?">
<?= form_close() ?>

<!-- edit modal end -->

<!-- delete modal start -->
<?= form_open('proposal/delete_item_from_proposal') ?>
<div id="delete_cart" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h4 class="text-left title"></h4>
    </div>
    <div class="text-left modal-body span6">
        <strong>Description</strong><br>

        <div class="pull-left description desc_content"></div>
        <input class="item-part" type="hidden" name="item_part" value="">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger pull-right submit">Delete</button>
        <a href="#" class="btn pull-left" data-dismiss="modal">Close</a>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
    </div>
</div>
<?= form_close() ?>
<!-- delete modal end -->

<!-- delete proposal modal start -->
<?= form_open('proposal/delete_proposal') ?>
<div id="delete_proposal" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h4 class="text-left title">Empty Cart?</h4>
    </div>
    <div class="text-left modal-body">
        <p>Once the cart is emptied this cannot be undone.</p><br>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger pull-right submit">Delete</button>
        <a href="#" class="btn pull-left" data-dismiss="modal">Cancel</a>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
    </div>
</div>
<?= form_close() ?>
<!-- delete proposal modal end -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.edit').click(function() {//edit class comes from display_tabular_data.php
            $('.title').empty();
            $('.description').empty();
            $('.item-qty').empty();
            $('.uom').empty();
            $('.item-price').empty();

            $('.title').append('Edit Part No. ' + $(this).closest('tr').find('div.proposal_part_num').html());
            $('.description').append($(this).closest('tr').find('.proposal_description').html());
            $('.item-qty').attr('value', $(this).closest('tr').find('.proposal_quantity').html());
            $('.item-part').attr('value', $(this).closest('tr').find('div.proposal_part_num').html());
            $('.uom').append($(this).closest('tr').find('.proposal_uom').html());
            $('.item-price').attr('value', $(this).closest('tr').find('.proposal_price').html());


            $('#edit_cart').modal('show');
        });

        $('.delete').click(function() {//delete class comes from display_tabular_data.php
            $('.title').empty();
            $('.description').empty();
            $('.item-price').empty();
            $('.item_quantity').empty();
            $('.item-price').empty();

            $('.title').append('Delete Part No. ' + $(this).closest('tr').find('div.proposal_part_num').html() + '?');
            $('.description').append($(this).closest('tr').find('.proposal_description').html());
            $('.item-part').attr('value', $(this).closest('tr').find('div.proposal_part_num').html());
            $('.item_quantity').attr('value', $(this).closest('tr').find('.proposal_quantity').html());
            $('.item_price').attr('value', $(this).closest('tr').find('.proposal_price').html());
            $('#delete_cart').modal('show');

        });

        $('.delete_proposal_btn').click(function() {
            $('#delete_proposal').modal('show');
        });

        $('[data-toggle="popover"]').popover({
            trigger: 'click',
            placement: 'right'
        });

        $('.submit-btn').click(function() {
            $('.error-message').remove()
            $('.submit-btn').addClass('disabled');
            $('.submit-btn').text('Processing...');
            $('.preloader').show();
        });

    });
</script>
