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

<form action="process_updatePhone.php" method="post" enctype="multipart/form-data" class="formContent">
<?php
    #This page is for updating sold products with prefilled values from database
    $productID = $_GET['productID'];#productID from url variables
    $userID = $_SESSION['userid'];#userID from Session -> Logged in user

    #Fetch phone table with double condition, check the logged in user's Session UserID
    $statement = $db->prepare("select * from phone where phoneid = '$productID' and user_userid = '$userID'");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    while ($r = $statement->fetch())
    {
      print "<div class='form-group'>
        <input type='hidden' name='productID' value='$productID'>
        <label>Phone Name</label>
        <input type='text' name='phonename' style='width:100%;' value='{$r['phonename']}'>
      </div>
      <div class='form-group'>
        <label>Can not update image</label>
        <!-- Removed for now: <input type='file' name='image' id='image' > -->
      </div>
      <div class='form-group'>
        <label for='exampleFormControlSelect1'>Condition</label>
        <select class='form-control' name='phonecond' id='exampleFormControlSelect1'>
          <option selected>{$r['phonecond']}</option>
          <option>Brand New</option>
          <option>Used, but in good condition</option>
          <option>Used, but in okay condition</option>
          <option>Broken</option>
        </select>
      </div>
      <br>
      <div class='form-group'>
      <label>Brand:</label>
        <input list='brand' name='brand' value='{$r['brand']}'>
          <datalist id='brand'>
            <option value='iPhone'>
            <option value='Samsung'>
            <option value='HTC'>
            <option value='Xiaomi'>
            <option value='LG'>
            <option value='Google'>
          </datalist>
      </div>

      <div class='form-group'>
        <label>Model:</label>
        <input type='text' name='model' class='form-control-file' style='width:100%;' value='{$r['model']}'>
      </div>
      <div class='form-group'>
        <label>Operating System:</label>
        <input type='text' name='phoneos' class='form-control-file' style='width:100%;' value='{$r['phoneos']}'>
      </div>
      <div class='form-group'>
        <label>Memory or Ram Size:</label>
        <input type='number' name='phonemem' class='form-control-file' style='width:100%;' value='{$r['phonemem']}'>
      </div>
      <div class='form-group' >
        <label>Storage Capacity:</label>
        <input type='number' name='phonestorage' class='form-control-file' style='width:100%;' value='{$r['phonestorage']}'>
      </div>
      <div class='form-group'>
        <label>Color:</label>
        <input type='text' name='phonecol' class='form-control-file' style='width:100%;' value='{$r['phonecol']}'>
      </div>
      <div class='form-group'>
        <label>Screensize:</label>
        <input type='text' name='phonescreen' class='form-control-file' style='width:100%;' value='{$r['phonescreen']}'>
      </div>
      <div class='form-group'>
        <label>Camera resolution in MP:</label>
        <input type='text' name='phonecam' class='form-control-file' style='width:100%;' value='{$r['phonecam']}'>
      </div>
      <div class='form-group col-md-12'>
        <label>Description:</label>
        <textarea class='form-control' name='description' rows='4'>{$r['description']}</textarea>
      </div>
      <div class='form-group'>
        <label>Price In Whole Number:</label><br>
        $ <input type='number' name='price' min='1' value='{$r['price']}'>
      </div>";
    } #End of while fetch loop
?>
    <button  onclick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>
	<?php include "./footer.php"; ?>
</body>
</html>