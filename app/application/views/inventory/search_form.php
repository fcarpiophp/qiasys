<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fcarpio
 * Date: 1/35/13
 * Time: 3:38 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<br/>
<table width="100%">
	<tr>
		<td width="10%">
			content left
		</td>
		<td width="80%">
			<table class='center' width='500px'>
				<?= form_open('inventory/search') ?>
				<tr>
					<td colspan='2'
					    align='center'><?= form_error('searchCriteria', '<p class="message">', '</p>') ?></td>
				</tr>
				<tr>
					<td>Search</td>
					<td><input style="position: relative; float: right;" type="text" id="searchCriteria"
					           name="searchCriteria" value="" size="35"/></td>
				</tr>
				<tr style='display: none;' class='advanced_search'>
					<td>Part Number</td>
					<td><input style="position: relative; float: right;" type="text" id="partNumber" name="partNumber"
					           value="" size="35"/></td>
				</tr>
				<tr style='display: none;' class='advanced_search'>
					<td>Location</td>
					<td><input style="position: relative; float: right;" type="text" id="location" name="location"
					           value="" size="35"/></td>
				</tr>
				<tr style='display: none;' class='advanced_search'>
					<td>Unit of Measure</td>
					<td><input style="position: relative; float: right;" type="text" id="uom" name="uom" value=""
					           size="35"/></td>
				</tr>
				<tr style='display: none;' class='advanced_search'>
					<td>Supplier</td>
					<td><input style="position: relative; float: right;" type="text" id="supplier" name="supplier"
					           value="" size="35"/></td>
				</tr>
				<tr style='display: none;' class='advanced_search'>
					<td>Manufacturer</td>
					<td><input style="position: relative; float: right;" type="text" id="manufacturer"
					           name="manufacturer" value="" size="35"/></td>
				</tr>
				<tr>
					<td colspan='2'>
						<input type='button' style="position: relative; float: right;" class='show_advanced_search_btn'
						       value="Show Advanced Search"/>
						<input type='button' style="position: relative; float: right; display: none;"
						       class='hide_advanced_search_btn' value="Hide Advanced Search"/>
						<input style="position: relative; float: right;" type="submit" value="Search Now"/>
					</td>
				</tr>
				<?= form_close() ?>
			</table>
		</td>
		<td width="10%">
			<p>System Messages:</p>
			No messages to display.<br/><br/>
		</td>
	</tr>
</table>

<script type="text/javascript">
	$(document).ready(function () {
		$('#searchCriteria').focus();

		$('.show_advanced_search_btn').click(function () {
			$('.advanced_search').show();
			$('.hide_advanced_search_btn').show();
			$('.show_advanced_search_btn').hide();
		})

		$('.hide_advanced_search_btn').click(function () {
			$('.advanced_search').hide();
			$('.show_advanced_search_btn').show();
			$('.hide_advanced_search_btn').hide();
			$('#partNumber').val('');
			$('#location').val('');
			$('#uom').val('');
			$('#supplier').val('');
			$('#manufacturer').val('');
		})
	});
</script>