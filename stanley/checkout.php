<?php
        //carry the userid, computerid/phoneid from previous pages
		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);

        #checkout values from form inputs (from shopping cart page)
        $quantity= $_POSR['quantity'];
        $totalprice= $_POST['totalprice']
        
        #checkout values from form inputs (from checkout page)
        $creditcardno= $_POST['creditcardno'];
        $expirydate= $_POST['expirydate'];
        $cvv=$_POST['cvv'];
        $mastervisa=$_POST['mastervisa'];
        
		//insertion into orders table
		$statement = $db->prepare("INSERT INTO orders (orderid, quantity, totalprice, user_userid, computer_computerid, phone_phoneid)
        VALUES (null,'$quantity','$totalprice', '$user_userid','$computer_computerid','$phone_phoneid')");

        //insertion into payments table
        $statement2 = $db->prepare("INSERT INTO payment (paymentid, creditcardno, expirydate, cvv, mastervisa, orders_orderid)
        VALUES (null,'$creditcardno','$expirydate', '$cvv','$mastercisa','$orders_phoneid')");
		
		$statement2->execute();
			print "<script type='text/javascript'>
			alert('You have bought this item!');
			window.location.href = 'index.php';
	        </script>";
		
?>