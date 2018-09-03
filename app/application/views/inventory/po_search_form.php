<?php
	$attributes = array('class' => 'form-horizontal');
?>
<div class="span6 offset3">
	<?= form_open('inventory/get_po', $attributes) ?>
		<legend>
			Search By PO Number
		</legend>
		<div class="control-group">
			<label class="control-label" for="inputEmail">PO Number</label>
			<div class="controls">
				<input type="text" name="po_number" id="po_number" placeholder="PO Number">
			</div>
			<div class="controls">
				<p class="text-error">
					<?php
					if(isset($error_message)) {
						print $error_message;
					}
					?>
				</p>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Search PO</button>
			</div>
		</div>
	<?= form_close() ?>
</div>