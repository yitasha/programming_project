<?php 
session_start();
$page_title= "Register";
	
include "./header.php"; 
include "./navbar.php";
?>

<div class="registerContainer">
	<h2>Register</h2>
	<div class="row">
	<form action="process_register.php" method="post">
		<input type="text" id="username" name="username" value="" placeholder="Username" required><br>
		<input type="password" id="pass" name="password" value="" placeholder="Password" minlength="6" required><br>
		<input type="text" name="firstname" placeholder="first name"required/><br>
		<input type="text" name="lastname" placeholder="last name"required/><br>
		<input type="text" name="phone" maxlength="10" placeholder="phone number" required/><br>
		<input type="email" name="email" placeholder="email" required/><br>
		<input type="text" name="address1" placeholder="street address" required/><br>
		<input type="text" name="address2" placeholder="street address 2(optional)"/><br>
	</div>
		<div id="smallContent" class="row">
			<div class="col-sm-4">
				<input type="text" name="city" placeholder="city" required/>
			</div>
			<div class="col-sm-4">
				<input type="text" maxlength="4" name="postcode" placeholder="postcode" required/>
			</div>
			<div class="col-sm-4">
				<select id="state" name="state"> 
					<option value="default" selected="selected">State</option>
					<option value="VIC">VIC</option> 
					<option value="QLD">QLD</option>
					<option value="NSW">NSW</option> 
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="WA">WA</option>	
				</select>
			</div>
		</div>
		<input type="submit" name="submit" value="Register"/><br/>
	</form> 
</div>

<?php include "./footer.php" ?>
</body>
</html>