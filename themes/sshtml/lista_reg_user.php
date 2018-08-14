<?php

//dados do usuario
$id_u = $_SESSION['id_usuario'];

//recolhe as datas 
date_default_timezone_set('America/Sao_Paulo');
$mes = isset($_GET['valor']) ? explode('-',$_GET['valor'])[1] : date('m');
$ano = isset($_GET['valor']) ? explode('-',$_GET['valor'])[0] : date('Y');
$hora_c = date('H:i:s');

//datas para o loop
if(isset($_GET['valor']) && $_GET['valor']!=""){
    
    $begin = new DateTime($_GET['valor']);
    $begin = $begin->modify("first day of this month");
    
    $end = new DateTime($_GET['valor']);
    $end = $end->modify("last day of this month");
    $end = $end->modify("+1 day");

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);
    
}else{
    
    $begin = new DateTime("first day of this month");
    
    $end = new DateTime("last day of this month");
    $end = $end->modify("+1 day");

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);
    
}

//condição 1
$cond1 = "WHERE id_usuario = '$id_u' ";
	
//recolhe marcações do banco de dados
/*
if(isset($_GET['valor']) && $_GET['valor']!=""){

    $valor = $_GET['valor'];
		
	$cond = "WHERE id_usuario = '$id_u' AND reg LIKE '%$valor%' ";
	
}else{
	$cond = "WHERE id_usuario = '$id_u' ";
}
*/
	
//protege de entrada sem login
if($_SESSION != array()){
    
}else{
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}
	
?>



<style>
    
    .form-control {
        margin: 0;
    }

    td{
        padding: 3px !important;
    }    
    
</style>

<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
		Gerência de Pontos
		<form style="display: inline-block; float: right;" class="form form-inline" method="GET" action="<?= HOME ?>/lista_reg_user">
			<input class="form-control" type="month" name="valor" value="<?= $ano . "-" . $mes ?>" />
			<button type="submit" class="btn btn-primary" style="margin-top: -10px">Pesquisar</button>
		</form>
	</div>
    <div class="panel-body">

        <br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Dia
                        </th>
                        <th>
                            Entrada
                        </th>
                        <th>
                            Intervalo (Entrada)
                        </th>
                        <th>
                            Intervalo (Saída)
                        </th>
                        <th>
                            Saída
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($period as $dt) { 
                        $cond2 = "reg LIKE '%".$dt->format("Y-m-d")."%' ";
                    ?>
                        <tr <?= date('Y-m-d')==$dt->format("Y-m-d") ? "class='success'" : "" ?> id="<?= $dt->format("d/m/Y"); ?>">
                            <td>
                                <?= $dt->format("d/m/Y"); ?>
                            </td>
                            <?php for($i=1;$i<=4;$i++){ ?>
                                <td>
                                    <?php 
                                        $cond3 = "tipo = $i";
                                        $ponto = $crud->query("SELECT reg FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 ");
                                        if($ponto != array()){
                                            $registrado = explode(" ",$ponto[0]['reg'])[1];
                                            if($i==1){
                                                $entrada_yn = true;
                                            }
                                        }
                                    ?>
                                    <form method="POST" class="form form-inline" action="<?= $ponto==array() ? 'php/add_reg.php' : '' ; ?>">
                                        <input type="hidden" name="tipo" value="<?= $i ?>" />
                                        <input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>" />
                                        <input type="hidden" name="dia" value="<?= $dt->format("Y-m-d") ?>" />
                                        <input class="form-control" type="time" name="reg" step="1" value="<?= $ponto==array() ? date('H:i:s') : $registrado; ?>" 
                                               <?= $ponto!=array() ?  "readonly" : "" ; ?> 
                                               <?= ($i==1 || $i==4) ? "readonly" : "" ; ?>/>
                                        <?php
                                            //echo $i . "-" .  $entrada_yn;
                                            if($ponto == array() && date('Y-m-d')==$dt->format("Y-m-d")){
                                                if($i==4){
                                                    if($entrada_yn){
                                                       echo "<button type='submit' class='btn btn-xs btn-success'>"
                                                        . "<img style='width: 20px;' src='".SAVE_BTN."' />"
                                                        . "</button>";
                                                    }else{
                                                        ?><?php
                                                        echo '<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="É necessário que o horário de entrada seja registrado.">'
                                                        . "<button disabled type='submit' class='btn btn-xs btn-danger'>"
                                                        . "<img style='width: 20px;' src='".SAVE_BTN."' />"
                                                        . "</button></span";
                                                    }
                                                }else{
                                                    echo "<button type='submit' class='btn btn-xs btn-success'>"
                                                    . "<img style='width: 20px;' src='".SAVE_BTN."' />"
                                                    . "</button>";
                                                }
                                            }
                                        ?>
                                    </form>
                                </td>
                            <?php } $entrada_yn = 0; ?>
                        <tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>$('[data-toggle="tooltip"]').tooltip();</script>