<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";
?>

<form class="formContent">
  <div class="form-group">
    <label>Product Name</label>
    <textarea class="form-control" rows="1"></textarea>
  </div>
  <div class="form-group">
    <label>Images</label>
    <input type="file" style="width:100%" name="images" class="btn thumbnail" id="images">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Condition</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>New</option>
      <option>Used, but in good condition</option>
      <option>Broken</option>
    </select>
  </div>
  <div class="form-group">
  <label>Brand</label>
    <input type="text" class="form-control" id="lapbrand" placeholder="Brand name of the accessories">
  </div>
  <div class="form-group">
    <label>Accesory type</label>
    <input type="text" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Color</label></br>
    <input type="text" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="4"></textarea>
  </div>
  <div class="form-group">
    <label>Price</label><br>
    <input type="number" min="1" step="any" />
  </div>
  <button type="submit" class="btn btn-primary">Go Back</button>
  <button type="submit" class="btn btn-primary">Sell</button>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>