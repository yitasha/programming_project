<?php
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);

        #register value from form inputs
        $userid = $_SESSION['userid'];

        //fileupload
        $imgname = $_FILES['image']['name']; //define name from img -> name
        $location = $_FILES['image']['tmp_name']; //store in tmp location and move later
        
        $statement = $db->prepare("UPDATE user SET profilepic = '$imgname' where userid = '$userid'");

        if(isset($imgname) && $statement->execute())
        {
            //sleep(1); //Give it buffer 1 second
            //Move uploaded image to google bucket: profileimg
            move_uploaded_file($location, 'g s://profileimg/'. $imgname);    
        }
        else
        {
            print "<script type='text/javascript'>
            alert('Action failed, try again later');
            window.location.href = 'myProfilePage.php';
            </script>";
        }
            print "<script type='text/javascript'>
            alert('Updated, please refresh!');
            window.location.href = 'myProfilePage.php';
            </script>";
?>

		