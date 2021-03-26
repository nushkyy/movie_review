<?php
	session_start();
	unset($_SESSION['user_data']);
	unset($_SESSION['admin_data']);
	Header("Location:index.php");
	
?>