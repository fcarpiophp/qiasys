<?php
$image = base_url() . APPPATH . "images/logo/" . $this->session->userdata('user_client_id') . ".png";
?>
<style>
    .wrapper {
        width: 1000px !important;
        margin: 0 auto;
        display: table;
    }
</style>
<div class="proposal_confirmation_container">
    <div class="seller pull-left">
	<img class="confirmation_logo_image" src="<?= $image ?>">
	<address>
	    <span style="display: block;" class="pull-left"><h4 class="text-info">Seller</h4></span><br><br>
	    <span style="display: block;" class="pull-left"><strong><?= $header_details->getClient_name() ?></strong></span><br><br>
	    <span style="display: block;" class="pull-left"><?= $header_details->getClient_add_1() ?></span>
	    <?php
	    $tempVar = $header_details->getClient_add_2();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><?= ', ' . $tempVar ?></span><br>
		<?php
	    } else {
		?>
    	    <br>
		<?php
	    }
	    $tempVar = $header_details->getClient_city();

	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><?= $tempVar ?></span>
		<?php
	    }

	    $tempVar = $header_details->getClient_state();
	    $tempVar = trim($tempVar);

	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><?= ', ' . $tempVar ?></span>
		<?php
	    }

	    $tempVar = $header_details->getClient_zip();

	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left">&nbsp;<?= $tempVar ?></span>
		<?php
	    }
	    ?>
	    <br><br>
	    <?php
	    $tempVar = $header_details->getClient_phone();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><abbr title="Phone">P: </abbr>
		<?= preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $tempVar) ?>
    	    </span><br>
		<?php
	    }

	    $tempVar = $header_details->getClient_fax();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><abbr title="Fax">F: </abbr>
		<?= preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $tempVar) ?>
    	    </span><br>
		<?php
	    }

	    $tempVar = $header_details->getClient_email();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><abbr title="Email">E: </abbr>
    		<a href="mailto:#"><?= $tempVar ?></a></span><br>
    <?php
}
?>
	</address>
    </div>
    <div class="buyer pull-left">
	<address>
	    <span  style="display: block;" class="pull-left"><h4 class="text-info">Buyer</h4></span><br><br>
	    <span  style="display: block;" class="pull-left"><strong>
	    <?= $header_details->getFirst_name() . ' ' . $header_details->getLast_name() ?>
		</strong></span><br><br>
	    <span  style="display: block;" class="pull-left"><?= $header_details->getAddress1() ?></span>
	    <?php
	    $tempVar = $header_details->getAddress2();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><?= ', ' . $tempVar ?></span><br>
		<?php
	    } else {
		?>
    	    <br>
		<?php
	    }

	    $tempVar = $header_details->getCity();

	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><?= $tempVar ?></span>
	    <?php
	    }

	    $tempVar = $header_details->getState();
	    ?>

	    <?php if (!empty($tempVar)) { ?>
    	    <span class="pull-left"><?= ', ' . $tempVar ?></span>
	    <?php
	    }

	    $tempVar = $header_details->getZip();
	    ?>

	    <?php if (!empty($tempVar)) { ?>
    	    <span class="pull-left">&nbsp;<?= $tempVar ?></span>
		<?php
	    }
	    ?>
	    <br><br>
		<?php
		$tempVar = $header_details->getPhone();
		if (!empty($tempVar)) {
		    ?>
    	    <span class="pull-left"><abbr title="Phone">P: </abbr>
		<?php
		echo "(" . substr($tempVar, 0, 3) . ") " . substr($tempVar, 3, 3) . "-" . substr($tempVar, 6);
		?>
    	    </span><br>
		<?php
	    }

	    $tempVar = $header_details->getEmail();
	    if (!empty($tempVar)) {
		?>
    	    <span class="pull-left"><abbr title="Email">E: </abbr>
    		<a href="mailto:#"><?= $tempVar ?></a></span><br>
    <?php
}
?>
	</address>
    </div>
    <div class="pull-left sale_id">
        <table class='sale_data'>
            <tr>
                <th>Sale No.</th>
                <th>Sale Date</th>
                <th>Sold By</th>
                <th>Site</th>
            </tr>
            <tr>
                <td>
		    <?php
		    $tempVar = $header_details->getSale_id_number();

		    if (isset($tempVar)) {
			print $tempVar;
		    } else {
			print '';
		    }

		    $tempVar = $header_details->getSold_by();
		    ?>
                </td>
                <td><?= date('m/d/Y') ?></td>
                <td><a href="mailto:#"><?= $tempVar ?></a></td>
                <td><?= $header_details->getUser_site() ?></td>
            </tr>
        </table>
    </div>
    <div class="pull-left line_items" style="width: 1030px !important;">
        <table class="table table-hover">
            <tr>
                <th class="proposal line"><strong class="text-info">Line#</strong></th>
                <th class="proposal part"><strong class="text-info">Part#</strong></th>
                <th class="proposal description"><strong class="text-info">Description</strong></th>
                <th class="proposal qty"><strong class="text-info">Qty</strong></th>
                <th class="proposal sell_price"><strong class="text-info">Sell Price</strong></th>
                <th class="proposal extended_price"><strong class="text-info">Extended Price</strong></th>
            </tr>

	    <?php
	    $total = 0;
	    $fees = 0;
	    $tax = 6.5; // need to get from DB

	    foreach ($header_details->getLines() as $line) {
		?>        
    	    <tr>
    		<td class="proposal line"><?= $line->getSale_line_number() + 1 ?></td>
    		<td class="proposal part"><?= $line->getItem_part_number() ?></td>
    		<td class="proposal description"><?= $line->getItem_description() ?></td>
    		<td class="proposal qty"><?= $line->getQty_sold() ?></td>
    		<td class="proposal sell_price">$<?= number_format($line->getSell_price(), 2, '.', ',') ?></td>
    		<td class="proposal extended_price">$<?= number_format($line->getQty_sold() * $line->getSell_price(), 2, '.', ',') ?></td>
    	    </tr>
		<?php
		$total = $total + $line->getQty_sold() * $line->getSell_price();
	    }
	    ?>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="proposal sub_total">Subtotal</td>
		<td class="proposal sub_total">$<?= number_format($total, 2, '.', ',') ?></td>
	    </tr>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="proposal fees">Fees</td>
		<td class="proposal fees">$<?= number_format($fees, 2, '.', ',') ?></td>
	    </tr>
	    <?php
	    $total_tax = number_format((($total + $fees) * $tax / 100), 2, '.', ',');
	    ?>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="proposal tax">Taxes</td>
		<td class="proposal tax">$<?= $total_tax ?></td>
	    </tr>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="proposal total"><strong>Total</strong></td>
		<td class="text_right"><strong>$<?= number_format(($total + $fees + $total_tax), 2, '.', ',') ?></strong></td>
	    </tr>
        </table>
    </div>
    <div class="pull-left line_items" style="width: 1030px !important">
        <ul style="text-align: left;">
            <li>Warranty (TBD)</li>
            <li>Return Policy (TBD)</li>
            <li>Exchanges (TBD)</li>
            <li>Return Shipping (TBD)</li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
	if ($('.seller').height() > $('.buyer').height()) {
	    $('.buyer').height($('.seller').height());
	}
	else {
	    $('.seller').height($('.buyer').height());
	}
    });
</script>