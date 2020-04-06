<?php 
session_start();
$page_title= "Login";

include "./header.php"; 
include "./navbar.php";
?>
	<div id="loginContainer">
		<div id="loginForm" class="col-md-4">
		<h2>Login</h2>
		<form action="process_login.php" method="post">
			<input type="text" id="username" name="username" value="" placeholder="Username" required><br>
			<input type="password" id="pass" name="password" value="" placeholder="Password" required><br>
			<div id="hyperlink">
				<a href="index.php">forgot account?</a>
			</div>
			<input type="submit" name="Login" value="login"/><br/>
		</form> 
		</div>
	</div>
	<?php include "./footer.php"; ?>
</body>
</html>




