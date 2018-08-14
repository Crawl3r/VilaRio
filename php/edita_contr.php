<?php
	
include "../_app/Config.inc.php";

$info = $_POST;


echo "<pre>";
print_r($info);

//cadastra o aluno-----------------
$crud->pdo_edit_l('contrato', $info, 'id_contrato');
//fim------------------------------

//retorna para a lista
header("Location:../lista_contr");