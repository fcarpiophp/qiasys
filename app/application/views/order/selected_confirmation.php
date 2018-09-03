<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 1/24/14
 * Time: 7:39 AM
 */

?>
<br>
<div style="margin-left: 0 auto; margin-right: 0 auto;">
    <table class="table table-condensed table-hover">
	<thead>
	    <tr>
		<th>#</th>
		<th>PO Number</th>
		<th>Supplier Name</th>
		<th>Order Status</th>
		<th>Email Sent</th>
		<th>Sent To</th>
		<th>Site</th>
	    </tr>
	</thead>
	<tbody>
	    <?php
	    $i = 0;
	    foreach ($orders as $order) {
		
		print '<tr>';
		print '<td><strong>' . ++$i . '</strong></td>';
		print '<td>' . $order[0]['po_number'] . '</td>';
		print '<td>' . $order[0]['supplier']['supplier_name'] . '</td>';
		print '<td>';
		print ($order['db_status']) ? '<span class="text-success">Success</span>' : '<span class="text-error">Error</span>';
		print '</td>';
		print '<td>';
		print ($email_status) ? '<span class="text-success">Success</span>' : '<span class="text-error">Error</span>';
		print '</td>';
		print '<td>' . $order[0]['supplier']['supplier_email'] . '</td>';
		print '<td>' . $order[0]['site_name'] . '</td>';
		print '</tr>';
	    }
	    ?>
	</tbody>
    </table>
</div>