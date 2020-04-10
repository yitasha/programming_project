<?php 
session_start();
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




