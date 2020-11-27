<?php 
session_start();
$page_title= "Update Profile";

# [START use_cloud_storage_tools] So images cant be retrieved from bucket
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

	// Instantiate your DB using the database host, port, name, username, and password
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');

    //DB connection
    $db = new PDO($dsn, $user, $pw);

include "./header.php"; 
include "./navbar.php";
?>

<div class="registerContainer">
	<h2>Update Profile</h2>
    <h3>Edit the fields if you need to change</h3>
	<div class="row">
	<form action="process_updateUser.php" method="post">
    <?php
        $SeshUserID = $_SESSION['userid']; #userID from SESSION stored during Login
        $GetUserID = $_GET['userID']; #Parsed from myProfilePage.php button url variable
        $GetUserN = $_GET['userName']; #Parsed from myProfilePage.php button url variable

        if($SeshUserID != $GetUserID) #If the active userID is not == the userID from url,then it's not same user.
        {
            print "<script type='text/javascript'>
			alert('Error, something is wrong, try again later!');
			window.location.href = 'index.php';
	        </script>";
        }

        #Fetch user table
        $userdata = $db->prepare("select * from user where userid = '$GetUserID' and username = '$GetUserN'");
        $userdata->execute();
        $rows = $userdata->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row)
        {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $postcode = $row['postcode'];
            $state = $row['state'];
            $city = $row['city'];
            $username = $row['username'];
            $password = $row['password'];
        }
        
        print "<input type='text' id='username' name='username' value='User Name: $username Can Not Be Changed ' placeholder='Username' readonly><br>
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
                    <input type='text' name='city' value='$city' placeholder='city' required/>
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
            </div>";
        ?>
        <input type="submit" name="submit" value="Update Profile"/><br/>
	</form> 
</div>

<?php include "./footer.php" ?>
</body>
</html>