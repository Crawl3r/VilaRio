<?php

	session_start();
	
	include "../_app/Config.inc.php";
	
	$info = $_POST;
	
	$crud->pdo_cadastro('responsavel', $info);
	
	header("Location:../lista_prop");
	
?>