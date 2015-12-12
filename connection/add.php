<?php
require '../class/db.php';
$db = new Database();
$db->connect('localhost','root','','newsdb');

if (isset($_POST['submit'])) {
	if ($_POST['submit']=='add') {
		$db->insert('news',array('title'=> mysql_escape_string($_POST['title']),
			'category'=> mysql_escape_string($_POST['category']),
			'content'=> mysql_escape_string($_POST['content']),
			));
		$lastID= mysql_insert_id();
		
		$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
		echo $imageName;
		move_uploaded_file($_FILES['image']['tmp_name'],"../upload/".$_FILES['image']['name']);
		$imageFileType = pathinfo("../upload/".$imageName,PATHINFO_EXTENSION);
		$imageNewName = "../upload/".$lastID.".".$imageFileType;
		rename("../upload/".$_FILES['image']['name'], $imageNewName);
		$imageNametoStore = "upload/".$lastID.".".$imageFileType;
		$db->insert('image',array('news_id'=>$lastID,
			'image' => $imageNametoStore,
			));
		header("Location:../");
	}
}

?>