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
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$postcode = $_POST['postcode'];
		$state = $_POST['state'];

        //updating
		$statement = $db->prepare("UPDATE user SET firstname=$firstname,lastname=$lastname,phone=$phone,email=$email,address1=$address1,address2=$address2,postcode=$postcode,state=$state,username=$username,password=$password where userid=$userid")
		$statement->execute();
			print "<script type='text/javascript'>
			alert('You have edited the account with, $username');
			window.location.href = 'index.php';
	        </script>";
		
?>