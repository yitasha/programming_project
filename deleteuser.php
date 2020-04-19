<?php
session_start();
		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);
        
        //deleting
		$statement = $db->prepare("DELETE from user where userid=$userid")
		$statement->execute();
			print "<script type='text/javascript'>
			alert('You have deleted the account');
			window.location.href = 'index.php';
	        </script>";
		
?>