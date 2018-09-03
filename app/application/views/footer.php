<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!-- these divs open on header -->

<div class="push"><!--//--></div>

</div><!-- this div opens on header.php -->
<div class="pagination">
<?php
if(isset($pagination_links)) {
	$pagination_links = str_replace('&amp;replace=', '/', $pagination_links);
	print $pagination_links;
}
?>
</div>
<div class="footer noprint">
	<footer class="footer noprint">
		<div class="container noprint">
			<p>footer content goes here!</p>
		</div>
	</footer>
</div>
</body>
</html>  
