<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

include "./header.php"; 
include "./navbar.php";
?>

<form action="process_addPhone.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Phone Name</label>
      <input type="text" name="phonename" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Images</label>
      <input type="file" name="image" id="image" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Condition</label>
      <select class="form-control" name="phonecond" id="exampleFormControlSelect1">
        <option>Brand New</option>
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
      <input type="text" name="phoneos" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Memory or Ram Size:</label>
      <input type="number" name="phonemem" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group" >
      <label>Storage Capacity:</label>
      <input type="number" name="phonestorage" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Color:</label>
      <input type="text" name="phonecol" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Screensize:</label>
      <input type="text" name="phonescreen" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group">
      <label>Camera resolution in MP:</label>
      <input type="text" name="phonecam" class="form-control-file" style="width:100%;">
    </div>
    <div class="form-group col-md-12">
      <label>Description:</label>
      <textarea class="form-control" name="description" rows="4"></textarea>
    </div>
    <div class="form-group">
      <label>Price In Whole Number:</label><br>
      $ <input type="number" name="price" min="1">
    </div>

    <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
    <button type="submit" name="submit" class="btn btn-primary">Sell</button>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>