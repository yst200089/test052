<?php
	session_start();
	$val = $_POST["keyValue"];
	
	$_SESSION["keyValue"] = $val;
	setcookie("keyValue", $val, time()+36000);
?>
ok!!
<a href="session-get.php">get session value</a>