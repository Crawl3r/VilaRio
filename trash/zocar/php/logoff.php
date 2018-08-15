<?php

	session_start();
	
	include "conection.php";
	include "querys.php";
	
	$info = $_POST;
	
	session_destroy();
	$_SESSION = array();
	
	header("Location:../index.php");
	
?>