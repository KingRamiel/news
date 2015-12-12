<?php
$id = $_GET['id'];
$db->select('news',"*","id='$id'");
$res = $db->getResult();
foreach($res as $output){
	?>

	<form method="POST" action="connection/add.php">
		<label>Add News</label><br>
		<label>Title:</label>
		<input type="text" name="title" value="<?php echo $output['title']?>">
		<br>
		<label>Category:</label>
		<input type="text" name="category" value="<?php echo $output['category']?>">
		<br>
		<label>Content:</label>
		<textarea name="content"><?php echo $output['content']?></textarea>
		<br>
		<input type="submit" name="submit" value="update">
	</form>
	<?php
}
?>