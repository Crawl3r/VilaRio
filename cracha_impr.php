<?php

require "php/Cracha.class.php";
include "_app/Config.inc.php";

if (!isset($_SESSION['post_data'])) {
    echo "<script>window.close();</script>";
    //teste
    //die();
}

@$info = $_SESSION['post_data'];

//recupera os funcionarios
$sql = "WHERE ";
foreach ($info as $index=>$key) {
    $sql .= "id_funcionario = $index OR ";
}
$sql_f = substr($sql, 0, -3);

$func = $crud->pdo_src('funcionario', $sql_f);

//inicializa os vetores
for ($i = 1; $i<=7; $i++) {
    ${'func' . $i} = array();
}

//preenche por classificação
foreach ($func as $key) {
    for ($i = 1; $i<=7; $i++) {
        if ($key['empresa_funcionario'] == $i) {
            ${'func' . $i}[] = $key;
        }
    }
}

//inicia o estilo dos crachás
Cracha::estilo();

echo "<body>";
//impre os crachas pela classificação e modelo
for ($i = 1; $i<=7; $i++) {
    if (${'func' . $i} !== array()) {
        Cracha::{'modelo' . $i}(${'func' . $i});
    }
}
echo "</body>";

//atualiza o status de impressão e data de exp
$nova_data = date('Y-m-d');
$sql = "UPDATE tb_funcionario SET impresso_yn_funcionario = 1, data_exp_funcionario = '$nova_data' WHERE ";
foreach ($info as $index=>$key) {
    $sql .= "id_funcionario = $index OR ";
}
$sql_f = substr($sql, 0, -3);

$crud->query_void($sql_f);

$crud->query_void($sql_f);

//destrói os dados dos funcionários impressos
unset($_SESSION['post_data']);

//imprime e finaliza
/*
echo "
    <script>
        window.onload = function () {
            window.print();
            setTimeout(function(){window.close();}, 1);
        }
    </script>
";
 */
