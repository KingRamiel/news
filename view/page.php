<?php
if (!isset($_GET['page'])) {
	require 'viewall.php';
}
else{
	if ($_GET['page']=="add") {
		require 'add.php';
	}
	else if ($_GET['page']=="edit") {
		require 'edit.php';
	}
}
?>