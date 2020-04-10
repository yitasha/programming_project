<?php
session_start(); 
$page_title= "Sell";

  
/*	if(!isset($_SESSION['userid']))
	{
		print "<script type='text/javascript'>
		alert('Please login first!');
		window.location.href = 'login.php';
	    </script>";
	}*/
  include "./header.php"; 
  include "./navbar.php";

  if (isset($_POST['nextSell'])) 
  {
      $selected_radio = $_POST['product'];
      if ($selected_radio == 'phone') {
          print "<script type='text/javascript'>
        window.location.href = 'sellPhone.php';
        </script>";
      }
      else if ($selected_radio == 'laptop') {
        print "<script type='text/javascript'>
        window.location.href = 'sellLaptop.php';
        </script>";
    }

      else if ($selected_radio == 'accessories') {
        print "<script type='text/javascript'>
        window.location.href = 'sellAccessories.php';
        </script>";
    }
      else if ($selected_radio == 'computer') {
          print "<script type='text/javascript'>
        window.location.href = 'sellComputer.php';
        </script>";
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
  <label for="laptop">Laptop</label><br>
  <input type="radio" id="accessories" name="product" value="accessories">
  <label for="accessories">Accessories</label><br>
  <input type="submit" name="nextSell" value="next" />
</form>
	<?php include "./footer.php"; ?>
</body>
</html>