<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";
?>

<form>
  <div class="form-group">
    <label>Product Name</label>
    <textarea class="form-control" rows="1"></textarea>
  </div>
  <div class="form-group">
    <label>Images</label>
    <input type="file" class="form-control-file">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Condition</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>New</option>
      <option>Used, but in good condition</option>
      <option>Broken</option>
    </select>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">GPU</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">CPU</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Motherboard</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ram</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Case</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Power Supply</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Colour</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Additional Information</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="4"></textarea>
  </div>
  <div class="form-group">
    <label>Price</label><br>
    <input type="number" min="1" step="any" />
  </div>
  <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
  <button type="submit" class="btn btn-primary">Sell</button>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>