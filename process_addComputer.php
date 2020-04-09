<?php
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

    // Instantiate your DB using the database host, port, name, username, and password
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');

    //DB connection
    $db = new PDO($dsn, $user, $pw);

    //Data from sellPhone.php form
	$user_userid = $_SESSION['userid'];
    $pcname = $_POST['pcname'];
    $pctype = $_POST['pctype'];
    $pccond = $_POST['pccond'];
    $pcbrand = $_POST['pcbrand'];
    $pcgpu = $_POST['pcgpu'];
    $pccpu = $_POST['pccpu'];
    $pcram = $_POST['pcram'];
    $pcos = $_POST['pcos'];
    $pccolor = $_POST['pccolor'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //fileupload
    $imgname = $_FILES['image']['name']; //define name from img -> name
	
    $location = $_FILES['image']['tmp_name']; //store in tmp location and move later
    //Move uploaded image to google bucket
    move_uploaded_file($location, 'gs://computerimg/'. $imgname); 

    $statement = $db->prepare("INSERT INTO computer (computerid, pcname, images, pctype, pccond, pcbrand, pcgpu, pccpu, pcram, pcstorage, pcos, pccolor, description, price, user_userid)
    VALUES (null,'$pcname','$imgname','$pctype', '$pccond','$pcbrand','$pcgpu','$pccpu','$pcram','$pcstorage','$pcos','$pccolor','$description','$price','$user_userid)");

    $statement->execute();
    
    print "<script type='text/javascript'>
		alert('You have added an new Computer');
		window.location.href = 'index.php';
	    </script>";

?>