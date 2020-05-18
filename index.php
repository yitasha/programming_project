<?php
session_start(); 
$page_title= "Home";
# [START use_cloud_storage_tools] So images cant be retrieved from bucket
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

	// Instantiate your DB using the database host, port, name, username, and password
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');

    //DB connection
	$db = new PDO($dsn, $user, $pw);
	$userid = $_SESSION['userid'];
	$city = $_SESSION['city'];

include "./header.php"; 
include "./navbar.php";
?>


<!-- Search bar -->
<div class="headingContainer">
	<h1>Rocket Market</h1>
	<h5>buy, sell, and trade electronics<h5>
	<form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
	<i class="fas fa-search" aria-hidden="true"></i>
	<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="I am looking for"
		aria-label="Search">
		<button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
	</form>
</div>


<div class="container">
<!-- Top pics section -->
	<div class="row">
	<h3>Recommended</h3>
	<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<?php
			if(isset($userid))
			{
				$top1 = $db->prepare("SELECT * FROM computer WHERE user_userid IN (SELECT userid FROM user WHERE city = (SELECT city FROM user WHERE userid = '$userid')) ORDER BY computerid DESC LIMIT 0,1");
			}
			else
			{
				$top1 = $db->prepare("SELECT * FROM computer ORDER BY computerid DESC LIMIT 0,1");
			}
			
			$top1->execute();
			if($top1->rowCount() <= 0)
			{
				$top1 = $db->prepare("SELECT * FROM computer ORDER BY computerid DESC LIMIT 0,1");
			}
			$top1->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top1->fetch()) 
			{
			print "<a href='computerProduct.php?productID={$r['computerid']}&userID={$r['user_userid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' alt='productOne'>
				<div class='card-body'>
					<h5 class='card-title'>{$r['pcname']}</h5>
					<p class='card-text'>{$r['description']}</p>
					<p class='card-text'>$ {$r['price']}</p>
				</div>
			</div>
			</a>";
			}
			?>
		</div>

		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<?php
			if(isset($userid))
			{
				$top3 = $db->prepare("SELECT * FROM phone WHERE user_userid IN (SELECT userid FROM user WHERE city = (SELECT city FROM user WHERE userid = '$userid')) ORDER BY phoneid DESC LIMIT 0,1");
			}
			else
			{
				$top3 = $db->prepare("SELECT * FROM phone ORDER BY phoneid DESC LIMIT 0,1");
			}

			$top3->execute();
			if($top3->rowCount() <= 0)
			{
				$top3 = $db->prepare("SELECT * FROM phone ORDER BY phoneid DESC LIMIT 0,1");
			}
			$top3->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top3->fetch()) 
			{
			print "<a href='phoneProduct.php?productID={$r['phoneid']}&userID={$r['user_userid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}' alt='productOne'>
				<div class='card-body'>
					<h5 class='card-title'>{$r['phonename']}</h5>
					<p class='card-text'>{$r['description']}</p>
					<p class='card-text'>$ {$r['price']}</p>
				</div>
			</div>
			</a>";
			}
			?>
		</div>

		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<?php
			if(isset($userid))
			{
				$top2 = $db->prepare("SELECT * FROM computer WHERE user_userid IN (SELECT userid FROM user WHERE city = (SELECT city FROM user WHERE userid = '$userid')) ORDER BY computerid DESC LIMIT 1,1");
			}
			else
			{
				$top2 = $db->prepare("SELECT * FROM computer ORDER BY computerid DESC LIMIT 1,1");
			}

			$top2->execute();
			if($top2->rowCount() <= 0)
			{
				$top2 = $db->prepare("SELECT * FROM computer ORDER BY computerid DESC LIMIT 1,1");
			}

			$top2->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top2->fetch()) 
			{
			print "<a href='computerProduct.php?productID={$r['computerid']}&userID={$r['user_userid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' alt='productOne'>
				<div class='card-body'>
					<h5 class='card-title'>{$r['pcname']}</h5>
					<p class='card-text'>{$r['description']}</p>
					<p class='card-text'>$ {$r['price']}</p>
				</div>
			</div>
			</a>";
			}
			?>
		</div>
		
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<?php
			if(isset($userid))
			{
				$top4 = $db->prepare("SELECT * FROM phone WHERE user_userid IN (SELECT userid FROM user WHERE city = (SELECT city FROM user WHERE userid = '$userid')) ORDER BY phoneid DESC LIMIT 1,1");
			}
			else
			{
				$top4 = $db->prepare("SELECT * FROM phone ORDER BY phoneid DESC LIMIT 1,1");
			}

			$top4->execute();
			if($top4->rowCount() <= 0)
			{
				$top4 = $db->prepare("SELECT * FROM phone ORDER BY phoneid DESC LIMIT 1,1");
			}
			$top4->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top4->fetch()) 
			{
			print "<a href='phoneProduct.php?productID={$r['phoneid']}&userID={$r['user_userid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}'alt='productOne'>
				<div class='card-body'>
					<h5 class='card-title'>{$r['phonename']}</h5>
					<p class='card-text'>{$r['description']}</p>
					<p class='card-text'>$ {$r['price']}</p>
				</div>
			</div>
			</a>";
			}
			?>
		</div>
	</div>
	
<!-- Select latest 4 computer uploads and publish here -->
	<div class="row">
	<h3>Latest Computers</h3>
		<?php
			$computers = $db->prepare("select * from computer order by computerid desc limit 4");
			$computers->execute();
			$computers->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $computers->fetch()) 
			{
				print "<div class='col-sm-3'>
					<div class='card' style='width: 18rem;'>
					<a href='computerProduct.php?productID={$r['computerid']}&userID={$r['user_userid']}' class='fill-div'>
					<img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' alt='productOne'>
						<div class='card-body'>
							<h5 class='card-title'>{$r['pcname']}</h5>
							<p class='card-text'>{$r['description']}</p>
							<p class='card-text'>$ {$r['price']}</p>
						</div>
					</div>
					</a>
				</div>";
			}
		?>
	</div>
<!-- Select latest 4 phones uploads and publish here  -->
	<div class="row">
	<h3>Latest Phones</h3>
		<?php
			$phone = $db->prepare("select * from phone order by phoneid desc limit 4");
			$phone->execute();
			$phone->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $phone->fetch()) 
			{
			print "<div class='col-sm-3'>
				<div class='card' style='width: 18rem;'>
				<a href='phoneProduct.php?productID={$r['phoneid']}&userID={$r['user_userid']}' class='fill-div'>
				<img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}' alt='productOne'>
					<div class='card-body'>
						<h5 class='card-title'>{$r['phonename']}</h5>
						<p class='card-text'>{$r['description']}</p>
						<p class='card-text'>$ {$r['price']}</p>
					</div>
				</div>
				</a>
			</div>";
			}
		?>
	</div>

<!-- Select latest 4 Accessories uploads and publish here  -->
	<div class="row">
	<h3>Accessories</h3>
	<div class="col-sm-3">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/computerOne.jpg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/computerThree.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php include "./footer.php"; ?>
</body>
</html>



