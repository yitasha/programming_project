<?php
session_start(); 
$page_title= "Home";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";
?>



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
	<div class="row">
	<h3>Top Picks</h3>
	<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
				<ul class="list-group list-group-flush">
				
				</ul>
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
				<ul class="list-group list-group-flush">
				
				</ul>
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
				<ul class="list-group list-group-flush">
				</ul>
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
				<ul class="list-group list-group-flush">
				</ul>
			</div>
		</div>
	</div>

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
				<ul class="list-group list-group-flush">				
				</ul>
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
				<ul class="list-group list-group-flush">			
				</ul>
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
				<ul class="list-group list-group-flush">
				</ul>
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
				<ul class="list-group list-group-flush">
				</ul>
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
					<ul class="list-group list-group-flush">
					
					</ul>
					<div class="card-body">
						<a href="#" class="card-link">Buy</a>
						<a href="#" class="card-link">Trade</a>
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
				<ul class="list-group list-group-flush">
				
				</ul>

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
				<ul class="list-group list-group-flush">
				</ul>

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
				<ul class="list-group list-group-flush">
				</ul>

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
				<ul class="list-group list-group-flush">
				
				</ul>

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
				<ul class="list-group list-group-flush">
				
				</ul>

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
				<ul class="list-group list-group-flush">
				</ul>

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
				<ul class="list-group list-group-flush">
				</ul>

			</div>
		</div>
	</div>
</div>
	<?php include "./footer.php"; ?>
</body>
</html>



