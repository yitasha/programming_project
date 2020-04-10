<?php
	session_start();
	$_SESSION['username'] = $username;

	print "<script type='text/javascript'>
	window.location.href = 'index.php';
	</script>";

	//Remove and Destroy session
	session_unset();
	session_destroy();
?>
