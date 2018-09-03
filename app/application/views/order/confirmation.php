<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 1/24/14
 * Time: 7:39 AM
 */

?>
<div style="display: block;" class="span12 offset2">
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>PO Number</th>
				<th>Order Status</th>
				<th>Email Sent</th>
				<th>Supplier Name</th>
				<th>Site</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$i = 0;
			foreach($order_status as $status) {
				print '<tr>';
				print '<td><strong>'.++$i.'</strong></td>';
				print '<td>'.$status['po_number'].'</td>';
				print '<td>';
				print ($status['order_status']) ? '<span class="text-success">Success</span>' : '<i class="icon-remove"></i>';
				print '</td>';
				print '<td>';
				print ($status['email_sent']) ? '<span class="text-success">Success</span>' : '<span class="text-error">Error</span>';
				print '</td>';
				print '<td>'.$status['supplier_name'].'</td>';
				print '<td>'.$status['client_site'].'</td>';
				print '</tr>';
			}
		?>
		</tbody>
	</table>
</div>