<style type="text/css">

</style>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<br>
<table class="table table-hover">
    <tr>
        <th class="text-info">Part Number</th>
        <th class="text-info">Description</th>
        <th class="text-info">Supplier</th>
        <th class="text-info">Manufacturer</th>
        <th class="text-info">UOM</th>
        <th class="text-info">In Stock</th>
        <th class="text-info">On Order</th>
        <th class="text-info">Min</th>
        <th class="text-info">Max</th>
        <th class="text-info">Min Order</th>
        <th class="text-info">Site</th>
        <th class="text-info">Location</th>
        <th class="text-info">Cost</th>
        <th class="text-info">MSRP</th>
        <th class="text-info">Price</th>
        <th></th>
    </tr>
    <?php foreach ($items as $item) { ?>
        <tr>
            <td class="search_part_num" style="white-space: nowrap;"><div class="search_part_num" style="float:left;"><?= $item->get_item_part_number() ?></div>
                <div style="white-space: nowrap;" class="part_num_nowrap">
                <?php
                if ($item->get_item_stock() < $item->get_item_min()) {
                    print '
                        <div class="part_num_img_wrapper" style="float:right;">
                        <img
                        src="' . base_url() . 'application/images/FatCow_Icons16x16/bullet_red.png"
                        id="pop" data-toggle="popover" data-content="Low Inventory" title="Alert!">
                        </div>';
                }
                ?>
                </div>
    	    </td>
            <td class="description"><?= $item->get_item_description() ?></td>
            <td><?= $item->get_supplier_name() ?></td>
            <td><?= $item->get_manufacturer_name() ?></td>
            <td class="uom"><?= $item->get_item_uom() ?></td>
            <td><?= $item->get_item_stock() ?></td>
            <td><?= $item->get_item_on_order() ?></td>
            <td><?= $item->get_item_min() ?></td>
            <td><?= $item->get_item_max() ?></td>
            <td><?= $item->get_item_min_order() ?></td>
            <td><?= $item->get_item_site() ?></td>
            <td><?= $item->get_item_location() ?></td>
            <td><?= number_format($item->get_item_cost(), 2, '.', '') ?></td>
            <td><?= number_format($item->get_item_msrp(), 2, '.', '') ?></td>
            <td><?= number_format($item->get_item_price(), 2, '.', '') ?></td>
            <td class="search_actions">
                <div class="btn-group pull-right">
                    <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-chevron-down"></i></a>
                    <ul class="dropdown-menu dropdown-position">
                        <li>
                            <a id="<?= $item->get_item_part_number() ?>" class="edit_details" href="#">Edit Item Details</a>
                        </li>
                        <li>
                            <a id="<?= $item->get_item_part_number() ?>" class="view_details" href="#">View Item Details</a>
                        </li>
                        <li>
                            <a id="<?= $item->get_item_part_number() ?>" class="add_to_proposal" href="#">Add To Proposal</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>

<input type="hidden" class="base_url" value="<?= base_url() ?>">
<?php
    $qty = array(
        'name' => 'item_qty',
        'id' => 'item_qty',
        'class' => 'span1 pull-right',
        'value' => 1,
        'maxlength' => '5',
        'size' => '5'
    );
?>
<!-- modal start -->
<?= form_open('proposal/add_to_proposal') ?>
<input class="modal_hidden_part_number" type="hidden" name="item_part_number" value="">
<div id="add_to_cart" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h4 class="text-left modal_part_num"></h4>
    </div>
    <div class="text-left modal-body">
        <p><strong>Description</strong></p>

        <div class="pull-left modal_description"></div>

        <br><br>

        <div style="width: 80%; margin-left: 10%;">
            <div class="pull-left">Quantity: </div>
            <div style="white-space: nowrap; min-width: 90px;" class="input-append pull-right">
                <span class="add-on pull-right modal_uom"></span>
                <?= form_input($qty) ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right submit">Add to Proposal</button>
        <a href="#" class="btn pull-left" data-dismiss="modal">Close</a>
        <img class="preloader pull-right" style="display: none; margin-right: 30px;"
             src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
    </div>
</div>
<?= form_close() ?>
<!-- modal end -->

<script type="text/javascript">

    $(document).ready(function() {

        $('.edit_details').click(function() {
            var href = $('.base_url').val() + 'index.php/inventory/edit_item_details/' + 
                    $(this).attr('id');

            if (href) {
                window.location = href;
            }
        });

        $('.view_details').click(function() {
            var href = $('.base_url').val() + 'index.php/inventory/item_details/' + 
                    $(this).attr('id');

            if (href) {
                window.location = href;
            }
        });

        $('.add_to_proposal').click(function() {
            var part_num = $(this).attr('id');
            var description = $(this).closest('tr').find('.description').html();
            var uom = $(this).closest('tr').find('.uom').html();

            $('.modal_part_num').html('Add part no. ' + part_num + ' to cart');
            $('.modal_description').html(description);
            $('.modal_uom').html(uom);
            $('.modal_hidden_part_number').val(part_num);

            $('#add_to_cart').modal('show');
        });
        
        $('[data-toggle="popover"]').popover({
	    trigger: 'click',
	    'placement': 'right'
	});
    });
</script>