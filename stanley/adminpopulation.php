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
echo "Admins";
$sql = "SELECT * FROM admin";//display list of admins
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Admin name:" . $row["adminname"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "Users";
$sql1 = "SELECT * FROM users";//display list of users
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "id: " . $row["id"]. " - First name: " . $row["firstname"]. " - Last name:" . $row["lastname"]." - Phone:" . $row["phone"]." - Email:" . $row["email"] ." - Address 1:" . $row["address1"]
        ." - Address2:" . $row["address2"]." - Postcode:" . $row["postcode"]." - State:" . $row["state"]." - Username:" . $row["username"]." - Password:" . $row["password"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>