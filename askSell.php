<?php
session_start(); 
$page_title= "Sell";
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]


include "./header.php"; 
include "./navbar.php";

if (isset($_POST['nextSell'])) {
    $selected_radio = $_POST['product'];
    if ($selected_radio == 'phone') {
        header("Location: http://localhost/project/rocket-market/sellPhone.php");
        exit();
    }
    else if ($selected_radio == 'computer') {
        header("Location: http://localhost/project/rocket-market/sellComputer.php");
        exit();
    }
}
?>

<form method="post">
  <p>What item are you selling?:</p>
  <input type="radio" id="phone" name="product" value="phone">
  <label for="phone">Phone</label><br>
  <input type="radio" id="computer" name="product" value="computer">
  <label for="computer">Computer</label><br>
  <input type="submit" name="nextSell" value="next" />
</form>
	<?php include "./footer.php"; ?>
</body>
</html>