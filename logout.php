<?php
	session_start();

	print "<script type='text/javascript'>
	window.location.href = 'index.php';
	</script>";

	//Remove and Destroy session
	session_unset();
	session_destroy();
?>
