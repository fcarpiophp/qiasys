<?php
    //$image = base_url() . APPPATH . "images/logo/" . $this->session->userdata('user_client_id') . ".png";
?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/jquery-1.8.2.js"></script>
	<title>Order Confirmation</title>
	
	<style type="text/css">

	    * {
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	    }

	    h1 {
		color: #3A87AD;
		font-weight: bold;
		line-height: 20px;
		margin: 10px 0;
		text-rendering: optimizelegibility;
	    }

	    h3 {
		color: #3A87AD;
		font-weight: bold;
		line-height: 20px;
		margin: 10px 0;
		text-rendering: optimizelegibility;
	    }

	    .header {
		padding: 3px;
	    }

	    .seller {
		padding: 3px;
		float: left;
		width: 28%;
	    }

	    .buyer {
		padding: 3px;
		float: left;
		width: 28%;
	    }

	    .table th, .table td {
		border-top: 1px solid #DDDDDD;
		line-height: 20px;
		padding: 8px;
		text-align: left;
		vertical-align: top;
		font-size: 14px;
	    }

	    table {
		width: 100%;
		border-collapse: collapse;
	    }

	    td .header {
		border: 1px solid #cccccc;
		padding: 3px;
		border-collapse: collapse;
		vertical-align: top;
	    }

	    span {
		line-height: 120%;
	    }

	    .logo_image {
		float: right !important;
		width: 150px; 
		height: 50px;
		max-height: 80px;
	    }

	    .lines {
		border: 1px solid #CCCCCC;
	    }

	    span.po-style {
		font-size: 14px;
	    }

	    th {
		background-color: #e0ffff;
	    }

	    .right {
		text-align: right !important;
	    }
	    
	    .left {
		text-align: left !important;
	    }

	    div.summary {
		float: right;
		max-width: 220px;
	    }

	    .summary td {
		font-size: 14px;
	    }

	    div.notes {
		float: left;
		max-width: 500px;
		font-size: 14px;
	    }

	</style>
    </head>
    <body>
	<table class="table">
	    <tr>
		<td colspan="2">
		    <!--
		    <img class="logo_image" src="<?= $image ?>">
		    -->
		    <h1>Order Confirmation</h1>
		    <p>Order Confirmation No.: <strong><?=$sale_number?></strong><br>
			Order Date: <?= date('m/d/Y') ?></p>
		</td>
	    </tr>
	    <tr>
		<td class="seller header">
		    <address>
			<span style="display: block;" class="pull-left"><h3 class="text-info">Seller</h3></span>
			<span style="display: block;" class="pull-left"><strong><?= $header_details->getClientName() ?></strong></span>
			<span style="display: block;" class="pull-left"><?= $header_details->getClientAdd1() ?></span>
			<?php
			$tempVar = $header_details->getClientAdd2();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><?= $header_details->getClientAdd2() ?></span>
			    <?php
			}

			$tempVar = $header_details->getClientCity();

			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left">
				<?= $header_details->getClientCity() ?>
				<?php
			    }

			    $tempVar = $header_details->getClientState();
			    $tempVar = trim($tempVar);

			    if (!empty($tempVar)) {
				?>
				<?= ', ' . $header_details->getClientState() ?>
				<?php
			    }

			    $tempVar = $header_details->getClientZip();

			    if (!empty($tempVar)) {
				?>
    			    &nbsp;<?= $header_details->getClientZip() ?>
				<?php
			    }
			    ?>
			</span><br><br>
			<?php
			$tempVar = $header_details->getClientPhone();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><abbr title="Phone">P: </abbr>
				<?= "(" . substr($tempVar, 0, 3) . ") " . substr($tempVar, 3, 3) . "-" . substr($tempVar, 6) ?><br>
    			</span>
			    <?php
			}

			$tempVar = $header_details->getClientFax();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><abbr title="Fax">F: </abbr>
				<?= "(" . substr($tempVar, 0, 3) . ") " . substr($tempVar, 3, 3) . "-" . substr($tempVar, 6) ?><br>
    			</span>
			    <?php
			}

			$tempVar = $header_details->getClientEmail();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><abbr title="Email">E: </abbr>
			    <a href="mailto:#"><?= $header_details->getClientEmail() ?></a><br>
    			</span>
			    <?php
			}
			?>
		    </address>
		</td>
		<td class="buyer header">
		    <address>
			<span  style="display: block;" class="pull-left"><h3 class="text-info">Buyer</h3></span>
			<span  style="display: block;" class="pull-left">
			    <strong>
				<?= $header_details->getCustomersFirstName() . ' ' . $header_details->getCustomersLastName() ?>
			    </strong>
			</span>
			<span  style="display: block;" class="pull-left"><?= $header_details->getCustomersAddress1() ?></span>
			<?php
			$tempVar = $header_details->getCustomersAddress2();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><?= $header_details->getCustomersAddress2() ?></span><br>
			    <?php
			} else {
			    ?>
    			<br>
			    <?php
			}

			$tempVar = $header_details->getCustomersCity();

			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><?= $header_details->getCustomersCity() ?></span>
			    <?php
			}

			$tempVar = $header_details->getCustomersState();
			?>

			<?php
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><?= ', ' . $tempVar ?></span>
			    <?php
			}

			$tempVar = $header_details->getCustomersZip();

			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left">&nbsp;<?= $header_details->getCustomersZip() ?></span>
			    <?php
			}
			?>
			<br><br>
			<?php
			$tempVar = $header_details->getCustomersPhone();
			if (!empty($tempVar)) {
			    ?>
    			<span class="pull-left"><abbr title="Phone">P: </abbr>
				<?php
				$phone = $header_details->getCustomersPhone();
				echo "(" . substr($phone, 0, 3) . ") " . substr($phone, 3, 3) . "-" . substr($phone, 6);
				?>
    			</span><br>
			    <?php
			}

			$tempVar = $header_details->getCustomersEmail();
			if (!empty($tempVar)) {
			?>
    			<span class="pull-left"><abbr title="Email">E: </abbr>
    			    <a href="mailto:#"><?= $header_details->getClientEmail() ?></a>
			</span><br>
			<?php
			}
			?>
		    </address>
		</td>
	    </tr>
	</table>
	<br>
	<table class='table lines'>
	    <tr>
		<th>Sale No.</th>
		<th>Sale Date</th>
		<th>Sold By</th>
		<th>Site</th>
	    </tr>
	    <tr>
		<td>
		    <?php
		    if (isset($sale_number)) {
			print $sale_number;
		    } else {
			print '';
		    }
		    ?>
		</td>
		<td><?= date('m/d/Y') ?></td>
		<td><?= $this->session->userdata('user_first_name') . ' ' . $this->session->userdata('user_last_name') ?></td>
		<td><?= $this->session->userdata('user_site') ?></td>
	    </tr>
	</table>
	<br>
	<table>
	    <tr>
		<th class="left"><strong>Line#</strong></th>
		<th class="left"><strong>Part#</strong></th>
		<th class="left"><strong>Description</strong></th>
		<th class="left"><strong>Qty</strong></th>
		<th class="right"><strong>Price</strong></th>
		<th class="right"><strong>Total</strong></th>
	    </tr>

	    <?php
	    $total = 0;
	    $fees = 0;
	    $tax = $this->session->userdata('city_tax') + $this->session->userdata('state_tax');
	    $i = 0;

	    if (!empty($proposal_summary)) {
		foreach ($proposal_summary as $line) {
		    ?>        
		    <tr>
			<td class="left"><?= ++$i ?></td>
			<td class="left"><?= $line->getItemPartNumber() ?></td>
			<td class="left"><?= $line->getItemDescription() ?></td>
			<td class="left"><?= $line->getItemQty() ?></td>
			<td class="right"><?= number_format($line->getItemPrice(), 2, '.', ',') ?></td>
			<td class="right"><?= number_format($line->getItemExtendedPrice(), 2, '.', ',') ?></td>
		    </tr>
		    <?php
		    $total = $total + $line->getItemExtendedPrice();
		}
	    }
	    ?>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="right">Subtotal</td>
		<td class="right">$<?= number_format($total, 2, '.', ',') ?></td>
	    </tr>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="right">Fees</td>
		<td class="right">$<?= number_format($fees, 2, '.', ',') ?></td>
	    </tr>
	    <?php
		$total_tax = number_format((($total + $fees)*$tax/100), 2, '.', ',');
	    ?>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="right">Taxes</td>
		<td class="right">$<?= $total_tax ?></td>
	    </tr>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="right"><strong>Total</strong></td>
		<td class="right"><strong>$<?= number_format(($total + $fees + $total_tax), 2, '.', ',') ?></strong></td>
	    </tr>
	</table>
        <!--
	<div class="left" style="width: 1030px !important">
	    <ul style="text-align: left;">
		<li>Warranty (TBD)</li>
		<li>Return Policy (TBD)</li>
		<li>Exchanges (TBD)</li>
		<li>Return Shipping (TBD)</li>
	    </ul>
	</div>
        -->
    </body>
</html>
