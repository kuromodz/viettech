<?php
	session_start();
	session_destroy();
	setcookie('password', '',0);
	header("location: login.php");
?>