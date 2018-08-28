<?php

//dados do usuario
$id_u = $_SESSION['id_usuario'];

//usuários
$usuarios = $crud->query("SELECT * FROM tb_usuario");

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
        padding: 3px !important;
    }    
    
</style>

<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
        &nbsp;
		<!-- Folhas de Pontos -->
        <?php if (isset($_GET['valor']) && $_GET['valor'] != "" && isset($_GET['user']) && $_GET['user'] != "") { ?>
            <a target="blank" class="btn btn-success" href="<?= HOME ?>/impr_reg_admin?user=<?=$_GET['user']?>&valor=<?=$_GET['valor']?>">Gerar Folha</a>
        <?php } ?>
		<form style="display: inline-block; float: right;" class="form form-inline" method="GET" action="<?= HOME ?>/lista_reg_geral">
            <select required class="form-control" name="user">
                <option></option>
                <?php 
                foreach ($usuarios as $key) {
                    if ($_GET['user'] == $key['id_usuario']) {
                        echo "<option selected value=" . $key['id_usuario'] . ">" . $key['nome_usuario'] . "</option>";
                    } else {
                        echo "<option value=" . $key['id_usuario'] . ">" . $key['nome_usuario'] . "</option>";
                    }
                }
                ?>
            </select>
			<input required class="form-control" type="month" name="valor" value="<?= $ano . "-" . $mes ?>" />
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
                        <th>
                            Obs.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($cond1)) {
                        foreach ($period as $dt) { 
                            $cond2 = "reg LIKE '%" . $dt->format("Y-m-d") . "%' ";
                    ?>
                        <tr <?= date('Y-m-d') == $dt->format("Y-m-d") ? "class='success'" : "" ?> id="<?= $dt->format("d/m/Y"); ?>">
                            <td>
                                <?= $dt->format("d/m/Y"); ?>
                            </td>
                            <?php for ($i = 1; $i<=4; $i++) { ?>
                                <td>
                                    <?php 
                                        $cond3 = "tipo = $i";
                                        $ponto = $crud->query("SELECT reg FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 ");
                                        $obs = $crud->query("SELECT * FROM tb_obs_dia $cond1 AND dia LIKE '%" . $dt->format("Y-m-d") . "%' ");
                                        if ($ponto != array()) {
                                            $registrado = explode(" ", $ponto[0]['reg'])[1];
                                            if ($i == 1) {
                                                $entrada_yn = true;
                                            }
                                        }
                                    ?>
                                    <form method="POST" class="form form-inline" action="php/add_reg_geral.php">
                                        <input type="hidden" name="mes_retorno" value="<?= $_GET['valor'] ?>" />
                                        <input type="hidden" name="tipo" value="<?= $i ?>" />
                                        <input type="hidden" name="id_usuario" value="<?= $_GET['user'] ?>" />
                                        <input type="hidden" name="dia" value="<?= $dt->format("Y-m-d") ?>" />
                                        <input class="form-control" type="time" name="reg" step="1" value="<?= $ponto == array() ? date('H:i:s') : $registrado; ?>" 
                                                />
                                        <?php
                                            if ($ponto == array()) {
                                                echo "<button class='btn btn-xs btn-warning'>"
                                                . "<img style='width: 20px;' src='" . NO_BTN . "' />"
                                                . "</button>";
                                            } else {
                                                echo "<button class='btn btn-xs btn-success'>"
                                                . "<img style='width: 20px;' src='" . OK_BTN . "' />"
                                                . "</button>";
                                            }
                                        ?>
                                    </form>
                                </td>
                            <?php } $entrada_yn = 0; ?>
                            <td>
                                <form method="POST" class="form form-inline" action="php/add_obs_ponto.php">
                                    <input type="hidden" name="mes_retorno" value="<?= $_GET['valor'] ?>" />
                                    <input type="hidden" name="id_usuario" value="<?= $_GET['user'] ?>" />
                                    <input type="hidden" name="dia" value="<?= $dt->format("Y-m-d") ?>" />
                                    <textarea lines="3" style="resize: none;" cols="40" class="form-control" 
                                              type="text" name="obs" placeholder="Observações" 
                                              onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"><?= $obs != array() ? $obs[0]['obs'] : "" ?></textarea>
                                </form>
                            </td>
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
    </div>
</div>

<script>$('[data-toggle="tooltip"]').tooltip();</script>