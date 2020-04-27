<?php
session_start(); 

$page_title= "User Profile";
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
        <li><a data-toggle='tab' href='#Listing'>Listing</a></li>
    </ul>

    <div class='tab-content'>
        <!-- User information area -->
        <div id='Account' class='tab-pane fade in active'>
        <?php
            $userID = $_SESSION['userid']; #userID from SESSION stored during Login

            #Fetch user table
            $userdata = $db->prepare("select * from user where userid = '$userID'");
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
                $username = $row['username'];
            }
            ### End of user data fetch ###
            print "<h3>Username: $username </h3>
                <h3>Full Name: $firstname $lastname</h3>
                <h3>Phone: $phone</h3>
                <h3>Email: $email</h3>
                <h3>Address 1: $address1</h3>
                <h3>Address 2: $address2</h3>
                <h3>Postcode: $postcode</h3>
                <h3>State: $state</h3>
                <br>
                <button type='button' href='deleteuser.php' class='btn btn-primary deleteButton'>Delete Account</button>
                  <button type='button' href='updateuser.php' class='btn btn-outline-secondary editButton'>Edit Profile</button>";
        ?>
        </div>

        <!-- Products listing area  -->
        <div id='Listing' class='tab-pane fade'>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                #Listing Computers by rows
                $comp = $db->prepare("select * from computer where user_userid = '$userID'");
                $comp->execute();
                $comp->setFetchMode(PDO::FETCH_ASSOC);
                while ($r = $comp->fetch()) 
                {
                print "<tr>
                    <th scope='row'>Computer</th>
                    <td>{$r['computerid']}</td>
                    <td>{$r['pcname']}</td>
                    <td>$ {$r['price']}</td>
                    <td><a href='editSellComputer.php?productID={$r['computerid']}'>Edit</a></td>
                    </tr>";
                }
                
                #Listing Phones by rows
                $phone = $db->prepare("select * from phone where user_userid = '$userID'");
                $phone->execute();
                $phone->setFetchMode(PDO::FETCH_ASSOC);
                while ($r = $phone->fetch()) 
                {
                print "<tr>
                    <th scope='row'>Phone</th>
                    <td>{$r['phoneid']}</td>
                    <td>{$r['phonename']}</td>
                    <td>$ {$r['price']}</td>
                    <td><a href='editSellPhone.php?productID={$r['phoneid']}'>Edit</a></td>
                    </tr>";
                }
                ?>
            </tbody>
            </table>
        </div>
        <!-- </div> End of products listing area -->
</div>
</div>
	<?php include "./footer.php"?>
</body>
</html>