<?php
session_start(); 

		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');
 
		//DB connection
        $db = new PDO($dsn, $user, $pw);
        
        #register value from form inputs
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Check whethere if the Account exists
		$statement = $db->prepare("select * from user where username = '$username' and password = '$password'");
		$statement->execute();


		if($statement->rowCount() > 0) { 
			$_SESSION['username'] = $username; 
			print "<script type='text/javascript'>
			alert('You have logged in $username');
			window.location.href = 'index.php';
			</script>";
		}
		//header("Location:index.php");
		//exit(0);
?>
		<script type="text/javascript">
		alert("You have not registered or incorrect password");
		window.location.href = "register.php";
        </script>
