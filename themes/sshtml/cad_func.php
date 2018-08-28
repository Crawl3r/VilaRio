<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {

} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Cadastro de Funcionário</div>
    <div class="panel-body">

        <form class="form form-horizontal" enctype="multipart/form-data" role="form" action="php/cad_func.php" method="POST">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <label>Nome: </label>
                        <input class="form-control" type="text" name="nome_" />
                    </div>
                    <div class="col-md-3">
                        <label>Empresa: </label>
                        <select class="form-control" type="text" name="empresa_">
                            <option></option>
                            <?php
                            foreach ($empresas_cr as $index => $key) {
                                echo "<option value=\"$key\">$index</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Cargo: </label>
                        <input class="form-control" type="text" name="cargo_" />
                    </div>
                    <div class="col-md-3">
                        <label>Foto 3x4: </label>
                        <input type="file" name="foto_" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>CTPS: </label>
                        <input class="form-control" type="text" name="ctps_" />
                    </div>
                    <div class="col-md-2">
                        <label>RG: </label>
                        <input class="form-control" type="text" name="rg_" />
                    </div>
                    <div class="col-md-2">
                        <label>CPF: </label>
                        <input class="form-control i-cpf" type="text" name="cpf_" />
                    </div>
                    <div class="col-md-2">
                        <label>DRT:RJ: </label>
                        <input class="form-control" type="text" name="drtrj_" />
                    </div>
                    <div class="col-md-2">
                        <label>CNV: </label>
                        <input class="form-control" type="text" name="cnv_" />
                    </div>
                    <div class="col-md-2">
                        <label>Data Exp.: </label>
                        <input class="form-control i-data" type="text" name="data_exp_" />
                    </div>
                </div>
            </div>

            <br />
            <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
        </form>
    </div>
</div>

