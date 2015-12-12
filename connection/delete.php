<?php
require '../class/db.php';
$db = new Database();
$db->connect('localhost','root','','newsdb');
$id = $_GET['id'];
$db->delete("news","id='$id'");
header("Location:../")
?>