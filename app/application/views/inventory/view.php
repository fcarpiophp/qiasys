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
print $body_data;
?>

<script type="text/javascript">
	$(document).ready(function () {

		$('#tab_data tr').click(function () {
			var href = $(this).find("td").attr("id");
			if (href) {
				window.location = 'item_details/' + href;
			}
		});

	});
</script>
