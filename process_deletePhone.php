<?php
session_start();
    #Step 1 security check if user or admin is not detected, do not process.
    $username = $_SESSION['username'];
    $admin = $_SESSION['adminName'];
	if((!isset($username)) or (!isset($admin)))
	{
		print "<script type='text/javascript'>
		alert('You don't have permission!');
		window.location.href = 'index.php';
	    </script>";
	}

# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);

		#update value from form URL inputs
		$GetUserID = $_GET['userID']; #Parsed from myProfilePage.php button url variable
        $GetProdID = $_GET['prodID']; #Parsed from myProfilePage.php button url variable

        //Deleting
        $statement = $db->prepare("DELETE FROM phone WHERE user_userid = '$GetUserID' AND phoneid = '$GetProdID'");
            
        if($statement->execute())
        {
            print "<script type='text/javascript'>
            window.location.href = 'adminIndex.php#Phones';
            </script>";
        }
        else
        {
            print "<script type='text/javascript'>
            alert('Error, product deletion failed with ID: $GetProdID');
            window.location.href = 'adminIndex.php#Phones';
            </script>";
        }
?>