<?php
session_start(); 
$page_title= "productListPage";
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

<div class="container">

<h2>My Profile</h2></br></br>

<div class='row'>
    <ul class='nav nav-tabs'>
        <li class='active'><a data-toggle='tab' href='#Account'>Account</a></li>
        <li><a data-toggle='tab' href='#Products_Sold'>Products Sold</a></li>
    </ul>

    <div class='tab-content'>
        <div id='Account' class='tab-pane fade in active'>
            </div>
        <div id='Products_Sold' class='tab-pane fade'>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                        <td>A234DFG21!Z</td>
                        <td>Iphone XS</td>
                        <td><a href="editSellPhone.php">Edit</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td>XZLKXJ32LK1</td>
                        <td>Alienware all in one</td>
                        <td><a href="editSellComputer.php">Edit</a></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
	<?php include "./footer.php"?>
</body>
</html>