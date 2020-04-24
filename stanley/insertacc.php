<?php
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

$sql = "INSERT INTO user (userid, firstname, lastname, phone, email, address1, address2, postcode, state, username, password)
VALUES ('$userid','$firstname','$lastname', '$phone','$email','$address1','$address2','$postcode','$state','$username')";//since yi wants it as char, i don't know how to insert it

if ($conn->query($sql) === TRUE) {
    echo "New account created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>