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
        <li><a href='#'>Buy</a></li>
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
              echo "<li><a href='#'>Hi $username</a></li>";
            }
            else{ 
              echo "<li><a href='#'>Welcome</a></li>";
            }
?>

<?php
      print"
        <li class='dropdown'><a class='dropdown-toggle' class='navBarIcons' data-toggle='dropdown'><img src='imgs/account-256.png' style='width:20px;height:auto;'></a>
            <ul class='dropdown-menu'>
                <li><a href='login.php'>Login</a></li>
                 <li><a href='register.php'>Register</a></li>"
?>
<?php
   if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
   {
     $username = $_SESSION['username'];
     echo "<li><a href='logout.php'>Logout</a></li>";
   }
?>

<?php
      print"               
                 <li><a href='adminLogin.php'>Admin</a></li>
               </ul>
           </li>
         <li><a href='#'><img src='imgs/favourite-256.png' style='width:20px;height:auto;'></a></li>
         <li><a href='#'><img src='imgs/cart-512.png' style='width:20px;height:auto;'></a></li>
        </ul>
   </div>
</nav>";
?>