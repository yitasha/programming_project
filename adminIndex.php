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
<h1 style="text-align: center"><?php echo "Welcome: Admin $admin"; ?></h1>

<div class='row'>
    <ul class='nav nav-tabs'>
        <li class='active'><a data-toggle='tab' href='#Account'>User Accounts</a></li>
        <li><a data-toggle='tab' href='#Computers'>Computers Listing</a></li>
        <li><a data-toggle='tab' href='#Phones'>Phones Listing</a></li>
    </ul>

	<div class='tab-content'>
        <!-- User Accounts area -->
    	<div id='Account' class='tab-pane fade in active'>
			<table class="table">
            <thead>
                <tr>
                    <th scope="row">User ID</th>
                    <th scope="row">Username</th>
                    <th scope="row">Name</th>
                    <th scope="row">Phone</th>
                    <th scope="row">Email</th>
                    <th scope="row">Address 1</th>
                    <th scope="row">Address 2</th>
                    <th scope="row">City</th>
                </tr>
            </thead>

            <tbody>
                <?php
                #Fetch user table
                $userdata = $db->prepare("SELECT * FROM user");
                $userdata->execute();
                $userdata->setFetchMode(PDO::FETCH_ASSOC);

                while($row = $userdata->fetch())
                {
                    $userid = $row['userid'];
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

                    ### End of user data fetch ###
                    print "
                    <tr>
                    <td>$userid</td>
                    <td>$username</td>
                    <td>$firstname $lastname</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$address1</td>
                    <td>$address2</td>
                    <td>$city</td>
                    <td><a href='process_deleteUser.php?userID=$userid&userName=$username'>Delete</a></td>
                    </tr>";
                }
                ?>
            </tbody>
            </table>
		</div>
		 <!-- Computer listing area -->
		<div id='Computers' class='tab-pane fade'>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="row">Computer ID</th>
                    <th scope="row">Name</th>
                    <th scope="row">Type</th>
                    <th scope="row">Condition</th>
                    <th scope="row">Brand</th>
                    <th scope="row">Price</th>
                    <th scope="row">User ID</th>
                    <th scope="row">User Name</th>
                    <th scope="row">Full Name</th>
                    <th scope="row">Phone</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    #Fetch computer and user table
                    $pcdata = $db->prepare("SELECT c.computerid, c.pcname, c.pctype, c.pccond, c.pcbrand, c.price, u.userid, u.username, u.firstname, u.lastname, u.phone FROM computer c, user u WHERE c.user_userid = u.userid");
                    $pcdata->execute();
                    $pcdata->setFetchMode(PDO::FETCH_ASSOC);

                    while($row = $pcdata->fetch())
                    {
                        
                        $computerid = $row['computerid'];
                        $pcname = $row['pcname'];
                        $pctype = $row['pctype'];
                        $pccond = $row['pccond'];
                        $price = $row['price'];
                        $pcbrand = $row['pcbrand'];
                        $userid = $row['userid'];
                        $username = $row['username'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $phone = $row['phone'];

                        ### End of user data fetch ###
                        print "
                        <tr>
                        <td>$computerid</td>
                        <td>$pcname</td>
                        <td>$pctype</td>
                        <td>$pccond</td>
                        <td>$pcbrand</td>
                        <td>$ $price</td>
                        <td>$userid</td>
                        <td>$username</td>
                        <td>$firstname $lastname</td>
                        <td>$phone</td>
                        <td><a href='process_deleteComputer.php?userID=$userid&prodID=$computerid'>Delete</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
		</div>
        <!-- Phone listing area -->
        <div id='Phones' class='tab-pane fade'>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="row">Phone ID</th>
                    <th scope="row">Name</th>
                    <th scope="row">Model</th>
                    <th scope="row">Condition</th>
                    <th scope="row">Brand</th>
                    <th scope="row">Price</th>
                    <th scope="row">User ID</th>
                    <th scope="row">User Name</th>
                    <th scope="row">Full Name</th>
                    <th scope="row">Phone</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    #Fetch computer and user table
                    $pcdata = $db->prepare("SELECT p.phoneid, p.phonename, p.model, p.phonecond, p.brand, p.price, u.userid, u.username, u.firstname, u.lastname, u.phone FROM phone p, user u WHERE p.user_userid = u.userid");
                    $pcdata->execute();
                    $pcdata->setFetchMode(PDO::FETCH_ASSOC);

                    while($row = $pcdata->fetch())
                    {
                        
                        $phoneid = $row['phoneid'];
                        $phonename = $row['phonename'];
                        $model = $row['model'];
                        $phonecond = $row['phonecond'];
                        $price = $row['price'];
                        $brand = $row['brand'];
                        $userid = $row['userid'];
                        $username = $row['username'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $phone = $row['phone'];

                        ### End of user data fetch ###
                        print "
                        <tr>
                        <td>$phoneid</td>
                        <td>$phonename</td>
                        <td>$model</td>
                        <td>$phonecond</td>
                        <td>$brand</td>
                        <td>$ $price</td>
                        <td>$userid</td>
                        <td>$username</td>
                        <td>$firstname $lastname</td>
                        <td>$phone</td>
                        <td><a href='process_deletePhone.php?userID=$userid&prodID=$phoneid'>Delete</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- Closing for div Row -->
</div> <!-- Closing for container -->
<?php include "./footer.php"?>
</body>
</html>