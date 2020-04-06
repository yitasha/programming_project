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
	<h2>Top Picks</h2>
	<div class="row">
		<div class="col-sm-4">
			<img src="imgs/iphone.jpeg" alt="iphone" style="width:50%">
		</div>
		<div class="col-sm-4">
		<img src="imgs/computerOne.jpg" alt="computerOne" style="width:50%">
		</div>
		<div class="col-sm-4">
		<img src="imgs/huawei.jpg" alt="huawei" style="width:70%">
		</div>
	</div>
	<h2>Recommended</h2>
	<div class="row">
		<div class="col-sm-4">
		<img src="imgs/samsung.jpg" alt="samsung" style="width:80%">
		</div>
		<div class="col-sm-4">
		<img src="imgs/computerTwo.jpeg" alt="computerOne" style="width:50%">
		</div>
		<div class="col-sm-4">
		<img src="imgs/computerThree.jpeg" alt="computerThree" style="width:50%">
		</div>
	</div>
</div>
	<?php include "./footer.php"; ?>
</body>
</html>

