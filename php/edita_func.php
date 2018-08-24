<?php
	
include "../_app/Config.inc.php";

$info = $_POST;

$func = $crud->pdo_src('funcionario', ' WHERE id_funcionario = ' . $_POST['id_'] . ' ');

if (isset($_FILES['foto_']['name']) && $_FILES["foto_"]["error"] == 0) {
    include "up_foto_func.php";
}else {
    $info['foto_'] = $func[0]['foto_funcionario'];
}

echo "<pre>";
print_r($info);

//cadastra o aluno-----------------
$crud->pdo_edit('funcionario', $info, 'id_');
//fim------------------------------

//retorna para a lista
header("Location:../lista_func");