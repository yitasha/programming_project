<?php 
session_start();
    #Check if admin have logged in by detect SESSION variable
    $admin = $_SESSION['adminName'];
	if(!isset($admin))
	{
		print "<script type='text/javascript'>
		alert('Admin you have not logged in!');
		window.location.href = 'index.php';
	    </script>";
    }
$page_title= "Admin Panel";

include "./header.php"; 
include "./navbar.php";
?>

<h1>This is Admin Home Page</h1>
<h1>Your current username is: <?php echo $_SESSION['adminName'] ?></h1>


</body>
</html>