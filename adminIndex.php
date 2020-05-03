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
<?php 
            #Check if username exists in session and update navbar li property
            if(isset($_SESSION['adminName']) && !empty($_SESSION['adminName']) )
            {
              $admin = $_SESSION['adminName'];
              echo "<h3>Admin: $admin</h3>";
            }
?>
<div class='row'>
    <ul class='nav nav-tabs'>
        <li class='active'><a data-toggle='tab' href='#Account'>User Accounts</a></li>
        <li><a data-toggle='tab' href='#Orders'>Orders and Transactions</a></li>
    </ul>
	<div class='tab-content'>
        <!-- User Accounts area -->
    	<div id='Account' class='tab-pane fade in active'>
			<table class="table">
            <thead>
                <tr>
                    <th scope="row">Name</th>
                    <th scope="row">Phone</th>
                    <th scope="row">Email</th>
                    <th scope="row">Address 1</th>
                    <th scope="row">Address 2</th>
                </tr>
            </thead>
            <tbody>
			<?php
            #Fetch user table
            $userdata = $db->prepare("select * from user");
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
			print "
				<tr>
				<td>$firstname $lastname</td>
				<td>$phone</td>
				<td>$email</td>
				<td>$address1</td>
				<td>$address2</td>
				<td><a href=''>Delete</a></td>
				</tr>";
        	?>
		</div>
		
		<div id='Orders' class='tab-pane fade'>
		</div>

</div>
</div>

<?php include "./footer.php"?>
</body>
</html>