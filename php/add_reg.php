<?php
	
	include "../_app/Config.inc.php";
	
	$info = $_POST;
    $info['reg'] = $info['dia'] . " " . $info['reg'];
    unset($info['dia']);
    
    //print_r($info);
	
	$crud->pdo_cadastro_l('reg_ponto', $info);
	
	header("Location:../lista_reg_user");
	
?>