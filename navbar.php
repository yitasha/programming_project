<?php
print"
<body> 
<nav class='navbar navbar-default' id='navbar'>
   <div class='container-fluid'>
       <div class='navbar-header'>
           <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
           <span class='sr-only'>Toggle navigation</span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
           <span class='icon-bar'></span>
           </button>
           <a href='./index.php'><img class='navbar-brand'  src='imgs/logo.png'> </a>
       </div>

       <!-- left side navbar -->
       <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
           <ul class='nav navbar-nav'>
               <li><a href='#'><p>Buy</p></a></li>
               <li><a href='#'><p>Sell</p></a></li>
               <li><a href='#'><p>Trade</p></a></li>
           </ul>
           <!-- right side navbar -->
           <ul class='nav navbar-nav navbar-right'>
           <li class='dropdown'>
               <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><p>Account</p><span class='caret'></span></a>
               <ul class='dropdown-menu'>
               <li><a href='login.php'><p>Login</p></a></li>
               <li><a href='register.php'><p>Register</p></a></li>
               <li role='separator' class='divider'></li>
               <li><a href='logout.php'><p>Logout</p></a></li> <!-- if user has logged in then display with logout -->
               </ul>
               </li>
               <li><a href='#'><p>Favourite</p></a></li>
               <li><a href='#'><p>Cart</p></a></li>
           </ul>
           </div>
   </div>
</nav>";
?>