<?php 
session_start();
$page_title= "Admin Panel";

include "./header.php"; 
include "./navbar.php";
?>

<h1>This is Admin Home Page</h1>
<h1>Your current username is: <?php echo $_SESSION['adminName'] ?></h1>


</body>
</html>