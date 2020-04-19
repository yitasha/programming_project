<?php
session_start(); 
$page_title= "productPage";
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
    <?php
      $productID = $_GET['productID'];
		
      $statement = $db->prepare("select * from computer where computerid = '$productID'");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      while ($r = $statement->fetch())
      {
          print "
            <div class='col-md-6'>
                <h2>{$r['pcname']}   -   $ {$r['price']}</h2>
                <img src='https://storage.googleapis.com/computerimg/{$r['images']}' class='responsive' style='width:600px;height:600px' alt='product pic'>
            </div>

            <div class='col-md-6 sellerProfile d-flex justify-content-center'>
                  <img src='imgs/sellerOne.jpg' style='width:20rem;height:auto' alt='user profile pic'>
                  <h5>Seller One</h5></br>
                  <button type='button' class='btn btn-primary productPageButtonSell'>Buy</button>
                  <button type='button' class='btn btn-outline-secondary productPageButton'>Contact Seller</button>
            </div>
            </div>

            <div class='row'>
                <ul class='nav nav-tabs'>
                  <li class='active'><a data-toggle='tab' href='#description'>Description</a></li>
                  <li><a data-toggle='tab' href='#specs'>Specifications</a></li>
                </ul>

                <div class='tab-content'>
                    <div id='description' class='tab-pane fade in active'>
                      <p><br><strong>{$r['description']}</strong></p>
                    </div>
                    <div id='specs' class='tab-pane fade'>
                    <br>
                    <table style='width:80%' >
                      <tr>
                        <th>Computer Type</th>
                        <th>{$r['pctype']}</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                        <th>Condition</th>
                        <th>{$r['pccond']}</th>
                      </tr>
                      <tr>
                        <th>Brand</th>
                        <th>{$r['pcbrand']}</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                        <th>Operating System</th>
                        <th>{$r['pcos']}</th>
                      </tr>
                      <tr>
                        <th>CPU</th>
                        <th>{$r['pccpu']}</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                        <th>Graphics Card</th>
                        <th>{$r['pcgpu']}</th>
                      </tr>
                      <tr>
                        <th>Storage</th>
                        <th>{$r['pcstorage']} GB</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                        <th>RAM</th>
                        <th>{$r['pcram']} GB</th>
                      </tr>
                      <tr>
                        <th>Color</th>
                        <th>{$r['pccolor']}</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                        <th>Price</th>
                        <th>$ {$r['price']}</th>
                      </tr>
                    </table>
                    </div>
                </div>
            </div>
          ";
      }
    ?>
    </div>
</div>
	<?php include "./footer.php"?>
</body>
</html>