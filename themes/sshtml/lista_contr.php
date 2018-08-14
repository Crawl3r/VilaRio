<?php
	
	$contratos = $crud->query('SELECT * FROM tb_contrato');
    
//    echo "<pre>";
//    print_r($chamados);
//    echo "</pre>";
	
	//protege de entrada sem ser ADM
    if ($_SESSION != array()) {
        if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nome_usuario'] == 'Gisele') {

        }
    } else {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
	
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Faturas</div>
    <div class="panel-body">
        
        <div class="row">
            
            <form class="form from-inline" action="php/cad_contr.php" method="post">
                
                <div class="col-md-3">
                    <label>Local</label>
                    <input class="form-control" type="text" name="local" />
                </div>
                
                <div class="col-md-3">
                    <label>Endereço</label>
                    <input class="form-control" type="text" name="endereco" />
                </div>
                
                <div class="col-md-3">
                    <label>CNPJ</label>
                    <input class="form-control" type="text" name="cnpj" />
                </div>
                
                <div class="col-md-3">
                    <br />
                    <button type="submit" class="btn btn-success btn-block">Gravar</button>
                </div>

            </form>
            
        </div>

        <br /><br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Local
                        </th>
                        <th>
                            Endereço
                        </th>
                        <th>
                            CNPJ
                        </th>
                        <th>
                            Oper.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contratos as $index=>$key){  ?>
                    <form class="form from-inline" action="php/edita_contr.php" method="post">
                        <input type="hidden" name="id_contrato" value="<?= $key['id_contrato'] ?>" />
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="local" value="<?= $key['local'] ?>" />
                            </td>
                            <td>
                                <input class="form-control" type="text" name="endereco" value="<?= $key['endereco'] ?>" />
                            </td>
                            <td>
                                <input class="form-control" type="text" name="cnpj" value="<?= $key['cnpj'] ?>" />
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
