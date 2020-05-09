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
        $GetUserN = $_GET['userName']; #Parsed from myProfilePage.php button url variable

        #Step 2 security check if Admin exist or
        #Step 3 security check if SESSION username == URL Variable username to verify it's the correct user
        if(isset($admin) or ($username == $GetUserN))
        {
            //Deleting
            $statement = $db->prepare("DELETE FROM user where userid = '$GetUserID'");
            
            if($statement->execute())
            {
                print "<script type='text/javascript'>
                alert('User account have deleted,Good bye $GetUserN');
                window.location.href = 'index.php';
                </script>";
                if(isset($username))
                {
                    //Remove and Destroy session
                    session_unset();
                    session_destroy();
                }
            }
            else
            {
                print "<script type='text/javascript'>
                alert('Error, deletion failed with: $username');
                window.location.href = 'myProfilePage.php';
                </script>";
            }
        }
        else
        {
            print "<script type='text/javascript'>
            alert('Error, deletion failed with: $username');
            window.location.href = 'myProfilePage.php';
            </script>";
        }
        
		
?>