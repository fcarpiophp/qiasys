<style type="text/css">

</style>


<div style="border: 1px solid #CCC; margin: 10px; padding: 10px; background-color: #DFF0D8; display: none;" class="selected_result success">
    <span class="text-success">Selected orders were successfully processed.</span>
</div>

<div style="border: 1px solid #CCC; margin: 10px; padding: 10px; background-color: #F2DEDE; display: none;" class="selected_result error">
    <span class="text-error">There was a problem processing the selected orders, please try again.</span>
</div>

<br>

<table class="table table-hover order_report_table">
    <tr>
        <th class="text-info">Part#</th>
        <th class="text-info">Description</th>
        <th class="text-info">Supplier</th>
        <th class="text-info">Item Cost</th>
        <th class="text-info"><?=$sales[0]->get_last_month_last_year()?> Qty</th>
        <th class="text-info"><?=$sales[0]->get_last_month_last_year()?> Price</th>
        <th class="text-info"><?=$sales[0]->get_last_month_last_year()?> Total</th>
        <th class="text-info"><?=$sales[0]->get_last_month_last_year()?> Profit</th>
        <th class="text-info"><?=$sales[0]->get_two_months_ago()?> Qty</th>
        <th class="text-info"><?=$sales[0]->get_two_months_ago()?> Price</th>
        <th class="text-info"><?=$sales[0]->get_two_months_ago()?> Total</th>
        <th class="text-info"><?=$sales[0]->get_two_months_ago()?> Profit</th>
        <th class="text-info"><?=$sales[0]->get_last_month()?> Qty</th>
        <th class="text-info"><?=$sales[0]->get_last_month()?> Price</th>
        <th class="text-info"><?=$sales[0]->get_last_month()?> Total</th>
        <th class="text-info"><?=$sales[0]->get_last_month()?> Profit</th>
        <th class="text-info"></th>
    </tr>
    <?php
    foreach ($sales as $sale) { ?>	
    <tr>
        <td class="order_report_part_number"><?=$sale->get_item_part_number()?></td>
        <td class="item_description"><?=$sale->get_item_description()?></td>
        <td class=""><?=$sale->get_supplier_name()?></td>
        <td class=""><?=number_format($sale->get_item_cost(), 2, '.', ',')?></td>
        <td class="">
            <?=
                ($sale->get_qty_sold_last_year() == null) ? 0: $sale->get_qty_sold_last_year();
            ?>
        </td>
        <td class=""><?=number_format($sale->get_price_sold_last_year(), 2, '.', ',')?></td>
        <td class=""><?=number_format($sale->get_total_sales_last_year(), 2, '.', ',')?></td>
        <?php
            $last_year_profit = ($sale->get_price_sold_last_year() - $sale->get_item_cost()) * $sale->get_qty_sold_last_year();
        ?>
        <td class=""><?=number_format($last_year_profit, 2, '.', ',')?></td>
        <td class="">
            <?=
                ($sale->get_qty_sold_two_months_ago() == null) ? 0: $sale->get_qty_sold_two_months_ago();
            ?></td>
        <td class=""><?=number_format($sale->get_price_sold_two_months_ago(), 2, '.', ',')?></td>
        <td class=""><?=number_format($sale->get_total_sales_two_months_ago(), 2, '.', ',')?></td>
        <?php
            $two_months_ago_profit = ($sale->get_price_sold_two_months_ago() - $sale->get_item_cost()) * $sale->get_qty_sold_two_months_ago();
        ?>
        <td class=""><?=number_format($two_months_ago_profit, 2, '.', ',')?></td>
        <td class=""><?=$sale->get_qty_sold_last_month()?></td>
        <td class=""><?=number_format($sale->get_price_sold_last_month(), 2, '.', ',')?></td>
        <td class=""><?=number_format($sale->get_total_sales_last_month(), 2, '.', ',')?></td>
        <?php
            $last_month_profit = ($sale->get_price_sold_last_month() - $sale->get_item_cost()) * $sale->get_qty_sold_last_month();
        ?>
        <td class=""><?=number_format($last_month_profit, 2, '.', ',')?></td>
        <td class="">
            <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getPurchase() || 
                $permission->getInventory() || $permission->getReport()) { ?>
            <div class="btn-group pull-right">
                <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-position">
                    <?php if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory()) { ?>
                    <li>
                        <a class="edit_details" href="#">Edit Item Details</a>
                    </li>
                    <?php } 

                    if($permission->getIronMan() || $permission->getAdmin() || $permission->getInventory() || 
                        $permission->getPurchase()) {
                    ?>
                    <li>
                        <a class="view_details" href="#">View Item Details</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </td>
    </tr>
<?php
}
?>
</table>


<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.edit_details').click(function() {
	    var part_number = $.trim($(this).closest('tr').find('.order_report_part_number').html());
	    var href = $('.base_url').val() + 'inventory/edit_item_details/' + part_number;

	    if (part_number) {
		window.location = href;
	    }
	});
        
        $('.view_details').click(function() {
	    var part_number = $.trim($(this).closest('tr').find('.order_report_part_number').html());
	    var href = $('.base_url').val() + 'inventory/item_details/' + part_number;

	    if (part_number) {
		window.location = href;
	    }
	});
    });
</script>