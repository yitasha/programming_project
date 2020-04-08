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
  <div class="form-group">
  <label>Brand:
    <input list="brand" name="brand" /></label>
    <datalist id="brand">
    <option value="Iphone">
    <option value="Samsung">
    <option value="HTC">
    <option value="Xaomi">
    <option value="LG">
    <option value="Google">
    </datalist>
  </div>
  <div class="form-group">
    <label>Model</label>
    <input type="text" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Carier</label>
    <input type="text" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Capacity</label>
    <input type="text" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Color</label>
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