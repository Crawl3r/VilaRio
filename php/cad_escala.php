<?php

include "../_app/Config.inc.php";
date_default_timezone_set('America/Sao_Paulo');

$info = $_POST;

$info['lancamento_'] = date('Y-m-d H:i:s');

echo "<pre>";
print_r($info);

//cadastra o aluno-----------------
$crud->pdo_cadastro('escala', $info);
//fim------------------------------

//retorna para a lista
header("Location:../lista_escala");

