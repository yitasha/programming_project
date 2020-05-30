<?php
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

    // Instantiate your DB using the database host, port, name, username, and password
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');

    //DB connection
    $db = new PDO($dsn, $user, $pw);
    #insert values to payment
    $user_userid = $_SESSION['userid'];
    $nameoncard = $_POST['nameoncard'];
    $cardno = $_POST_['cardno'];
    $expirydate = $_POST['expirydate'];
    $cvv = $_POST['cvv'];

    $statement = $db->prepare("INSERT INTO payment (paymentid, nameoncard, cardno, expirydate, cvv, user_userid)
    VALUES (null,'$nameoncard','$cardno','$expirydate','$cvv','$user_userid')");

if($statement->execute())
{
    print "<script type='text/javascript'>
    alert('Purchase complete! Confirmation order details and tracking details will send to your email shortly. Thank you for purchasing at Rocket Market!');
    window.location.href = 'index.php';
    </script>";    
}
else
{
    print "<script type='text/javascript'>
    alert('Payment failed! Please check your card and try again.');
    window.location.href = 'checkout.php';
    </script>";
}
?>