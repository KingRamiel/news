<?php
$db->select('news','*',null,'image on news.id=news_id');
$res = $db->getResult();
?>
<a href="?page=add">Add New Data</a>
<br>

<?php
$confirmstr="return confirm('Are you sure you want to delete this item?');";
foreach($res as $output){
	echo "<div class='news'>
 	<img src='".$output['image']."'>
	<h2>".$output["title"]."</h2>
	<h3>".$output["category"]."</h3>
	<a href='?page=edit&id=".$output['id']."'>Edit</a>
	<a href='connection/delete.php?id=".$output['id']."' onclick='$confirmstr'>Delete</a>
	</div>";
}
?>