<?php

include "../_app/Config.inc.php";

$info = $_POST;

//echo "<pre>";
//print_r($info);

include "up_foto_func.php";

//cadastra funcionario----------------
$crud->pdo_cadastro('funcionario', $info);
//fim------------------------------

//retorna para a lista
header("Location:../lista_func");

