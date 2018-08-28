<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {
    if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nivel_usuario'] == 'usuario') {
        
    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}

date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('Y-m-d') . "T" . date('H:i:s');

$empresas = $crud->pdo_src('empresa', '');
$funcionarios = $crud->pdo_src('usuario', '');
?>
<div class="panel panel-default panel-big">
    <div style="font-size: 14pt" class="panel-heading">Novo</div>
    <div class="panel-body">

        <div class="container-fluid">

            <form class="form-horizontal" role="form" action="php/cad_chamado.php" method="POST">

                <div class="row">

                    <input type="hidden" name="id_func_a_" value="<?= $_SESSION['id_usuario'] ?>" />
                    
                    <div class="col-md-3">

                        <label>Funcionário Requerente: </label>
                        <input required class="form-control" name="func_alvo_" />
                            
                    </div>

                    <div class="col-md-3">

                        <label>Empresa Referente: </label>
                        <select required class="form-control" name="id_emp_">
                            <option></option>
                            <?php
                            foreach ($empresas as $key) {
                                $id = $key['id_empresa'];
                                $nome = $key['nome_empresa'];
                                echo "<option value=$id>$nome</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-3">

                        <label>Categoria: </label>
                        <select required class="form-control" name="categoria_">
                            <option></option>
                            <?php
                            foreach (CAT_CH as $key) {
                                echo "<option value=\"$key\">$key</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-3">
                        
                        <label>Data de Abertura: </label>
                        <input class="form-control" type="datetime-local" value="<?= $data_atual ?>" name="d_h_a_" />

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label>Desc: </label>
                        <textarea rows="8" class="form-control" name="desc_"></textarea>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">

                        <label>Responsável: </label>
                        <select disabled class="form-control" name="id_func_f_">
                            <option></option>
                            <?php
                            foreach ($funcionarios as $key) {
                                $id = $key['id_eusuario'];
                                $nome = $key['nome_usuario'];
                                echo "<option value=$id>$nome</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-4">

                        <label>Data de Fechamento: </label>
                        <input disabled class="form-control" type="datetime-local" name="d_h_f_" />

                    </div>

                    <div class="col-md-4">

                        <label>Status: </label>
                        <br />
                        <label class="radio-inline">
                            <input disabled type="radio" value="aberto" name="status_" />Aberto
                        </label>
                        <label class="radio-inline">
                            <input disabled type="radio" value="fechado" name="status_" />Fechado
                        </label>

                    </div>

                </div>
                
                <div class="row">
                    <div class="col-md-12">

                        <label>Resposta: </label>
                        <textarea disabled rows="8" class="form-control" name="resposta_"></textarea>

                    </div>
                </div>

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