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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST['compremove'])) #Remove from compcart
                    {
                        if(in_array($_POST['id'], $_SESSION['compcart'])){
                            if(($key = array_search($_POST['id'], $_SESSION['compcart'])) !== false)
                            {
                                unset($_SESSION['compcart'][$key]);
                            }
                        }
                        else{
                            echo "<h4 style='color:red'>Error!</h4>";
                        }
                    }
                    if(isset($_POST['phoneremove'])) #Remove from phonecart
                    {
                        if(in_array($_POST['id'], $_SESSION['phonecart'])){
                            if(($key = array_search($_POST['id'], $_SESSION['phonecart'])) !== false)
                            {
                                unset($_SESSION['phonecart'][$key]);
                            }
                        }
                        else{
                            echo "<h4 style='color:red'>Error!</h4>";
                        }
                    }

                    foreach($_SESSION['compcart'] as $item)
                    {
                        #Fetch computer table
                        $statement = $db->prepare("SELECT * FROM computer WHERE computerid = '$item'");
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
                                <td>
                                    <form method='POST'>
                                        <input type='hidden' name='id' value='$item' />
                                        <button type='submit' class='btn btn-danger' name='compremove' >Remove</button>
                                    </form> 
                                </td>
                                </tr>
                                ";
                        }
                    }

                    foreach($_SESSION['phonecart'] as $item)
                    {
                        #Fetch phone table
                        $statement = $db->prepare("SELECT * FROM phone WHERE phoneid = '$item'");
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        while ($r = $statement->fetch())
                        {
                            print "<tr>
                                <th scope='row'>
                                <img src='https://storage.googleapis.com/phoneimg/{$r['images']}' class='responsive' style='width:auto;max-height:70px; display:inline' alt='product pic'>
                                <div>
                                    <h3 style='display:inline'>{$r['phonename']}</h3>
                                    <p>{$r['model']}, {$r['phonecond']}, {$r['brand']}</p>
                                </div>
                                </th>
                                <td><h4>$ {$r['price']}</h4></td>
                                <td><h4>$ {$r['price']}</h4></td>
                                <td>
                                    <form method='POST'>
                                        <input type='hidden' name='id' value='$item' />
                                        <button type='submit' class='btn btn-danger' name='phoneremove' >Remove</button>
                                    </form> 
                                </td>
                                </tr>
                                ";
                        }
                    }
                    
                ?>
                
            </tbody>
            </table>
            <a href='checkout.php'><button class='btn btn-success'>Proceed to Checkout</button></a>
    </div>
    </div>
</div>
<?php include "./footer.php"?>
</body>
</html>