<?php
	
include "../_app/Config.inc.php";

$info = $_POST;

//echo "<pre>";
//print_r($info);

//cadastra o aluno-----------------
$crud->pdo_delete('funcionario', $info['id']);
//fim------------------------------

//retorna para a lista
header("Location:../lista_func");