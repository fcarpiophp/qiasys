<?php
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=inventory_export.csv");
header("Pragma: no-cache");
header("Expires: 0");
echo $all_inventory;