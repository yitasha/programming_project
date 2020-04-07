<?php
print"
<body> 
<nav class='navbar navbar-default' id='navbar'>
   <div class='container-fluid'>
       
        <!-- LOGO -->
        <div class='navbar-header'>
        <a href='./index.php'><img class='navbar-brand'  src='imgs/logo.png'> </a>
        </div>

        <!-- left side navbar -->
        <ul class='nav navbar-nav'>
        <li><a href='#'>Buy</a></li>
        <li><a href='#'>Sell</a></li>
        <li><a href='#'>Trade</a></li>
        </ul>


        <!-- right side navbar -->
        <ul class='nav navbar-nav navbar-right'>
        <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>Account</a>
            <ul class='dropdown-menu'>
                <li><a href='login.php'>Login</a></li>
                 <li><a href='register.php'>Register</a></li>
                 <li><a href='#'>Logout</a></li>
               </ul>
           </li>
         <li><a href='#'>Favourite</a></li>
         <li><a href='#'> Cart</a></li>
        </ul>


    
   </div>
</nav>";
?>