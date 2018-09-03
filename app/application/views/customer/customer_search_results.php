<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 11/11/13
 * Time: 6:43 PM
 */
?>
<script type="text/css">



</script>

<table class="table table-hover">
    <tr>
	<th class="text-info">Sale ID</th>
	<th class="text-info">Customer Name</th>
	<th class="text-info">Customer Email</th>
	<th class="text-info">Customer Phone</th>
	<th class="text-info">Company ID</th>
	<th class="text-info">Customer ID</th>
	<th class="text-info">Sale Date</th>
	<th class="text-info">Sold By</th>
	<th class="text-info">Sale Total</th>
	<th class="text-info"></th>
    </tr>
    <?php
    foreach ($orders as $order) {
	?>
        <tr>
    	<td><?= $order->getSale_id_number() ?></td>
    	<td>
		<?php
		
		$lastName = $order->getLast_name();
		$firstName = $order->getFirst_name();
		
		if (!empty($lastName)) {
		    print $lastName;
		}

		if (!empty($lastName) && !empty($firstName)) {
		    print ', ';
		}

		if (!empty($firstName)) {
		    print $firstName;
		}
		?>
    	</td>
    	<td><?= $order->getSold_to_email() ?></td>
    	<td><?= preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $order->getSold_to_phone()) ?></td>
    	<td><?= $order->getSale_client_id() ?></td>
    	<td><?= $order->getSale_customer_id() ?></td>
    	<td><?= $order->getSale_date() ?></td>
    	<td><?= $order->getSold_by() ?></td>
    	<td>
    <?php
    $total = 0;

    foreach ($order->getLines() as $line) {
	$total = $total + ( $line->getQty_sold() * $line->getSell_price() );
    }

    print '$' . number_format($total, 2, '.', ',');
    ?>	    
    	</td>
    	<td>
    	    <form id="<?= $order->getSale_id_number() ?>" action="<?= base_url() . 'index.php/customer/view_details' ?>" method="post">
    		<div class="btn-group pull-right">
    		    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown">
    			<i class="icon-chevron-down"></i>
    		    </a>
    		    <input type="hidden" name="sale_id" value="<?= $order->getSale_id_number() ?>">
    		    <ul class="dropdown-menu dropdown-position">
    			<li>
    			    <a id="<?= $order->getSale_id_number() ?>" class="view-details">View Transaction Details</a>
    			</li>
    		    </ul>
    		</div>
    	    </form>
    	</td>
        </tr>
        <!--
        <tr>
    	<td class="no-top-border" colspan="9">
    <?php
    foreach ($order->getLines() as $line) {
	print '<span class="muted left20px">' . $line->getItem_part_number() . ' - ' . $line->getItem_description()
	    . ' (' . $line->getQty_sold() . ') ' . $line->getSell_price() . '</span><br>';
    }
    ?>
    	</td>
        </tr>
        -->
    <?php
}
?>
</table>

<script type="text/javascript">

    $(function() {

	$('.view-details').click(function() {
	    var formId = this.id;
	    $('#' + formId).submit();
	});
    });

</script>
