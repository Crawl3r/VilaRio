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
$chamado = $crud->pdo_src('chamado', 'WHERE id_chamado=' . $_GET['id_c']);
$anexos = $crud->pdo_src('midia_ch', 'WHERE id_ch_midia_ch = ' . $_GET['id_c']);

if ($chamado[0]['status_chamado'] === 'aberto') {
    $url = 'php/edita_chamado.php';
    $submit = '';
} else {
    $url = '#';
    $submit = 'disabled';
}
?>
<div class="panel panel-default panel-big">
    <div style="font-size: 14pt" class="panel-heading">Novo</div>
    <div class="panel-body">

        <div class="container-fluid">

            <form class="form-horizontal" role="form" action="<?= $url ?>" method="POST">

                <div class="row">

                    <input type="hidden" name="id_" value="<?= $_GET['id_c'] ?>" />
                    <input type="hidden" name="id_func_a_" value="<?= $_SESSION['id_usuario'] ?>" />

                    <div class="col-md-3">

                        <label>Funcionário Requerente: </label>
                        <input required class="form-control" name="func_alvo_" value="<?= $chamado[0]['func_alvo_chamado'] ?>" />

                    </div>

                    <div class="col-md-4">

                        <label>Empresa Referente: </label>
                        <select required class="form-control" name="id_emp_">
                            <option></option>
                            <?php
                            foreach ($empresas as $key) {
                                $id = $key['id_empresa'];
                                $nome = $key['nome_empresa'];
                                if ($id === $chamado[0]['id_emp_chamado']) {
                                    echo "<option selected value=$id>$nome</option>";
                                } else {
                                    echo "<option value=$id>$nome</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-4">

                        <label>Categoria: </label>
                        <select required class="form-control" name="categoria_">
                            <option></option>
                            <?php
                            foreach ($CAT_CH as $key) {
                                if ($key === $chamado[0]['categoria_chamado']) {
                                    echo "<option selected value=\"$key\">$key</option>";
                                } else {
                                    echo "<option value=\"$key\">$key</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-4">

                        <?php $data_a = str_replace(' ', 'T', $chamado[0]['d_h_a_chamado']) ?>
                        <label>Data de Abertura: </label>
                        <input class="form-control" type="datetime-local" value="<?= $data_a ?>" name="d_h_a_" />

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label>Desc: </label>
                        <textarea rows="8" class="form-control" name="desc_"><?= $chamado[0]['desc_chamado'] ?></textarea>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">

                        <label>Responsável: </label>
                        <select class="form-control" name="id_func_f_">
                            <option></option>
                            <?php
                            foreach ($funcionarios as $key) {
                                $id = $key['id_usuario'];
                                $nome = $key['nome_usuario'];
                                if ($id === $chamado[0]['id_func_f_chamado']) {
                                    echo "<option selected value=$id>$nome</option>";
                                } else {
                                    echo "<option value=$id>$nome</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-4">

                        <?php $data_f = str_replace(' ', 'T', $chamado[0]['d_h_f_chamado']) ?>
                        <label>Data de Fechamento: </label>
                        <input class="form-control" type="datetime-local" name="d_h_f_" value="<?= $data_f ?>" />

                    </div>

                    <div class="col-md-4">

                        <label>Status: </label>
                        <br />
                        <label class="radio-inline">
                            <input <?php
                            if ($chamado[0]['status_chamado'] === 'aberto') {
                                echo 'checked';
                            }
                            ?> 
                                type="radio" value="aberto" name="status_" />Aberto
                        </label>
                        <label class="radio-inline">
                            <input <?php
                            if ($chamado[0]['status_chamado'] === 'fechado') {
                                echo 'checked';
                            }
                            ?>
                                type="radio" value="fechado" name="status_" />Fechado
                        </label>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label>Resposta: </label>
                        <textarea required rows="8" class="form-control" name="resposta_"><?= $chamado[0]['resposta_chamado'] ?></textarea>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button <?= $submit ?> class="btn btn-primary btn-block" type="submit">Salvar</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>

<br />

<div class="panel panel-default panel-big">
    <div style="font-size: 14pt" class="panel-heading"></div>
    <div class="panel-body">
        <form enctype="multipart/form-data" class="form form-inline" role="form" action="php/up_midia_ch.php" method="POST">
            <input type="hidden" name="id_ch_" value="<?= $_GET['id_c'] ?>" />
            <label>Novo Anexo</label>
            <input type="file" name="caminho_" />
            <br />
            <input type="submit" value="Cadastrar" />
        </form>
        
        <br /><br />

        <div class="panel panel-default panel-big">
            <div style="font-size: 14pt" class="panel-heading">Anexos</div>
            <div class="panel-body">
                <?php
                    foreach($anexos as $index=>$key){
                        echo "<a download href='";
                        echo $key['caminho_midia_ch'];
                        echo "' >";
                        echo "Anexo ".($index+1);
                        echo "</a>"." - ".explode("/",$key['caminho_midia_ch'])[5]."<br /><hr>";
                    }
                ?>
            </div>
        </div>

    </div>
</div>

<br /><br /><br />

