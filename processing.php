<?php
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]
	// Instantiate your DB using the database host, port, name, username, and password
	$dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');
    $db = new PDO($dsn, $user, $pw);

	//img form
	 $username = $_SESSION['username'];
	 $title = $_POST['title'];
	 $category = $_POST['category'];
	 $tags = $_POST['tags'];
	 $desc = $_POST['description'];
	 
 
	//fileupload
    $imgname = $_FILES['img']['name']; //define name from img -> name
	
    $location = $_FILES['img']['tmp_name']; //store in tmp location and move later

    move_uploaded_file($location, 'gs://rocket-imgs/'. $imgname); 
	
 	//insertion
	$statement = $db->prepare("insert into artwork values(null,'$username','$title','$category','$desc','$tags','$imgname')");
	$statement->execute();


	header("Location:add.php");
	exit(0);

 ?>