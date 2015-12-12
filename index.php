<?php
require 'class/db.php';
require 'view/head.php';
	
$db = new Database();
// $db->out();
$db->connect('localhost','root','','newsdb');
require 'view/menu.php';
require 'view/page.php';
?>
</body>
</html>