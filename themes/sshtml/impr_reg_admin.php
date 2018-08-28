<?php

//dados do usuario
$id_u = $_SESSION['id_usuario'];

//usuários
$usuario = $crud->query("SELECT * FROM tb_usuario WHERE id_usuario = " . $_GET['user'])[0];

//empresa
@$empr = ${"emp_" . $usuario['empresa']};

//recolhe as datas 
date_default_timezone_set('America/Sao_Paulo');
$mes = isset($_GET['valor']) ? explode('-', $_GET['valor'])[1] : date('m');
$ano = isset($_GET['valor']) ? explode('-', $_GET['valor'])[0] : date('Y');
$hora_c = date('H:i:s');

//datas para o loop
if (isset($_GET['valor']) && $_GET['valor'] != "") {
    
    $begin = new DateTime($_GET['valor']);
    $begin = $begin->modify("first day of this month");
    
    $end = new DateTime($_GET['valor']);
    $end = $end->modify("last day of this month");
    $end = $end->modify("+1 day");

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);
    
} else {
    
    $begin = new DateTime("first day of this month");
    
    $end = new DateTime("last day of this month");
    $end = $end->modify("+1 day");

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);
    
}

	
//recolhe marcações do banco de dados

if (isset($_GET['valor']) && $_GET['valor'] != "" && isset($_GET['user']) && $_GET['user'] != "") {

    $valor = $_GET['valor'];
    $user = $_GET['user'];
		
    //condição 1
    $cond1 = "WHERE id_usuario = '$user' ";
	
}
	
//protege de entrada sem login
if ($_SESSION != array()) {
    if ($_SESSION['nome_usuario'] != "Gisele") {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}
	
?>

<style>
    .form-control {
        margin: 0;
    }

    td{
        padding: 1px !important;
    }    
    .cabecalho td{
        border-right: 90px solid rgba(0,0,0,0);
        white-space: nowrap;
    }
</style>

<div style="width: 100%; border-top: 3px solid black;"></div>

<table class="cabecalho">
    <tr>
        <td>
            <b><?= @$empr[0] ?></b>
        </td>
        <td>
            
        </td>
        <td class="text-right">
            InforWay Informática
        </td>
    </tr>
    <tr>
        <td>
            <?= @$empr[1] ?>
        </td>
        <td>
           CNPJ: <?= @$empr[2] ?>
        </td>
        <td class="text-right">
            Emissão: 
            <?php 
            if (isset($_GET['data_emis']) && $_GET['data_emis'] != "") { 
                echo $_GET['data_emis']; 
            } else {
                echo $data = date('H:i d/m/Y');
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>
            Folha individual de Ponto
        </td>
        <td>
            
        </td>
        <td class="text-right">
            Página: 1
        </td>
    </tr>
</table>

<div style="width: 100%; border-top: 3px solid black;"></div>

<table class="cabecalho">
    <tr>
        <td>
            <b>Funcionário:</b>
        </td>
        <td>
            <?= $usuario['nome_usuario'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Função:</b>
        </td>
        <td>
            <?= $usuario['cargo'] ?>
        </td>
        <td>
            <b>CTPS:</b>
        </td>
        <td>
            <?= $usuario['ctps'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>N° de Registro:</b>
        </td>
        <td>
            <?= $usuario['n_registro'] ?>
        </td>
        <td>
            <b>Admissão:</b>
        </td>
        <td>
            <?= implode("/", array_reverse(explode("-", $usuario['admissao']))) ?>
        </td>
    </tr>
</table>

<div style="width: 100%; border-top: 3px solid black;"></div>

<table class="cabecalho">
    <tr>
        <td>
            <b>Jornada de trabalho:</b>
        </td>
        <td>
            Entrada: 8:00 Saída 17:30
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Almoço: 13:00 às 14:00
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Lanche:
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Descanso Semanal: Conforme Escala de Revezamento
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <b>Período:</b>
        </td>
        <td>
            <?php $end2 = $end->modify("-1 day"); ?>
            <?= $begin->format("d/m/Y") . " à " . $end2->format("d/m/Y") ?>
        </td>
    </tr>
</table>

<div class="table-responsive">
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">
                    Dia
                </th>
                <th class="text-center">
                    Entrada
                </th>
                <th colspan="2" class="text-center">
                    Intervalo 
                </th>
                <th class="text-center">
                    Saída
                </th>
                <th style="width: 300px;" class="text-center">
                    Assinatura
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($cond1)) {
                foreach ($period as $dt) { 
                    $cond2 = "reg LIKE '%" . $dt->format("Y-m-d") . "%' ";
            ?>
                <tr id="<?= $dt->format("d/m/Y"); ?>">
                    <td>
                        <?= $dt->format("d"); ?>
                    </td>
                    <?php for ($i = 1; $i<=4; $i++) { ?>
                        <td>
                            <?php 
                                $cond3 = "tipo = $i";
                                $ponto = $crud->query("SELECT reg FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 ");
                                if ($ponto != array()) {
                                    $registrado = explode(" ", $ponto[0]['reg'])[1];
                                }
                            ?>
                            <?= $ponto == array() ? "" : $registrado; ?>
                            <?php //echo $ponto==array() ? "__:__:__" : $registrado; ?>
                        </td>
                    <?php } ?>
                        <td></td>
                <tr>
            <?php 
                } 
            } else {
            ?>
                <tr>
                    <td class="text-center" colspan="5">
                        Usuário e data não selecionados. Por favor, realize uma pesquisa acima.
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php

if (isset($_GET['impr']) && $_GET['impr'] == "0") {
    
} else {
    $link_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $data = "\r\n" . $data . "---" . $link_atual;

    $my_file = './log/folhas.txt';
    $handle = fopen($my_file, 'a') or die('Cannot open file:  ' . $my_file);
    fwrite($handle, $data);
    fclose($handle);
}

?>

<script>
    $( document ).ready(function() {
        //window.print();
        //window.close();
    });
</script>