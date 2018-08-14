<?php

include "../_app/Config.inc.php";

$info = $_POST;

//echo "<pre>";
//print_r($info);


//cadastra funcionario----------------
$crud->pdo_cadastro_l('contrato', $info);
//fim------------------------------

//retorna para a lista
header("Location:../lista_contr");

