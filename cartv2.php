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
    
$page_title= "Shopping Cart V2";
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
    <h2>My shopping cart</h2>
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
                                </tr>
                                
                                ";
                        }
                    }
                    
                ?>
                
            </tbody>
            </table>
            <a href='checkout.php'><button class='btn btn-outline-secondary checkoutButton'>Proceed to Checkout</button></a>
    </div>
    </div>
</div>
<?php include "./footer.php"?>
</body>
</html>