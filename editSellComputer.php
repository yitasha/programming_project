<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
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

<form action="process_updateComp.php" method="post" enctype="multipart/form-data" class="formContent">
<?php
    #This page is for updating sold products with prefilled values from database
    $productID = $_GET['productID'];#productID from url variables
    $userID = $_SESSION['userid'];#userID from Session -> Logged in user

    #Fetch computer table with double condition, check the logged in user's Session UserID
    $statement = $db->prepare("select * from computer where computerid = '$productID' and user_userid = '$userID'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    while ($r = $statement->fetch())
    {
      print "<div class='form-group col-md-12'>
        <input type='hidden' name='productID' value='$productID'>
        <label>Computer Name</label>
        <input type='text' name='pcname' style='width:98%;' value='{$r['pcname']}'>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label>Can not update image</label>
          <!-- Removed for now: <input type='file' name='image' class='form-control-file'> -->
        </div>
        <div class='form-group col-md-6'>
            <label>Computer Type</label>
            <select class='form-control' name='pctype' style='width:95.4%'>
            <option selected>{$r['pctype']}</option>
            <option>Desktop</option>
            <option>Laptop</option>
            <option>All In One</option>
          </select>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label >Condition</label>
          <select class='form-control' name='pccond' style='width:95.4%'>
            <option selected>{$r['pccond']}</option>
            <option>Brand New</option>
            <option>Used, but in good condition</option>
            <option>Used, but in okay condition</option>
            <option>Broken</option>
          </select>
        </div>
        <div class='form-group col-md-6'>
            <label>Computer Brand</label>
            <input list='pcbrand' name='pcbrand' class='form-control' style='width:95.4%' value='{$r['pcbrand']}'>
            <datalist id='pcbrand'>
              <option value='HP'>
              <option value='Apple'>
              <option value='Asus'>
              <option value='Dell'>
            </datalist>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label>GPU or Graphics Card Model</label>
          <input type='text' name='pcgpu' class='form-control' value='{$r['pcgpu']}'>
        </div>
        <div class='form-group col-md-6'>
          <label>CPU</label>
          <input type='text' name='pccpu' class='form-control' value='{$r['pccpu']}'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label>RAM in GB</label>
          <input type='number' name='pcram' class='form-control' style='width:95.4%' value='{$r['pcram']}'>
        </div>
        <div class='form-group col-md-6'>
          <label>Storage in GB</label>
          <input type='number' name='pcstorage' class='form-control' style='width:95.4%' value='{$r['pcstorage']}'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-6'>
          <label>Computer OS</label>
          <input list='pcos' name='pcos' class='form-control' style='width:95.4%' value='{$r['pcos']}'>
            <datalist id='pcos'>
              <option value='Windows'>
              <option value='Mac OS'>
              <option value='Linux'>
            </datalist>
        </div>
        <div class='form-group col-md-6'>
          <label>Computer Color</label>
          <input type='text' name='pccolor' class='form-control' value='{$r['pccolor']}'>
        </div>
      </div>
      <div class='form-row'>
        <div class='form-group col-md-12'>
          <label>Description</label>
          <textarea class='form-control' name='description' rows='4' style='width:98%'>{$r['description']}</textarea>
        </div>
      </div>
      <div class='form-group' style='padding-left:10px;'>
          <label>Price In Whole Number:</label><br>
          <label>$</label><input type='number' name='price' min='1' value='{$r['price']}'/>
      </div>";
    } #End of while fetch loop
?>
  <div class="form-row" style="padding-left:10px;">
  <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
  

</form>
	<?php include "./footer.php"; ?>
</body>
</html>