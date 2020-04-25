<?php

session_start();
if (isset($_GET['user'])) 
{
<<<<<<< HEAD
	  $user = $_GET['user'];
	  $get_user = $mysqli->query("SELECT * FROM user WHERE username = '$user'");
	  $user_data = $get_user->fetch_assoc();
    } else {
	   header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
	<body>        <a href="index.php">Home</a> | Back to <a href="viewprofile.php?user=<?php echo $user_data['username'] ?>"><?php echo $user_data['username'] ?></a>'s Profile        
		<h3>Edit Profile Information</h3> 
		       <form method="post" action="process_editprofile.php?user=<?php echo $user_data['username'] ?>">            			<label>Name:</label><br> 
			         <label>first name</label><br>
                    <input type="text" name="firstname" value="<?php echo $user_data['firstname'] ?>" /><br>
                    <label>last name</label><br>
                    <input type="text" name="lastname" value="<?php echo $user_data['lastname'] ?>" /><br>  
			         <label>phone number</label><br>
			         <input type="text" name="phone" value="<?php echo $user_data['phone'] ?>" /><br> 
			         <label>address 1</label><br> 
			         <input type="text" name="address1" value="<?php echo $user_data['address1'] ?>" /><br>
			         <label>address 2</label><br>          
			         <input type="text" name="address2" value="<?php echo $user_data['address2'] ?>" /><br>
                    <label>city</label><br>          
			         <input type="text" name="city" value="<?php echo $user_data['city'] ?>" /><br>
                    <label>postcode</label><br>          
			         <input type="text" name="postcode" value="<?php echo $user_data['postcode'] ?>" /><br>
                    <label>state</label><br>          
			         <input type="text" name="state" value="<?php echo $user_data['state'] ?>" /><br>
            <br>  
			         <input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
=======
	  $user = $_GET['user'];
	  $get_user = $mysqli->query("SELECT * FROM user WHERE username = '$user'");
	  $user_data = $get_user->fetch_assoc();
    } else {
	   header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
	<body>        <a href="index.php">Home</a> | Back to <a href="viewprofile.php?user=<?php echo $user_data['username'] ?>"><?php echo $user_data['username'] ?></a>'s Profile        
		<h3>Edit Profile Information</h3> 
		       <form method="post" action="process_editprofile.php?user=<?php echo $user_data['username'] ?>">            			<label>Name:</label><br> 
			         <label>first name</label><br>
                    <input type="text" name="firstname" value="<?php echo $user_data['firstname'] ?>" /><br>
                    <label>last name</label><br>
                    <input type="text" name="lastname" value="<?php echo $user_data['lastname'] ?>" /><br>  
			         <label>phone number</label><br>
			         <input type="text" name="phone" value="<?php echo $user_data['phone'] ?>" /><br> 
			         <label>address 1</label><br> 
			         <input type="text" name="address1" value="<?php echo $user_data['address1'] ?>" /><br>
			         <label>address 2</label><br>          
			         <input type="text" name="address2" value="<?php echo $user_data['address2'] ?>" /><br>
                    <label>city</label><br>          
			         <input type="text" name="city" value="<?php echo $user_data['city'] ?>" /><br>
                    <label>postcode</label><br>          
			         <input type="text" name="postcode" value="<?php echo $user_data['postcode'] ?>" /><br>
                    <label>state</label><br>          
			         <input type="text" name="state" value="<?php echo $user_data['state'] ?>" /><br>
            <br>  
			         <input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
>>>>>>> 99b81e5c3180b7bd1cb6a21fadf02623920022aa
	</body>
</html>