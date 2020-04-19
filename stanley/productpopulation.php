<?php
session_start();//always include this in every page, otherwise user details could not be saved
$servername = "localhost";//check server settings for these 3 lines
$username = "username";
$password = "password";
$dbname = "account";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Products\n";
$sql = "SELECT * FROM products";//display list of products 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Product id: " . $row["productid"]. " - Product name: " . $row["productname"]. " - Description:" . $row["description"]. " - Date listed:" . $row["datelisted"]. 
        " - Last edited:" . $row["lastedited"]. " - User ID:" . $row["user_userid"]."<br>";
    }
} else {
    echo "0 results";
}
echo "Specs\n";
$sql1 = "SELECT * FROM specs";//display list of specs
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "Spec id: " . $row["specid"]. " - Price: " . $row["price"]. " - Battery life:" . $row["batterylife"]." - Graphics:" . $row["graphics"]." - Processor:" . $row["processor"] ." - Ram Size:" . $row["ramsize"]
        ." - Brand:" . $row["brand"]." - Screen size:" . $row["screensize"]." - Resolution:" . $row["resolution"]." - Warranty:" . $row["warranty"]." - Operating system:" . $row["opersys"].
        " - Weight:" . $row["weight"]." - Product id:" . $row["productid"]."<br>";
    }
} else {
    echo "0 results";
}
echo "Phones\n";
$sql2 = "SELECT * FROM phones";//display list of phones
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "Phone id: " . $row["phoneid"]. " - Memory size: " . $row["memorysize"]. " - Camera:" . $row["camera"]. " - Network:" . $row["network"]. 
        " - Product id:" . $row["product_productid"]."<br>";
    }
} else {
    echo "0 results";
}
echo "Computers\n";
$sql3 = "SELECT * FROM computers";//display list of computers
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "Computer id: " . $row["computerid"]. " - Purpose: " . $row["purpose"]. " - Hard drive size:" . $row["harddrivesize"]. " - Wireless:" . $row["wireless"]. 
        " - Product id:" . $row["product_productid"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>