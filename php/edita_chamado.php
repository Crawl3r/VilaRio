<?php
	
include "../_app/Config.inc.php";

$info = $_POST;

$info['d_h_a_'] = str_replace('T', ' ', $info['d_h_a_']);
$info['d_h_f_'] = str_replace('T', ' ', $info['d_h_f_']);

//echo "<pre>";
//print_r($info);

//cadastra o aluno-----------------
$crud->pdo_edit('chamado', $info, 'id_');
//fim------------------------------

//retorna para a lista
$id = $info['id_'];
header("Location:../edita_chamado?id_c=$id");