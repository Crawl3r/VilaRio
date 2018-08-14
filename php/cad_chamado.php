<?php

include "../_app/Config.inc.php";

$info = $_POST;

$info['status_'] = 'aberto';
$info['d_h_a_'] = str_replace('T', ' ', $info['d_h_a_']);

//echo "<pre>";
//print_r($info);

//cadastra o aluno-----------------
$crud->pdo_cadastro('chamado', $info);
//fim------------------------------

//retorna para a lista
header("Location:../");

