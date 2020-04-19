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
	<h3>Top Picks</h3>
	<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<?php
			$top1 = $db->prepare("select * from computer order by computerid desc limit 0,1");
			$top1->execute();
			$top1->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top1->fetch()) 
			{
			print "<a href='productPage.php?productID={$r['computerid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' style='width:18rem;height:200px' alt='productOne'>
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
			$top2 = $db->prepare("select * from computer order by computerid desc limit 1,1");
			$top2->execute();
			$top2->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top2->fetch()) 
			{
			print "<a href='productPage.php?productID={$r['computerid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' style='width:18rem;height:200px' alt='productOne'>
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
			$top3 = $db->prepare("select * from phone order by phoneid desc limit 0,1");
			$top3->execute();
			$top3->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top3->fetch()) 
			{
			print "<a href='productPage.php?productID={$r['phoneid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}' style='width:18rem;height:200px' alt='productOne'>
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
			$top4 = $db->prepare("select * from phone order by phoneid desc limit 1,1");
			$top4->execute();
			$top4->setFetchMode(PDO::FETCH_ASSOC);
			while ($r = $top4->fetch()) 
			{
			print "<a href='productPage.php?productID={$r['phoneid']}' class='fill-div'>
			<img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}' style='width:18rem;height:200px' alt='productOne'>
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
<!-- Recommended section -->
	<div class="row">
	<h3>Recommended</h3>
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

	<div class="row">
	<h3>Laptops</h3>
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



