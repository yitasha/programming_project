<?php
session_start();
    if (isset($_POST['update_profile'])) 
{
	$user = $_GET['user'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
	$update_profile = $mysqli->query("UPDATE user SET firstname = '$firstname',
                    lastname = '$lastname', phone = '$phone',
                    address1 = '$address1', address2 = '$address2',
                      city = '$city', postcode = $postcode, state = '$state'
                      WHERE username = '$user'");
	    if ($update_profile) {
		   header("Location: viewprofile.php?user=$user");
	    } else {
		  echo $mysqli->error;
	    }
	}
?>