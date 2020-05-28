<?php
session_start();
    #Check if username is active by detecting SESSION variable
    $username = $_SESSION['username'];
	if(!isset($username))
	{
		print "<script type='text/javascript'>
		alert('You have not logged in!');
		window.location.href = 'login.php';
	    </script>";
    }
    
$page_title= "Shopping Cart";
# [START use_cloud_storage_tools] So images cant be retrieved from bucket
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

if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["productID"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['computerid'] === $_POST["productID"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
      if($value['phoneid'] === $_POST["productID"]){
          $value['quantity'] = $_POST["quantity"];
          break; // Stop the loop after we've found the product
      }
  }
   
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
<h2>Order Details</h2> 
<table class="table">
<tbody>
<tr>
<td></td>
<td>NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $computer){
?>
<tr>
<td><?php echo $computer["pcname"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='computerid' value="<?php echo $productID["computerid"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='computerid' value="<?php echo $productID["computerid"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($computer["quantity"]==1) echo "selected";?>
value="1">1</option>
</select>
</form>
</td>
<td><?php echo "$".$computer["price"]; ?></td>
<td><?php echo "$".$computer["price"]*$computer["quantity"]; ?></td>
</tr>
<?php
$total_price += ($computer["price"]*$computer["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<?php 
foreach ($_SESSION["shopping_cart"] as $phone){
?>
<tr>
<td><?php echo $phone["phonename"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='phoneid' value="<?php echo $productID["phoneid"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='phoneid' value="<?php echo $productID["phoneid"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($phone["quantity"]==1) echo "selected";?>
value="1">1</option>
</select>
</form>
</td>
<td><?php echo "$".$phone["price"]; ?></td>
<td><?php echo "$".$phone["price"]*$phone["quantity"]; ?></td>
</tr>
<?php
$total_price += ($phone["price"]*$phone["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>

<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
		
	
<?php include "./footer.php"?>
</body>
</html>

