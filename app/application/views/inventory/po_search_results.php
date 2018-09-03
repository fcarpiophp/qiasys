<br><br>
<div style="width:90%; margin:0 auto;">
    <table class="table">
	<tr>
	    <td class="po_shipto header">

		<address>
		    <h4>Ship To:</h4>
		    <span class="po-style"><strong><?= $client->get_client_name() ?></strong></span><br>
		    <span class="po-style"><?= $client->get_client_add_1() ?></span>
		    <?php
		    $tempVar = $client->get_client_add_2();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><?= ', ' . $client->get_client_add_2() ?></span><br>
			<?php
		    } else {
			?>
    		    <br>
			<?php
		    }
		    ?>
		    <span class="po-style"><?= $client->get_client_city() ?></span>
		    <span class="po-style"><?= ', ' . $client->get_client_state() ?></span>
		    <span class="po-style">&nbsp;<?= $client->get_client_zip() ?></span><br><br>
		    <?php
		    $tempVar = $client->get_client_phone();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Phone">P: </abbr>
			    <?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $client->get_client_phone()) ?></span>
    		    <br>
			<?php
		    }

		    $tempVar = $client->get_client_fax();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Fax">F: </abbr>
			    <?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $client->get_client_fax()) ?></span>
    		    <br>
			<?php
		    }

		    $tempVar = $client->get_client_email();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Email">E: </abbr>
    			<a href="mailto:#"><?= $client->get_client_email() ?></a></span><br><br>
			<?php
		    }
		    ?>
		</address>
	    </td>

	    <td class="po_billto header">
		<address>
		    <h4>Bill To:</h4>
		    <span class="po-style"><strong><?= $client->get_billto_client_name() ?></strong></span><br>
		    <span class="po-style"><?= $client->get_billto_client_add_1() ?></span>
		    <?php
		    $tempVar = $client->get_billto_client_add_2();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><?= ', ' . $client->get_billto_client_add_2() ?></span><br>
			<?php
		    } else {
			?>
    		    <br>
			<?php
		    }
		    ?>
		    <span class="po-style"><?= $client->get_billto_client_city() ?></span>
		    <span class="po-style"><?= ', ' . $client->get_billto_client_state() ?></span>
		    <span class="po-style">&nbsp;<?= $client->get_billto_client_zip() ?></span><br><br>
		    <?php
		    $tempVar = $client->get_billto_client_phone();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Phone">P: </abbr>
			    <?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $client->get_billto_client_phone()) ?></span>
    		    <br>
			<?php
		    }

		    $tempVar = $client->get_billto_client_fax();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Fax">F: </abbr>
			    <?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $client->get_billto_client_fax()) ?></span>
    		    <br>
			<?php
		    }

		    $tempVar = $client->get_billto_client_email();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Email">E: </abbr>
    			<a href="mailto:#"><?= $client->get_billto_client_email() ?></a></span><br><br>
			<?php
		    }
		    ?>
		</address>
	    </td>

	    <td class="po_supplier header">
		<address>
		    <h4>Supplier:</h4>
		    <span class="po-style"><strong>
			    <?= $supplier->getSupplierName() ?>
			</strong></span><br>
		    <span class="po-style">Attn: <?= $supplier->getSupplierRep() ?></span><br>
		    <span class="po-style"><?= $supplier->getSupplierAdd1() ?></span>
		    <?php
		    $tempVar = $supplier->getSupplierAdd2();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><?= ', ' . $supplier->getSupplierAdd2() ?></span><br>
			<?php
		    } else {
			?>
    		    <br>
			<?php
		    }
		    ?>
		    <span class="po-style"><?= $supplier->getSupplierCity() ?></span>
		    <span class="po-style"><?= ', ' . $supplier->getSupplierState() ?></span>
		    <span class="po-style">&nbsp;<?= $supplier->getSupplierZip() ?></span><br><br>
		    <?php
		    $tempVar = $supplier->getSupplierPhone();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Phone">P: </abbr>
			    <?= preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $supplier->getSupplierPhone()) ?>
    		    </span><br>
			<?php
		    }

		    $tempVar = $supplier->getSupplierEmail();
		    if (!empty($tempVar)) {
			?>
    		    <span class="po-style"><abbr title="Email">E: </abbr>
    			<a href="mailto:#"><?= $supplier->getSupplierEmail() ?></a></span><br><br>
			<?php
		    }
		    ?>
		</address>
	    </td>
	</tr>
    </table>

    <?= form_open('inventory/update_po') ?>

    <table class="table">
	<?php
	print '<tr>';
	print '<th>Line#</th>';
	print '<th>Part#</th>';
	print '<th>Description</th>';
	print '<th>Ordered</th>';
	print '<th>Received</th>';
	print '<th>UOM</th>';
        print '<th>Site</th>';
	print '<th>Price</th>';
	print '<th>Amount</th>';
	print '<th>Receive</th>';
	print '</tr>';
        
        print '<input type="hidden" name="site_name" value="'.$order_header->get_order_site_name().'">';
        print '<input type="hidden" name="site_id" value="'.$order_header->get_order_site_id().'">';

	$sum = 0;

	foreach ($order_lines as $line) {

	    if ($line->getRequisitionLineQtyReceived() >= $line->getRequisitionLineQtyOrdered()) {
		$class = 'error';
	    } else {
		$class = 'success';
	    }
            
            print '<input type="hidden" name="part_number[]" value="'.$line->getItemPartNumber().'">';

	    print '<tr>';
	    print '<td>' . $line->getOrderLineNum() . '</td>';
	    print '<td>' . $line->getItemPartNumber() . '</td>';
	    print '<td class="">' . $line->getItemDescription() . '</td>';
	    print '<td>' . $line->getRequisitionLineQtyOrdered() . '</td>';
	    print '<td>' . $line->getRequisitionLineQtyReceived() . '</td>';
	    print '<td>' . $line->getItemUom() . '</td>';
            print '<td>' . $order_header->get_order_site_name() . '</td>';
	    print '<td class="right">' . number_format($line->getRequisitionLinePrice(), 2, '.', ',') . '</td>';
	    print '<td class="right">' . number_format($line->getRequisitionLineQtyOrdered() * $line->getRequisitionLinePrice(), 2, '.', ',') . '</td>';

	    if ($line->getRequisitionLineQtyReceived() >= $line->getRequisitionLineQtyOrdered()) {
		print '<td class="text-success">Received in Full</td>';
	    } else {
		print '<td><input name="qty[]" type="text" class="input-small" placeholder="Enter Qty"></td>';
	    }
	    print '</tr>';
	}
	?>

    </table>
    <input type="hidden" name="po_number" value="<?= $po_number ?>">
    <input type="hidden" name="supplier_id" value="<?= $supplier->getId() ?>">
    <button class="btn btn-primary pull-right" type="submit">Submit Items</button>

<?= form_close() ?>

</div>

