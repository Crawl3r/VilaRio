<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {

} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}
$funcionario = $crud->pdo_src('funcionario', ' WHERE id_funcionario = ' . $_GET['id'] . ' ');
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Edição de Funcionário</div>
    <div class="panel-body">

        <form class="form form-horizontal" enctype="multipart/form-data" role="form" action="php/edita_func.php" method="POST">
            <input type="hidden" name="id_" value="<?= $funcionario[0]['id_funcionario'] ?>" />
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <label>Nome: </label>
                        <input class="form-control" type="text" name="nome_" value="<?= $funcionario[0]['nome_funcionario'] ?>" />
                    </div>
                    <div class="col-md-3">
                        <label>Empresa: </label>
                        <select class="form-control" type="text" name="empresa_">
                            <option></option>
                            <?php
                            foreach ($empresas_cr as $index => $key) {
                                echo "<option ";
                                echo ($key === $funcionario[0]['empresa_funcionario']) ? "selected" : "";
                                echo " value=\"$key\">$index</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Cargo: </label>
                        <input class="form-control" type="text" name="cargo_" value="<?= $funcionario[0]['cargo_funcionario'] ?>" />
                    </div>
                    <div class="col-md-3">
                        <label>Foto 3x4: </label>
                        <input type="file" name="foto_" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>CTPS: </label>
                        <input class="form-control" type="text" name="ctps_" value="<?= $funcionario[0]['ctps_funcionario'] ?>" />
                    </div>
                    <div class="col-md-2">
                        <label>RG: </label>
                        <input class="form-control" type="text" name="rg_" value="<?= $funcionario[0]['rg_funcionario'] ?>" />
                    </div>
                    <div class="col-md-2">
                        <label>CPF: </label>
                        <input class="form-control i-cpf" type="text" name="cpf_" value="<?= $funcionario[0]['cpf_funcionario'] ?>" />
                    </div>
                    <div class="col-md-2">
                        <label>DRT:RJ: </label>
                        <input class="form-control" type="text" name="drtrj_" value="<?= $funcionario[0]['drtrj_funcionario'] ?>" />
                    </div>
                    <div class="col-md-2">
                        <label>CNV: </label>
                        <input class="form-control" type="text" name="cnv_" value="<?= $funcionario[0]['cnv_funcionario'] ?>" />
                    </div>
                    <div class="col-md-2">
                        <label>Data Exp.: </label>
                        <input class="form-control" type="date" name="data_exp_" value="<?= $funcionario[0]['data_exp_funcionario'] ?>" />
                    </div>
                </div>
            </div>

            <br />
            <button class="btn btn-primary btn-block" type="submit">Salvar</button>
        </form>
    </div>
</div>

