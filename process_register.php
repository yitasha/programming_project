<?php

		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);

        #register value from form inputs
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

		
		$check = $db->prepare("select * from user where username = '$username'");
		$check->execute();
		//Check if existing user name exist.
		if($check->rowCount() > 0) { 
			print "<script type='text/javascript'>
			alert('This username is unavailable');
			window.location.href = 'index.php';
        	</script>";
		}
		else
		{
		//insertion
		$statement = $db->prepare("INSERT INTO user (userid, firstname, lastname, phone, email, address1, address2, postcode, state, username, password)
		VALUES (null,'$firstname','$lastname', '$phone','$email','$address1','$address2','$postcode','$state','$username','$password')");
		
		$statement->execute();
			print "<script type='text/javascript'>
			alert('You have registered, $username');
			window.location.href = 'index.php';
	        </script>";
		}
?>

		