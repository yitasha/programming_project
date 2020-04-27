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
    <input type='text' id='username' name='username' value='$username - User Name Can Not Be Changed ' placeholder='Username' readonly><br>
		<input type='password' id='pass' name='password' value='$password' placeholder='Password' minlength='6' required><br>
		<input type='text' name='firstname' value='$firstname' placeholder='first name'required/><br>
		<input type='text' name='lastname' value='$lastname' placeholder='last name'required/><br>
		<input type='text' name='phone' maxlength='10' value='$phone'  placeholder='phone number' required/><br>
		<input type='email' name='email' value='$email' placeholder='email' required/><br>
		<input type='text' name='address1' value='$address1' placeholder='street address' required/><br>
		<input type='text' name='address2' value='$address2' placeholder='street address 2(optional)'/><br>
        
        </div>
            <div id='smallContent' class='row'>
                <div class='col-sm-4'>
                    <input type='text' name='city' value='Null' placeholder='city' required/>
                </div>
                <div class='col-sm-4'>
                    <input type='text' maxlength='4' value='$postcode' name='postcode' placeholder='postcode' required/>
                </div>
                <div class='col-sm-4'>
                    <select id='state' name='state'> 
                        <option value='default' selected='selected'>$state</option>
                        <option value='VIC'>VIC</option> 
                        <option value='QLD'>QLD</option>
                        <option value='NSW'>NSW</option> 
                        <option value='SA'>SA</option>
                        <option value='TAS'>TAS</option>
                        <option value='WA'>WA</option>	
                    </select>
                </div>
            </div>
		<input type="submit" name="submit" value="Register"/><br/>
	</form> 
</div>

<?php include "./footer.php" ?>
</body>
</html>