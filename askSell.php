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

    else if ($selected_radio == 'laptop') {
        header("Location: http://localhost/project/rocket-market/sellLaptop.php");
        exit();
    }

    else if ($selected_radio == 'accessories') {
        header("Location: http://localhost/project/rocket-market/sellAccessories.php");
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
  <input type="radio" id="laptop" name="product" value="laptop">
  <label for="computer">Laptop</label><br>
  <input type="radio" id="accessories" name="product" value="accessories">
  <label for="computer">Accessories</label><br>

  <input type="submit" name="nextSell" value="next" />
</form>
	<?php include "./footer.php"; ?>
</body>
</html>