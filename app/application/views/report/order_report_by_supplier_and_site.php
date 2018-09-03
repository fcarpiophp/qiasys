<style type="text/css">
	#tab_data td:hover {
		cursor: pointer;
	}
</style>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
print $body_data . '<br>';

?>
<input type="hidden" class="base_url" value="<?= base_url() ?>">
<script type="text/javascript">
	$(document).ready(function () {

		$('#tab_data tr').click(function () {
			var href = $('.base_url').val() + 'index.php/inventory/item_details/' + $(this).find("td").attr("id");
			if (href) {
				window.location = href;
			}
		});

	});
</script>