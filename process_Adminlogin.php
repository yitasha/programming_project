<?php
session_start(); 

		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');
 
		//DB connection
        $db = new PDO($dsn, $user, $pw);
        
        #register value from form Admin inputs
		$username = $_POST['adminName'];
		$password = $_POST['adminPass'];

		//Check whethere if the Account exists
		$statement = $db->prepare("select * from admin where username = '$username' and password = '$password'");
		$statement->execute();

		if($statement->rowCount() > 0) { 
            //Store admin username in Session
			$_SESSION['adminName'] = $username; 
			print "<script type='text/javascript'>
			alert('Welcome Admin: $username');
			window.location.href = 'adminIndex.php';
			</script>";
        }
        
?>
		<script type="text/javascript">
		alert("Try again, Admin");
		window.location.href = "adminLogin.php";
        </script>
