<?php
session_start(); 
$page_title= "Home";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";
?>


<div class="container">
	<div class="row">
	<h2>Top Picks</h2>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
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
				<div class="card-body">
					<a href="#" class="card-link">Buy</a>
					<a href="#" class="card-link">Trade</a>
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
			<img class="card-img-top" src="imgs/computerThree.jpeg" style='width:18rem;height:auto' alt="productOne">
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
	</div>

	<div class="row">
	<h2>Recommended</h2>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
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
				<div class="card-body">
					<a href="#" class="card-link">Buy</a>
					<a href="#" class="card-link">Trade</a>
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
			<img class="card-img-top" src="imgs/computerThree.jpeg" style='width:18rem;height:auto' alt="productOne">
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
	</div>

	<div class="row">
	<h2>Accessories</h2>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
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
				<div class="card-body">
					<a href="#" class="card-link">Buy</a>
					<a href="#" class="card-link">Trade</a>
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
			<img class="card-img-top" src="imgs/computerThree.jpeg" style='width:18rem;height:auto' alt="productOne">
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
	</div>

	<div class="row">
	<h2>Laptops</h2>
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="imgs/iphone.jpeg" style='width:18rem;height:auto' alt="productOne">
				<div class="card-body">
					<h5 class="card-title">Iphone XS</h5>
					<p class="card-text">Selling Iphone XS, in brand new condition. Phone works as intended.</p>
					<p class="card-text">$1000</p>
				</div>
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
				<div class="card-body">
					<a href="#" class="card-link">Buy</a>
					<a href="#" class="card-link">Trade</a>
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
			<img class="card-img-top" src="imgs/computerThree.jpeg" style='width:18rem;height:auto' alt="productOne">
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
	</div>





</div>
	<?php include "./footer.php"; ?>
</body>
</html>



