<?php
session_start();
    #Check if username is active by detecting SESSION variable
    $username = $_SESSION['username'];
	if(!isset($username))
	{
		print "<script type='text/javascript'>
		alert('You have not logged in!');
		window.location.href = 'login.php';
	    </script>";
    }
    
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
    <div class="row">
    <h2>Cart</h2>
     <!-- Cart Items listing area  -->
     <div id='cart'>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="60%">ITEM</th>
                    <th scope="col" width="20%">PRICE</th>
                    <th scope="col" width="20%">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($_SESSION['compcart'] as $item)
                    {
                        #Fetch computer table
                        $statement = $db->prepare("select * from computer where computerid = '$item'");
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        while ($r = $statement->fetch())
                        {
                            print "<tr>
                                <th scope='row'>
                                <img src='https://storage.googleapis.com/computerimg/{$r['images']}' class='responsive' style='width:auto;max-height:70px; display:inline' alt='product pic'>
                                <div>
                                    <h3 style='display:inline'>{$r['pcname']}</h3>
                                    <p>{$r['pctype']}, {$r['pccond']}, {$r['pcbrand']}</p>
                                </div>
                                </th>
                                <td><h4>$ {$r['price']}</h4></td>
                                <td><h4>$ {$r['price']}</h4></td>
                                </tr>";
                        }
                    }
                ?>
                
            </tbody>
            </table>
    </div>
    </div>
</div>
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
                $address1 = $row['address1'];
                $address2 = $row['address2'];
                $postcode = $row['postcode'];
                $state = $row['state'];
                $city = $row['city'];
            }

            print "
            
            <h3>Shipping Address</h3>
            <br>
            <p>$firstname $lastname,</p>
            <p>$address1,</p>
            <p>$address2,</p>
            <p>$city,</p>
            <p>$state,</p>
            <p>$postcode</p>
            
            "
?>
    <div class="checkoutContainer">
            <h3>Payment</h3>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <form action="process_checkout.php" method="post">
            <label for="nameoncard">Name on Card</label>
            <input type="text" id="nameoncard" name="nameoncard" required>
            <label for="cardno">Credit card number</label>
            <input type="text" id="cardno" name="cardno" required>
            <label for="expirydate">Exp Month</label>
            <input type="text" id="expirydate" name="expirydate" placeholder="MM/YY" required>
            <br>
            <input type="submit" value="Place Order" class="btn">
            </form>


<?php include "./footer.php"?>
</body>
</html>