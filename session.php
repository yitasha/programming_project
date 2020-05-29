<?php
session_start();
?>


<h1>Check Session Variables</h1>
<?php
print_r($_SESSION['compcart']);

echo "Number of Items in the cart = ".sizeof($_SESSION['compcart'])."<br>";


while (list ($key, $val) = each ($_SESSION['compcart'])) 
{ 
    echo "$key -> $val <br>"; 
}

?>