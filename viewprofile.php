<?php 

    session_start();
    if (isset($_GET['user']))
    {
        $user = $_GET['user'];
        $get_user = $mysqli->query("SELECT * FROM user WHERE username = '$user'");
    if ($get_user->num_rows == 1)
    {
        $profile_data = $get_user->fetch_assoc();  
    }
        
    } 
?>
<!DOCTYPE html>
<html>    
<head>        
	<meta charset="UTF-8">
	        <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
    <a href="index.php">Home</a> | <?php echo $profile_data['username'] ?>'s Profile        
    <h3>Personal Information | <?php            $visitor = $_SESSION['username'];
           if ($user == $visitor)
{ ?>            <a href="editprofile.php?user=<?php echo $profile_data['username'] ?>">Edit Profile</a>            <?php
}
        ?>        </h3>        
        <table>
                    <tr>                
                    	<td>first name</td><td><?php echo $profile_data['firstname'] ?></td>   
                    </tr>
                    <tr>                
                    	<td>last name</td><td><?php echo $profile_data['lastname'] ?></td> 
                    </tr> 
                    <tr>
                        <td>phone number</td><td><?php echo $profile_data['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>address 1</td><td><?php echo $profile_data['address1'] ?></td> 
                    </tr>
                    <tr>
                        <td>address 2</td><td><?php echo $profile_data['address2'] ?></td> 
                    </tr> 
                    <tr>
                        <td>city</td><td><?php echo $profile_data['city'] ?></td> 
                    </tr>
                    <tr>
                        <td>postcode</td><td><?php echo $profile_data['postcode'] ?></td> 
                    </tr>
                    <tr>
                        <td>state</td><td><?php echo $profile_data['state'] ?></td> 
                    </tr>          
        </table> 
    </body>
</html> 
?>