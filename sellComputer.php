<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";
?>

<form action="process_addComputer.php" method="post" enctype="multipart/form-data" class="formContent">
<div class="form-group col-md-12">
    <label>Computer Name</label>
    <input type="text" name="pcname" style="width:98%;">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Images</label>
      <input type="file" name="image" class="form-control-file">
    </div>
    <div class="form-group col-md-6">
        <label>Computer Type</label>
        <select class="form-control" name="pctype" style="width:95.4%">
        <option>Desktop</option>
        <option>Laptop</option>
        <option>All In One</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >Condition</label>
      <select class="form-control" name="pccond" style="width:95.4%">
        <option>Brand New</option>
        <option>Used, but in good condition</option>
        <option>Used, but in okay condition</option>
        <option>Broken</option>
      </select>
    </div>
    <div class="form-group col-md-6">
        <label>Computer Brand</label>
        <input list="pcbrand" name="pcbrand" class="form-control" style="width:95.4%">
        <datalist id="pcbrand">
          <option value="HP">
          <option value="Apple">
          <option value="Asus">
          <option value="Dell">
        </datalist>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>GPU or Graphics Card Model</label>
      <input type="text" name="pcgpu" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label>CPU</label>
      <input type="text" name="pccpu" class="form-control">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>RAM in GB</label>
      <input type="number" name="pcram" class="form-control" style="width:95.4%">
    </div>
    <div class="form-group col-md-6">
      <label>Storage in GB</label>
      <input type="number" name="pcstorage" class="form-control" style="width:95.4%">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Computer OS</label>
      <input list="pcos" name="pcos" class="form-control" style="width:95.4%">
        <datalist id="pcos">
          <option value="Windows">
          <option value="Mac OS">
          <option value="Linux">
        </datalist>
    </div>
    <div class="form-group col-md-6">
      <label>Computer Color</label>
      <input type="text" name="pccolor" class="form-control" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Description</label>
      <textarea class="form-control" name="description" rows="4" style="width:98%"></textarea>
    </div>
  </div>
  <div class="form-group" style="padding-left:10px;">
      <label>Price In Whole Number:</label><br>
      <label>$</label><input type="number" name="price" min="1"/>
  </div>

  <div class="form-row" style="padding-left:10px;">
  <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
  <button type="submit" class="btn btn-primary">Sell</button>
  </div>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>