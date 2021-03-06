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
      #This page is for redirect to individual Computer product
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
        $profilepic = $row['profilepic'];
        $city = $row['city'];
      }

		  #Fetch computer table
      $statement = $db->prepare("select * from computer where computerid = '$productID'");
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);

    
      while ($r = $statement->fetch())
      {
        if(isset($_POST['add'])) #Check if this item has been added to cart
        {
          if(in_array($r['computerid'], $_SESSION['compcart'])){
            echo "<h4 style='color:red'>Item is already in cart!</h4>";
          }
          else{
            array_push($_SESSION['compcart'], $r['computerid']);
            echo "<h4 style='color:red'>This item have been added successfully!</h4>";
          }
        }

          print "
            <div class='col-md-6'>
                <h4 style='margin-bottom:50px;'>{$r['pcname']}   -   $ {$r['price']}</h4>
                <img src='https://storage.googleapis.com/computerimg/{$r['images']}' class='responsive' style='width:auto;max-height:400px' alt='product pic'>
            </div>

            <div class='col-md-6 sellerProfile d-flex justify-content-center'>
                  <img src='https://storage.googleapis.com/profileimg/$profilepic' style='width:20rem;height:auto' alt='user profile pic'>
                  <h4>$firstname $lastname</h4>
                  <h5>Phone: $phone</h5>
                  <h5>Email: $email</h5>
                  <h5>Location: $city</h5>
                  </br>
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
                        <th scope='row'>Computer Type:</th>
                        <td>{$r['pctype']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Condition</th>
                        <td>{$r['pccond']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Brand:</th>
                        <td>{$r['pcbrand']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Operating System:</th>
                        <td>{$r['pcos']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>CPU:</th>
                        <td>{$r['pccpu']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Graphics Card:</th>
                        <td>{$r['pcgpu']}</td>
                      </tr>
                      <tr>
                        <th scope='row'>Storage:</th>
                        <td>{$r['pcstorage']} GB</td>
                      </tr>
                      <tr>
                        <th scope='row'>RAM:</th>
                        <td>{$r['pcram']} GB</td>
                      </tr>
                      <tr>
                        <th scope='row'>Color:</th>
                        <td>{$r['pccolor']}</td>
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