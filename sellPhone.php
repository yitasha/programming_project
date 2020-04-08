<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

include "./header.php"; 
include "./navbar.php";
?>

<form action="addProduct.php" method="post" >
    <div class="form-group">
      <label>Product Name</label>
      <textarea class="form-control" rows="1"></textarea>
    </div>
    <div class="form-group">
      <label>Images</label>
      <input type="file" name = "img" class="form-control-file">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Condition</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option>New</option>
        <option>Used, but in good condition</option>
        <option>Used, but in okay condition</option>
        <option>Broken</option>
      </select>
    </div>
    <br>
    <div class="form-group">
    <label>Brand:</label>
      <input list="brand" name="brand"/>
        <datalist id="brand">
          <option value="iPhone">
          <option value="Samsung">
          <option value="HTC">
          <option value="Xiaomi">
          <option value="LG">
          <option value="Google">
        </datalist>
    </div>
    <div class="form-group">
      <label>Model:</label>
      <input type="text" name="model" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Operating System:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Ram Size:</label>
      <input type="text" name="ram" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group" >
      <label>Storage Capacity:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Color:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Screensize:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Weight:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Warranty:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Camera resolution in MP:</label>
      <input type="text" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Description:</label>
      <textarea class="form-control" rows="4"></textarea>
    </div>
    <div class="form-group">
      <label>Price:</label><br>
      $ <input type="number" min="1" step="any" />
    </div>

    <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
    <button type="submit" class="btn btn-primary">Sell</button>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>