<?php
	
include "../_app/Config.inc.php";

$info = $_POST;


//echo "<pre>";
//print_r($info);

//cadastra o aluno-----------------
$crud->pdo_edit_l('lanc', $info, 'id_lanc');
//fim------------------------------

//retorna para a lista
//header("Location:../");
echo "<script>window.history.back();</script>";