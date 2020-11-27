<?php 
session_start();
	#If public username is detected, do not show Admin login panel
	$username = $_SESSION['username'];
	if(isset($username))
	{
		print "<script type='text/javascript'>
		alert('Logout normal user first!');
		window.location.href = 'index.php';
	    </script>";
	}
	#If Admin username is already detected, do not show Admin login panel
	$admin = $_SESSION['adminName'];
	if(isset($admin))
	{
		print "<script type='text/javascript'>
		alert('Admin you have already logged in!');
		window.location.href = 'adminIndex.php';
	    </script>";
    }

$page_title= "Admin Login";

include "./header.php"; 
include "./navbar.php";
?>
	<div id="loginContainer">
		<div id="loginForm" class="col-md-4">
		<h2>Admin Only</h2>
		<form action="process_Adminlogin.php" method="post">
			<input type="text" id="adminName" name="adminName" value="" placeholder="Admin Username" required><br>
			<input type="password" id="pass" name="adminPass" value="" placeholder="Password" required><br>

			<input type="submit" name="Login" value="login"/><br/>
		</form> 
		</div>
	</div>
	<?php include "./footer.php"; ?>
</body>
</html>




