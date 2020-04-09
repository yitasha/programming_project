<?php
session_start();
    // Instantiate your DB using the database host, port, name, username, and password
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');

    //DB connection
    $db = new PDO($dsn, $user, $pw);

    //Data from sellPhone.php form
	$user_userid = $_SESSION['userid'];
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
    $name = $_POST['image'];

    //fileupload
    $imgname = $_FILES['image']['name']; //define name from img -> name
	
    $location = $_FILES['image']['tmp_name']; //store in tmp location and move later
    //Move uploaded image to google bucket
    move_uploaded_file($location, 'gs://phoneimg/'. $imgname); 

    $statement = $db->prepare("INSERT INTO phone (phoneid, images, phonename, phonecond, brand, model, phoneos, phonemem, phonestorage, phonecol, phonescreen, phonecam, description, price, user_userid)
    VALUES (null, '$imgname','$phonename','$phonecond','$brand', '$model','$phoneos','$phonemem', '$phonestorage', '$phonecol', '$phonescreen', '$phonecam', '$description', '$price','$user_userid')");

    $check = $statement->execute();
    /*
    if($check)
    {
        print "<script type='text/javascript'>
			alert('You have added an new Phone');
			window.location.href = 'index.php';
	        </script>";
    }
    else {
        print "<script type='text/javascript'>
			alert('Error something went wrong!');
			window.location.href = 'index.php';
	        </script>";
    }
    */
    echo "$phonename, $name, $imgname, $phonecond, $brand, $model, $phoneos, $phonemem, $phonestorage
    , $phonecol, $phonescreen, $phonecam, $description, $price, $user_userid ";
?>