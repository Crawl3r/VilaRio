<?php
	
    if(isset($_GET['mes'])){
        $mes = $_GET['mes'];
    } else{
        $mes = str_replace("0","",date('m'));
    }
    $funcionario_escala = $crud->pdo_src_escala($mes);
    $funcionarios = $crud->pdo_src('funcionario','ORDER BY nome_funcionario');
	
    //protege de entrada sem login
    if($_SESSION != array()){
        //pass
    }else{
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
    
    switch ($mes){
 
        case 1: $mes = "JANEIRO"; break;
        case 2: $mes = "FEVEREIRO"; break;
        case 3: $mes = "MARÇO"; break;
        case 4: $mes = "ABRIL"; break;
        case 5: $mes = "MAIO"; break;
        case 6: $mes = "JUNHO"; break;
        case 7: $mes = "JULHO"; break;
        case 8: $mes = "AGOSTO"; break;
        case 9: $mes = "SETEMBRO"; break;
        case 10: $mes = "OUTUBRO"; break;
        case 11: $mes = "NOVEMBRO"; break;
        case 12: $mes = "DEZEMBRO"; break;

    }
    
//  echo "<pre>";
//  print_r($_SESSION);
//	echo "</pre>";
    
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
        <?= "ESCALA de $mes de " . date('Y'); ?>
        <div style="float: right;">
            <form class="form form-inline">
                <label>Alterar mês:</label>
                <select onchange="this.form.submit();" class="form-control" name="mes">
                    <option></option>
                    <?php
                    for ($i = 1; $i<13; $i++) {
                        $a = date('Y');
                        if (isset($_GET['mes'])) {
                            echo "<option " . (($i == $_GET['mes']) ? "selected" : "") . " >$i</option>";
                        }else {
                            echo "<option " . ((date('m') == $i) ? "selected" : "") . " >$i</option>";
                        }
                        
                    }
                    ?>
                </select>
            </form>
        </div>
    </div>
    <div class="panel-body">
        
        <?php
        if (@$_SESSION['setor_usuario'] === 'Operacional' || !isset($_SESSION['setor_usuario'])) {
        ?>
        <div class="panel panel-primary">
            <div style="font-size: 12pt" class="panel-heading">
                <form method="POST" class="form form-horizontal" action="<?= HOME ?>/php/cad_escala.php">

                    <div class="container-big">
                        <div class="content">

                            <div class="row">

                                <div class="col-md-2">
                                    <label>Funcionário:</label>
                                    <select required class="form-control" name="id_funcionario_">
                                        <option></option>
                                        <?php
                                        foreach ($funcionarios as $index => $key) {
                                            $id = $key['id_funcionario'];
                                            $nome = $key['nome_funcionario'];
                                            echo "<option value=\"$id\">$nome</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <label>Turno:</label>
                                    <select class="form-control" name="turno_">
                                        <option></option>
                                        <option>DIA</option>
                                        <option>NOITE</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Posto:</label>
                                    <input type="text" class="form-control" name="posto_" />
                                </div>
                                
                                <div class="col-md-2">
                                    <label>Ala:</label>
                                    <input type="text" class="form-control" name="ala_" />
                                </div>

                                <div class="col-md-2">
                                    <label>Horário:</label>
                                    <input type="text" class="form-control" name="horario_" />
                                </div>

                                <div class="col-md-1">
                                    <label>Escala:</label>
                                    <input type="text" class="form-control" name="escala_" />
                                </div>
                                
                                <div class="col-md-1">
                                    <label>Mês:</label>
                                    <select class="form-control" name="mes_">
                                        <option></option>
                                        <?php
                                        for ($i = 1; $i<13; $i++) {
                                            $a = date('Y');
                                            echo "<option value=\"$i/$a\">$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-default btn-block">Lançar</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
        <?php
        }
        ?>

        <br />
        <script>
            $(function(){
                $("#tabela input,#tabela select").on('keyup change',function(){       
                    var index = $(this).parent().index();
                    var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                    var valor = $(this).val().toUpperCase();
                    $("#tabela tbody tr").show();
                    $(nth).each(function(){
                        if($(this).text().toUpperCase().indexOf(valor) < 0){
                            $(this).parent().hide();
                        }
                    });
                });
                $("#tabela input").blur(function(){
                    $(this).val("");
                });
                $("#tabela select").blur(function(){
                    $(this).prop('selectedIndex',0);
                });
            });
        </script>
        <div class="table-responsive">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome:
                        </th>
                        <th>
                            Turno
                        </th>
                        <th>
                            Função
                        </th>
                        <th>
                            Empresa
                        </th>
                        <th>
                            Posto
                        </th>
                        <th>
                            Ala
                        </th>
                        <th>
                            Horário
                        </th>
                        <th>
                            Escala
                        </th>
                        <th>

                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" class="form-control" id="txtColuna1"/></th>
                        <th>
                            <select class="form-control" id="txtColuna2" style="min-width: 100px">
                                <option></option>
                                <option>DIA</option>
                                <option>NOITE</option>
                            </select>
                        </th>
                        <th><input type="text" class="form-control" id="txtColuna3"></th>
                        <th>
                            <select class="form-control" id="txtColuna4" style="min-width: 150px">
                                <option></option>
                                <?php
                                foreach ($empresas_cr as $index => $key) {
                                    echo "<option>$index</option>";
                                }
                                ?>
                            </select>
                        </th>
                        <th><input type="text" class="form-control" id="txtColuna5"/></th>
                        <th><input type="text" class="form-control" id="txtColuna6"/></th>
                        <th><input type="text" class="form-control" id="txtColuna7"/></th>
                        <th><input type="text" class="form-control" id="txtColuna8"/></th>

                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionario_escala as $index=>$key) { ?>
                        <tr class="<?= $key['turno_escala'] === 'DIA' ? 'warning' : 'success' ?>">
                            <td>
                                <?= $key['nome_funcionario'] ?>
                            </td>
                            <td>
                                <?= $key['turno_escala'] ?>
                            </td>
                            <td>
                                <?= $key['cargo_funcionario'] ?>
                            </td>
                            <td>
                                <?php 
                                foreach ($empresas_cr as $index=>$key_e) {
                                    if ($key_e === $key['empresa_funcionario']) {
                                        echo $index;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?= $key['posto_escala'] ?>
                            </td>
                            <td>
                                <?= $key['ala_escala'] ?>
                            </td>
                            <td>
                                <?= $key['horario_escala'] ?>
                            </td>
                            <td>
                                <?= $key['escala_escala'] ?>
                            </td>
                            <!--
                            <td>
                                <form action="edita_usuario_adm" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">Editar</button>
                                </form>
                            </td>
                            -->
                            <?php
                            if (@$_SESSION['setor_usuario'] === 'Operacional' || !isset($_SESSION['setor_usuario'])) {
                            ?>
                                <td>
                                    <form action="php/remove_escala.php" method="POST" onsubmit="return confirm('Realmente deseja remover a escala?');">
                                        <input type="hidden" name="id" value="<?php echo $key['id_escala'] ?>" />
                                        <button class="btn btn-danger" value="<?php echo $key['id_escala'] ?>">Remover</button>
                                    </form>
                                </td>
                            <?php
                            }
                            ?>
                            <!--
                            <td>
                                <form action="php/bloq_usuario.php" method="POST" onsubmit="return confirm('Realmente deseja bloquear o usuario?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">
                                        <?php if ($key['ativo_usuario'] == "1") {echo 'bloquear'; }else {echo 'desbloquear'; } ?>
                                    </button>
                                </form>
                            </td>
                            -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
