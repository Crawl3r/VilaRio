<?php

include "../_app/Config.inc.php";

$info = $_POST;

//echo "<pre>";
//print_r($info);

//cadastra o aluno-----------------
$crud->pdo_cadastro_l('lanc', $info);
//fim------------------------------

//retorna para a lista
header("Location:../lista_lanc");

