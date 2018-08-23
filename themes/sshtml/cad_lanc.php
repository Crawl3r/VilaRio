<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {
    if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nome_usuario'] == 'Gisele') {
        
    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}

$contratos = $crud->query('SELECT * FROM tb_contrato');

date_default_timezone_set('America/Sao_Paulo');

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
    <div style="font-size: 14pt" class="panel-heading">Novo</div>
    <div class="panel-body">

        <div class="container-fluid">

            <form class="form-horizontal" role="form" action="php/cad_lanc.php" method="POST">

                <div class="row">

                    <input type="hidden" name="id_func_l" value="<?= $_SESSION['id_usuario'] ?>" />
                    
                    <div class="col-md-6">

                        <label>Contrato: </label>
                        <select required class="form-control" name="id_contrato" />
                            <option></option>
                            <?php foreach($contratos as $key){ ?>
                                <option value="<?= $key['id_contrato'] ?>">
                                    <?= $key['local'] . " - CNPJ:" . $key['cnpj'] ?>
                                </option>
                            <?php } ?>
                        </select>
                            
                    </div>
                    
                    <div class="col-md-3">
                        <label>Empresa: </label>
                        <select class="form-control" type="text" name="empresa">
                            <option></option>
                            <?php
                            foreach ($empresas_cr as $index => $key) {
                                echo "<option value=\"$key\">$index</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        
                        <label>Efetivo: </label>
                        <input class="form-control" name="efetivo" />

                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-4">
                        
                        <label>Mês e Ano: </label>
                        <input placeholder="mm/aaaa" class="form-control i-mesano" name="mes_ano" />
                        
                        <label>Unid. de Cobrança: </label>
                        <input class="form-control" name="tipo_cobr" value="Horas" />
                        
                        <label>Valor da Unid.: </label>
                        <input class="form-control" type="number" step=".01" name="valor_h" />
                        
                    </div>
                    
                    <div class="col-md-8">

                        <label>Observações: </label>
                        <textarea rows="8" class="form-control" name="obs_retencoes"></textarea>

                    </div>
                    
                </div>

                <div class="row">

                    <div class="col-md-3">

                        <label>Desconto (em unid.): </label>
                        <input class="form-control" type="number" name="desco" />

                    </div>

                    <div class="col-md-3">

                        <label>Data de emissão: </label>
                        <input class="form-control" type="date" name="d_emis" value="<?= date('Y-m-d') ?>" />

                    </div>
                    
                    <div class="col-md-3">

                        <label>Data de Vencimento: </label>
                        <input class="form-control" type="date" name="d_venc" />

                    </div>
                    
                    <div class="col-md-3">

                        <label>Nota Fiscal: </label>
                        <input class="form-control" name="nf" />

                    </div>

                </div>
                
                <hr></hr>
                
                <div class="row seven-cols">
                    
                    <?php for($i=1; $i<32; $i++){ ?>
                        <div class="col-md-1">
                            <label>Dia <?= $i ?>: </label>
                            <input class="form-control" type="number" value="12" name="dia_<?= $i ?>" />
                        </div>
                    <?php } ?>
                    
                </div>
                
                <?php for($i=1;$i<=3;$i++){ ?>
                    <div class="row">

                         <div class="col-md-9">

                            <label>Outros <?=$i?>: </label>
                            <input class="form-control" type="text" name="descr_extra_<?=$i?>" />

                        </div>

                        <div class="col-md-3">

                            <label>Valor: </label>
                            <input class="form-control" type="number" step=".01" name="val_extra_<?=$i?>" />

                        </div>

                    </div>
                <?php } ?>

                <div class="row">                    
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>

<br /><br /><br />