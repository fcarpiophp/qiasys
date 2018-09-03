<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/jquery-1.8.2.js"></script>
	<title>Purchase Order</title>
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

	    .po_shipto {
		padding: 3px;
		float: left;
		width: 28%;
	    }

	    .po_billto {
		padding: 3px;
		float: left;
		width: 28%;
	    }

	    .po_supplier {
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
	<?php
	/*
	$image = base_url() . APPPATH . "images/logo/" . $this->session->userdata('user_client_id') . ".png";
	$size = getimagesize($image);
	$width = $size[0];
	$height = $size[1];
	$MAX_SIZE = 150;

	if ($width > $MAX_SIZE || $height > $MAX_SIZE) {
	    $aspect = $width / $height;
	    if ($width > $height) {
		$width = $MAX_SIZE;
		$height = intval($MAX_SIZE / $aspect);
	    } else {
		$height = $MAX_SIZE;
		$width = intval($MAX_SIZE * $aspect);
	    }
	}
	*/
	
	?>
	<table class="table">
	    <tr>
		<td width="90%">
		    <h1>Purchase Order</h1>

		    <p>Purchase Order No.: <strong><?= $order[0]['po_number'] ?></strong><br>
			PO Date: <?= date('m/d/Y') ?></p>
		</td>
		<td>
		    <!--
		    <img alt="Logo Image" class="logo_image" src="<?= $image ?>">
		    -->
		</td>
	    </tr>
	</table>
	<table class="table">
	    <tr>
		<td class="po_shipto header">

		    <address>
			<h3>Ship To:</h3>
			<span class="po-style"><strong><?= $order[0]['client']['client_name'] ?></strong></span><br>
			<span class="po-style"><?= $order[0]['client']['client_add_1'] ?></span>
			<?php
			$tempVar = $order[0]['client']['client_add_2'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><?= ', ' . $tempVar ?></span><br>
			    <?php
			} else {
			    ?>
    			<br>
			    <?php
			}
			?>
			<span class="po-style"><?= $order[0]['client']['client_city'] ?></span>
			<span class="po-style"><?= ', ' . $order[0]['client']['client_state'] ?></span>
			<span class="po-style">&nbsp;<?= $order[0]['client']['client_zip'] ?></span><br><br>
			<?php
			$tempVar = $order[0]['client']['client_phone'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Phone">P: </abbr>
				<?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $tempVar) ?></span>
    			<br>
			    <?php
			}

			$tempVar = $order[0]['client']['client_fax'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Fax">F: </abbr>
				<?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $tempVar) ?></span>
    			<br>
			    <?php
			}

			$tempVar = $order[0]['client']['client_email'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Email">E: </abbr>
    			    <a href="mailto:#"><?= $tempVar ?></a></span><br><br>
			    <?php
			}
			?>
		    </address>
		</td>

		<td class="po_billto header">
		    <address>
			<h3>Bill To:</h3>
			<span class="po-style"><strong><?= $order[0]['client']['billto_client_name'] ?></strong></span><br>
			<span class="po-style"><?= $order[0]['client']['billto_client_add_1'] ?></span>
			<?php
			$tempVar = $order[0]['client']['billto_client_add_2'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><?= ', ' . $tempVar ?></span><br>
			    <?php
			} else {
			    ?>
    			<br>
			    <?php
			}
			?>
			<span class="po-style"><?= $order[0]['client']['billto_client_city'] ?></span>
			<span class="po-style"><?= ', ' . $order[0]['client']['billto_client_state'] ?></span>
			<span class="po-style">&nbsp;<?= $order[0]['client']['billto_client_zip'] ?></span><br><br>
			<?php
			$tempVar = $order[0]['client']['billto_client_phone'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Phone">P: </abbr>
				<?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $tempVar) ?></span>
    			<br>
			    <?php
			}

			$tempVar = $order[0]['client']['billto_client_fax'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Fax">F: </abbr>
				<?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $tempVar) ?></span>
    			<br>
			    <?php
			}

			$tempVar = $order[0]['client']['billto_client_email'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Email">E: </abbr>
    			    <a href="mailto:#"><?= $tempVar ?></a></span><br><br>
			    <?php
			}
			?>
		    </address>
		</td>

		<td class="po_supplier header">
		    <address>
			<h3>Supplier:</h3>
                        <span class="po-style"><strong>
				<?= $order[0]['supplier']['supplier_name'] ?>
			    </strong></span><br>
			<span class="po-style">Attn: <?= $order[0]['supplier']['supplier_rep'] ?></span><br>
			<span class="po-style"><?= $order[0]['supplier']['supplier_add_1'] ?></span>
			<?php
			$tempVar = $order[0]['supplier']['supplier_add_2'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><?= ', ' . $tempVar ?></span><br>
			    <?php
			} else {
			    ?>
    			<br>
			    <?php
			}
			?>
			<span class="po-style"><?= $order[0]['supplier']['supplier_city'] ?></span>
			<span class="po-style"><?= ', ' . $order[0]['supplier']['supplier_state'] ?></span>
			<span class="po-style">&nbsp;<?= $order[0]['supplier']['supplier_zip'] ?></span><br><br>
			<?php
			$tempVar = $order[0]['supplier']['supplier_phone'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Phone">P: </abbr>
				<?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $tempVar) ?>
    			</span><br>
			    <?php
			}

			$tempVar = $order[0]['supplier']['supplier_email'];
			if (!empty($tempVar)) {
			    ?>
    			<span class="po-style"><abbr title="Email">E: </abbr>
    			    <a href="mailto:#"><?= $tempVar ?></a></span><br><br>
			    <?php
			}
			?>
		    </address>
		</td>
	    </tr>
	</table>
	<table class="table lines">
	    <?php
	    print '<tr>';
	    print '<th>Line #</th>';
	    print '<th>Part #</th>';
	    print '<th>Description</th>';
	    print '<th>Qty</th>';
	    print '<th>UOM</th>';
	    print '<th>Price</th>';
	    print '<th>Amount</th>';
	    print '</tr>';

	    $sum = 0;

	    foreach ($order as $line) {

		print '<tr>';
		print '<td>' . $line['line_number'] . '</td>';
		print '<td>' . $line['part_number'] . '</td>';
		print '<td>' . $line['description'] . '</td>';
		print '<td>' . $line['order_qty'] . '</td>';
		print '<td>' . $line['uom'] . '</td>';
		print '<td class="right">' . number_format($line['cost'], 2, '.', ',') . '</td>';
		print '<td class="right">' . number_format($line['order_qty'] * $line['cost'], 2, '.', ',') . '</td>';
		print '</tr>';
		$sum = $sum + $line['order_qty'] * $line['cost'];
	    }

	    $tax = 0;
	    $fees = 0;
	    ?>

	</table>

	<table>
	    <tr>
		<td>
		    <div class="notes">
			Terms:<br>
			<ul>
			    <li>Payment: Net 30.</li>
			    <li>Delivery: All goods must be delivered within 14 days of PO's date.</li>
			    <li>Condition: We reserve the right to reject any goods that do not comply with our quality
				standards.
			    </li>
			</ul>
		    </div>
		</td>

		<td>
		    <table style="float: right" class="summary">
			<tr>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">Total Before Tax:</td>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">
				$<?= number_format($sum, 2, '.', ',') ?></td>
			</tr>
			<tr>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">Tax:</td>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">
				$<?= number_format($tax, 2, '.', ',') ?></td>
			</tr>
			<tr>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">Other Fees:</td>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">
				$<?= number_format($fees, 2, '.', ',') ?></td>
			</tr>
			<tr>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">Total:</td>
			    <td align="right" style="padding-right: 8px; font-size: 14px;">
				$<?= number_format($sum + $tax + $fees, 2, '.', ',') ?></td>
			</tr>
		    </table>
		</td>
	    </tr>

	</table>


    </body>
</html>

