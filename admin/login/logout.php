<?php
session_start();

	include_once '../include/redirect.php';
	
	unset ($_SESSION ['id_user']);
	unset ($_SESSION ['username']);
	unset ($_SESSION ['password']);
	unset ($_SESSION ['level']);
	session_destroy();
	redirectJS("login.php");
?>