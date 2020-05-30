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

  include "./header.php"; #Cart arrays stored in header.php
  include "./navbar.php";
?>

<div class="container">
    <div class="row">
    <?php
      #This page is for redirect to individual Phone product
      $productID = $_GET['productID'];#productID from url variables
      $userID = $_GET['userID'];#userID from url variables

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
        $city = $row['city'];
        $profilepic = $row['profilepic'];
      }

      #Fetch phone table
      $statement = $db->prepare("select * from phone where phoneid = '$productID'");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      
      while ($r = $statement->fetch())
      {
        if(isset($_POST['add'])) #Check if this item has been added to cart
        {
          if(in_array($r['phoneid'], $_SESSION['phonecart'])){
            echo "<h4 style='color:red'>Item is already in cart!</h4>";
          }
          else{
            array_push($_SESSION['phonecart'], $r['phoneid']);
            echo "<h4 style='color:red'>This item have been added successfully!</h4>";
          }
        }

          print "
            <div class='col-md-6'>
                <h4 style='margin-bottom:50px;'>{$r['phonename']}   -   $ {$r['price']}</h4>
                <img src='https://storage.googleapis.com/phoneimg/{$r['images']}' class='responsive' style='width:auto;height:200px' alt='product pic'>
            </div>
            
            <div class='col-md-6 sellerProfile d-flex justify-content-center'>

                  <img src='https://storage.googleapis.com/profileimg/$profilepic' style='width:20rem;height:auto' alt='user profile pic'>
                  <h4>$firstname $lastname</h4>
                  <h5>Phone: $phone</h5>
                  <h5>Email: $email</h5>
                  <h5>Location: $city</h5></br>
                  <form method='POST'>
                    <button type='submit' class='btn btn-primary' name='add' >Add to Cart</button>
                  </form>
                  <a href='contactUser.php'><button class='btn btn-outline-secondary productPageButton'>Contact User</button></a>

                  <?php echo $status; ?>
            </div>
            </div>

            <div class='row'>
                <ul class='nav nav-tabs'>
                  <li class='active'><a data-toggle='tab' href='#description'>Description</a></li>
                  <li><a data-toggle='tab' href='#specs'>Specifications</a></li>
                </ul>

                <div class='tab-content'>
                    <div id='description' class='tab-pane fade in active'>
                      <p><br>{$r['description']}</p>
                    </div>
                    <div id='specs' class='tab-pane fade'>
                    <br>
                    <table class='table table-bordered table-sm' style='width:60%'>
                    <tbody>
                      <tr>
                        <th scope='row'>Brand:</th>
                        <td>{$r['brand']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Condition:</th>
                        <td>{$r['phonecond']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Model:</th>
                        <td>{$r['model']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Operating System:</th>
                        <td>{$r['phoneos']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Camera:</th>
                        <td>{$r['phonecam']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Screen Size:</th>
                        <td>{$r['phonescreen']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Storage:</th>
                        <td>{$r['phonestorage']} GB</td>
                      </tr>
                      <tr>
                        <th scope='row'>Memory:</th>
                        <td>{$r['phonemem']} GB</td>
                      </tr>
                      <tr>
                        <th scope='row'>Color:</th>
                        <td>{$r['phonecol']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Price:</th>
                        <td>$ {$r['price']}</td>
                      </tr>
                    </tbody>
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