<?php
print"
<body> 
<nav class='navbar navbar-inverse'>
   <div class='container-fluid'>
       
        <!-- LOGO -->
        <div class='navbar-header'>
        <a href='./index.php'><img class='navbar-brand'  src='imgs/logo.png' style='width:60px;height:auto;'> </a>
        </div>

        <!-- left side navbar -->
        <ul class='nav navbar-nav'>
        <li><a href='buyPage.php'>Buy</a></li>
        <li><a href='askSell.php'>Sell</a></li>
        <li><a href='#'>Trade</a></li>
        </ul>


        <!-- right side navbar -->
        <ul class='nav navbar-nav navbar-right'>"
?>

<?php 
            #Check if username exists in session and update navbar li property
            if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
            {
              $username = $_SESSION['username'];
              echo "<li><a href='myProfilePage.php'>Welcome $username</a></li>";
            }
?>

<?php
      print"
      <div class='sub-menu'>
        <li class='dropdown'><a class='dropdown-toggle' class='navBarIcons' data-toggle='dropdown'><img src='imgs/accountRed-256.png' style='width:20px;height:auto;'><span class='menu-title'>Account</span></a>
            <ul class='dropdown-menu'>
                <li><a href='login.php'>Login</a></li>
                <li><a href='register.php'>Register</a></li>"
?>
<?php
    #If Session username/adminName is detected and not empty = show logout
    if((isset($_SESSION['username']) && !empty($_SESSION['username'])) or (isset($_SESSION['adminName']) && !empty($_SESSION['adminName'])))
    {
      echo "<li><a href='logout.php'>Logout</a></li>";
    }
?>

<?php
    #If Session normal username is NOT detected and IS empty = show Admin login 
    if(!isset($_SESSION['username']) && empty($_SESSION['username']) )
    {
      echo "<li><a href='adminLogin.php'>Admin</a></li>";
    }
  ?>
<?php
      print "
              </ul>
          </li>
        </div>
           <div class='sub-menu'>
            <li><a href='#'><img src='imgs/favouriteRed-256.png' style='width:20px;height:auto;'><span class='menu-title'>favourite</span></a></li>
          </div>
          <div class='sub-menu'>
            <li><a href='cartv2.php'><img src='imgs/cartRed-256.png' style='width:20px;height:auto;'><span class='menu-title'>cart</span></a></li>
          </div>
        </ul>
   </div>
</nav>";
?>

