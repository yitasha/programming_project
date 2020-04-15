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

        #update value from form inputs

        $phonename = $_POST['phonename'];
        $phonecond = $_POST['phonecond'];  
        $brand = $_POST['brand'];  
        $model = $_POST['model']; 
        $phoneos = $_POST['phoneos'];
        $phonemem = $_POST['phonemem'];
        $phonestorage = $_POST['phonestorage'];  
        $phonecol = $_POST['phonecol'];
        $phonescreen = $_POST['phonescreen'];
        $phonecam = $_POST['phonecam'];
        $description = $_POST['description']; 
        $price = $_POST['price'];
    //fileupload
    $imgname = $_FILES['image']['name']; //define name from img -> name
    $location = $_FILES['image']['tmp_name']; //store in tmp location and move later
  //Move uploaded image to google bucket: computer
        //updating
		$statement = $db->prepare("UPDATE phone SET phonename=$phonename,images=$imgname,phonecond=$phonecond,brand=$brand,model=$model,phoneos=$phoneos,phonemem=$phonemem,phonestorage=$phonestorage,phonecol=$phonecol,
        phonescreen=$phonescreen, phonecam=$phonecam,description=$description,price=$price WHERE phoneid=$phoneid);
		$statement->execute();
			print "<script type='text/javascript'>
			alert('You have updated the product with, $phonename');
			window.location.href = 'index.php';
	        </script>";
		
?>