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
        $phoneid = $_POST['productID'];
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


        //updating
		$statement = $db->prepare("UPDATE phone SET phonename='$phonename', phonecond='$phonecond',brand='$brand',model='$model',phoneos='$phoneos',phonemem='$phonemem',phonestorage='$phonestorage',phonecol='$phonecol', phonescreen='$phonescreen', phonecam='$phonecam',description='$description',price='$price' WHERE phoneid='$phoneid'");

		if($statement->execute())
        {
			print "<script type='text/javascript'>
			alert('You have updated the product: $phonename');
			window.location.href = 'myProfilePage.php';
            </script>";
        }
        else
        {
            print "<script type='text/javascript'>
			alert('Update failed, try again later.');
			window.location.href = 'myProfilePage.php';
            </script>";
        }

?>