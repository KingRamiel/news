<form method="POST" action="connection/add.php" enctype="multipart/form-data">
	<label>Add News</label><br>
	<label>Title:</label>
	<input type="text" name="title">
	<br>
	<label>Category:</label>
	<input type="text" name="category">
	<br>
	<label>Content:</label>
	<textarea name="content"></textarea>
	<br>
	<input type="file" name="image" accept="image/*">
	<br>
	<input type="submit" name="submit" value="add">
</form>