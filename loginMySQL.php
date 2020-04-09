<?php
session_start(); 

		// Instantiate your DB using the database host, port, name, username, and password
		$dbSocket = '/cloudsql/rocket-matchmaking:australia-southeast1:rocketmarket'
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');
        $dbName = 'account';
        //Establish connection with MySQLi
        $db = new mysqli(null, $user, $pw, $dbName, null, $dbSocket);
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        #register value from form inputs
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Check whethere if the Account exists
		$q = "select * from user where username = '$username' and password = '$password'";
		$result = mysqli_query($db,$q);

		if(mysqli_num_rows($result) > 0) { 
			$_SESSION['username'] = $username; 
			print "<script type='text/javascript'>
			alert('You have logged in $username');
			window.location.href = 'index.php';
			</script>";
		}
?>
		<script type="text/javascript">
		alert("You have not registered or incorrect password");
		window.location.href = "register.php";
        </script>
