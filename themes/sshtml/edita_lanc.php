<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {
    if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nome_usuario'] == 'Gisele') {
        
    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}

//print_r($_SESSION);

$contratos = $crud->query('SELECT * FROM tb_contrato');

date_default_timezone_set('America/Sao_Paulo');

$chamado = $crud->pdo_src('lanc', 'WHERE id_lanc=' . $_GET['id_l'])[0];
?>
<style>
    @media (min-width: 768px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1  {
            width: 100%;
        }
    }

    @media (min-width: 992px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
        }
    }

    @media (min-width: 1200px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
        }
    }
</style>
<div class="panel panel-default panel-big">
    <div style="font-size: 14pt" class="panel-heading">
        Edição
        <div style="display: inline-block; float: right;">
            <a target="blank" href="<?= HOME . "/impr_lanc?id_l=" . $_GET['id_l'] ?>" class="btn btn-success">Impressão</a>
        </div>
    </div>
    <div class="panel-body">

        <div class="container-fluid">

            <form class="form-horizontal" role="form" action="php/edita_lanc.php" method="POST">

                <div class="row">

                    <div class="row">                    
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                        </div>
                    </div>

                </div>

                <hr></hr>

                <div class="row">

                    <input type="hidden" name="id_lanc" value="<?= $_GET['id_l'] ?>" />
                    <input type="hidden" name="id_func_l" value="<?= $_SESSION['id_usuario'] ?>" />

                    <div class="col-md-9">

                        <label>Contrato: </label>
                        <select required class="form-control" name="id_contrato" />
                            <option></option>
                            <?php foreach($contratos as $key){ ?>
                                <option <?= ($chamado['id_contrato'] == $key['id_contrato']) ? "selected" : "" ?> value="<?= $key['id_contrato'] ?>">
                                    <?= $key['local'] . " - CNPJ:" . $key['cnpj'] ?>
                                </option>
                            <?php } ?>
                        </select>
                            
                    </div>

                    <div class="col-md-3">

                        <label>Efetivo: </label>
                        <input class="form-control" name="efetivo" value="<?= $chamado['efetivo'] ?>" />

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">

                        <label>Mês e Ano: </label>
                        <input placeholder="mm/aaaa" class="form-control i-mesano" name="mes_ano" value="<?= $chamado['mes_ano'] ?>" />

                        <label>Unid. de Cobrança: </label>
                        <input class="form-control" name="tipo_cobr" value="<?= $chamado['tipo_cobr'] ?>" />

                        <label>Valor da Unid.: </label>
                        <input class="form-control" type="number" step=".01" name="valor_h" value="<?= $chamado['valor_h'] ?>" />

                    </div>

                    <div class="col-md-8">

                        <label>Observações: </label>
                        <textarea rows="8" class="form-control" name="obs_retencoes"><?= $chamado['obs_retencoes'] ?></textarea>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3">

                        <label>Desconto (em unid.): </label>
                        <input class="form-control" type="number" name="desco" value="<?= $chamado['desco'] ?>" />

                    </div>

                    <div class="col-md-3">

                        <label>Data de emissão: </label>
                        <input class="form-control" type="date" name="d_emis" value="<?= $chamado['d_emis'] ?>" />

                    </div>

                    <div class="col-md-3">

                        <label>Data de Vencimento: </label>
                        <input class="form-control" type="date" name="d_venc" value="<?= $chamado['d_venc'] ?>" />

                    </div>

                    <div class="col-md-3">

                        <label>Nota Fiscal: </label>
                        <input class="form-control" name="nf" value="<?= $chamado['nf'] ?>" />

                    </div>

                </div>

                <hr></hr>

                <div class="row seven-cols">

                    <?php $tot = 0;
                    for ($i = 1; $i < 32; $i++) { ?>
                        <div class="col-md-1">
                            <label>Dia <?= $i ?>: </label>
                            <input class="form-control" type="number" name="dia_<?= $i ?>" value="<?= $chamado['dia_' . $i] ?>" />
                        </div>
                        <?php $tot += $chamado['dia_' . $i];
                    } ?>

                </div>
                
                <div class="row">
                    
                     <div class="col-md-9">

                        <label>Descrição dos Extras (Caso Houverem): </label>
                        <input class="form-control" type="text" name="descr_extra" value="<?= $chamado['descr_extra'] ?>" />

                    </div>
                    
                    <div class="col-md-3">

                        <label>Valor: </label>
                        <input class="form-control" type="number" step=".01" name="val_extra" value="<?= $chamado['val_extra'] ?>" />

                    </div>
                    
                </div>

                <div class="row">

                    <table class="table table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Num. de <?= ucfirst($chamado['tipo_cobr']) ?></th>
                                <th></th>
                                <th>Valor</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr class="success">
                                <td>Hora Normal</td>
                                <td><?= $tot ?></td>
                                <td>X</td>
                                <td>R$<?= number_format($chamado['valor_h'], 2, ",", "") ?></td>
                                <td><?= "R$" . number_format($r1 = $tot * $chamado['valor_h'], 2, ",", "") ?></td>
                            </tr>
                            
                             <tr class="success">
                                <td>Extras</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td><?= "R$" . number_format($re = $chamado['val_extra'], 2, ",", "") ?></td>
                            </tr>

                            <tr class="warning">
                                <td>Desconto em <?= ucfirst($chamado['tipo_cobr']) ?></td>
                                <td><?= $chamado['desco'] ?></td>
                                <td>X</td>
                                <td>R$<?= number_format($chamado['valor_h'], 2, ",", "") ?></td>
                                <td>(<?= "R$" . number_format($r2 = $chamado['desco'] * $chamado['valor_h'], 2, ",", "") ?>)</td>
                            </tr>
                            <tr class="success">
                                <td>Subtotal</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td><?= "R$" . number_format($r3 = $r1 - $r2 + $re, 2, ",", "") ?></td>
                            </tr>

                            <tr class="warning">
                                <td>Ret. 11% INSS</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>(<?= "R$" . number_format($s1 = $r3 * 0.11, 2, ",", "") ?>)</td>
                            </tr>

                            <tr class="warning">
                                <td>Ret. 065% Pis</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>(<?= "R$" . number_format($s2 = $r3 * 0.0065, 2, ",", "") ?>)</td>
                            </tr>

                            <tr class="warning">
                                <td>Ret. 3% Cofins</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>(<?= "R$" . number_format($s3 = $r3 * 0.03, 2, ",", "") ?>)</td>
                            </tr>

                            <tr class="warning">
                                <td>Ret. 1% CSLL</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>(<?= "R$" . number_format($s4 = $r3 * 0.01, 2, ",", "") ?>)</td>
                            </tr>

                            <tr class="success">
                                <td>Valor da Fatura</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td><b><?= "R$" . number_format($r3 - ($s1 + $s2 + $s3 + $s4), 2, ",", "") ?></b></td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </form>

        </div>

    </div>
</div>

<br /><br /><br />