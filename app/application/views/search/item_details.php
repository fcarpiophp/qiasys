<style type="text/css">
	table {
		width: 100%;
	}

	tr {
		height: 50px;
	}

	td {
		padding: 5px;
		padding-right: 15px;
	}

	.show_form {
		margin-right: 15px;
	}

	.icon-pencil {
		margin-right: 15px;
	}

	.icon-pencil:hover {
		cursor: pointer;
	}

</style>

<br>

<div class="row-fluid display">
	<div class="span6 offset3">
		<table class='table-striped'>
			<tr>
				<th colspan="3">
					<h4>Item Details for Part# <?= $item_details[0]['item_part_number'] ?>
						<?php
						if ('admin' == $this->session->userdata('user_type')) {
							print("<a href='" . base_url() . "index.php/inventory/edit_item_details/" . $item_details[0]['item_part_number'] . "'><i class='icon-pencil pull-right'></i></a>");
						}
						?>
					</h4>
				</th>
			</tr>
			<tr>
				<td colspan="3">
					<strong>Description:</strong> <?= $item_details[0]['item_description'] ?>
				</td>
			</tr>
			<tr>
				<td style="padding-right: 10px;"><strong>Part
						Number: </strong><?= $item_details[0]['item_part_number'] ?>
				</td>
				<td><strong>Supplier Name:</strong> <?= $item_details[0]['supplier_name'] ?></td>
				<td><strong>Unit of Measure:</strong> <?= $item_details[0]['item_uom'] ?></td>
			</tr>
			<tr>
				<td><strong>In Stock:</strong> <?= $item_details[0]['item_stock'] ?></td>
				<td><strong>On Order:</strong> <?= $item_details[0]['item_on_order'] ?></td>
				<td><strong>Min:</strong> <?= $item_details[0]['item_min'] ?></td>
			</tr>
			<tr>
				<td><strong>Max:</strong> <?= $item_details[0]['item_max'] ?></td>
				<td><strong>Order Qty:</strong> <?= $item_details[0]['item_order_qty'] ?></td>
				<td><strong>Min Order:</strong> <?= $item_details[0]['item_min_order'] ?></td>
			</tr>
			<tr>
				<td><strong>Item Site:</strong> <?= $item_details[0]['item_site'] ?></td>
				<td><strong>Item Location:</strong> <?= number_format($item_details[0]['item_location'], 2, '.', ' ') ?>
				</td>
				<td><strong>Cost:</strong> $<?= number_format($item_details[0]['item_cost'], 2, '.', ' ') ?></td>
			</tr>
			<tr>
				<td><strong>Item MSRP:</strong> $<?= number_format($item_details[0]['item_msrp'], 2, '.', ' ') ?></td>
				<td><strong>Item Price:</strong> $<?= number_format($item_details[0]['item_price'], 2, '.', ' ') ?></td>
				<td></td>
			</tr>
		</table>
	</div>
</div>
