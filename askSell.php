<?php
session_start(); 
$page_title= "Sell";

  
	if(!isset($_SESSION['userid']))
	{
		print "<script type='text/javascript'>
		alert('Please login first!');
		window.location.href = 'login.php';
	    </script>";
	}
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
<form method="post" class = "ask_form">
  <div class="row">
    <p>What item are you selling?:</p>
  </div>
    <div class = "row">
      <label>
        <input type="radio" name="product" value="phone">
        <img src="imgs/phoneBlack-512.png" style='width:150px;height:auto;'>
        <h5><span class="askProductFont">Phone</span></h5>
      </label>

      <label>
        <input type="radio" name="product" value="computer">
        <img src="imgs/computerBlack-512.png" style='width:150px;height:auto;'>
        <h5><span class="askProductFont">Computer</span></h5>
      </label>
      
  </div>
  <div class="row">
    <button type="submit" class="btn btn-outline-primary btn-lg " name="nextSell">Next</button>
  </div>
</form>

	<?php include "./footer.php"?>
</body>
</html>