<?php

    session_start();
	
    include "../_app/Config.inc.php";
	
    $info = $_POST;
	
    $crud->pdo_pdo_edit('responsavel', $info, 'id');
	
    header("Location:../lista_prop");
	
?>