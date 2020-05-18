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
                $profilepic = $row['profilepic'];
            }
            ### End of user data fetch ###
            print " <br><table class='table table-bordered' style='width:50%;'>
            <thead>
            </thead>
            <tbody>
              <tr>
                <th scope='row'>Profile Picture</th>
                <form action='process_profileimg.php' method='post' enctype='multipart/form-data'>
                  <td><img class='myAvatar' type='image' src='https://storage.googleapis.com/profileimg/$profilepic' style='height:200px'>
                  <br>
                  <input type='file' name='image' id='newAvatar' style='display:none;' class='form-control-file'>
                  <div style='padding-top: 20px'>
                  <button type='submit' class='btn btn-primary' style='width:200px'>Update Profile Picture</button>
                  </div>
                  </form>
                </td>
                  <script>
                  $('.myAvatar').click(function() {
                      $('#newAvatar').trigger('click');
                  });
                  </script>
              </tr>
              <tr>
                <th scope='row'>UserName</th>
                <td>$username</td>
              </tr>
              <tr>
                <th scope='row'>Full Name</th>
                <td>$firstname $lastname</td>
              </tr>
              <tr>
                <th scope='row'>Phone</th>
                <td colspan='2'>$phone</td>
              </tr>
              <tr>
                <th scope='row'>Email</th>
                <td colspan='2'>$email</td>
              </tr>
              <tr>
                <th scope='row'>Address 1</th>
                <td colspan='2'>$address1</td>
              </tr>
              <tr>
                <th scope='row'>Adress 2</th>
                <td colspan='2'>$address2</td>
              </tr>
              <tr>
                <th scope='row'>PostCode</th>
                <td colspan='2'>$postcode</td>
              </tr>
              <tr>
                <th scope='row'>State</th>
                <td colspan='2'>$state</td>
              </tr>
            </tbody>
          </table>
                <br>
                <a class='btn btn-primary' href='process_deleteUser.php?userID=$userID&userName=$username' role='button'>Delete Account</a>
                <a class='btn btn-info' href='updateUser.php?userID=$userID&userName=$username' role='button'>Edit Profile</a>";
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