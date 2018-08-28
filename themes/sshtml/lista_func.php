<?php
	
if (!isset($_GET['campo'])) {
    $funcionarios = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
}else if ($_GET['campo'] != "tb_empresa.nome_empresa") {
	
    $campo = $_GET['campo'];
    $valor = $_GET['valor'];
	
    $sql = "
		SELECT * FROM tb_funcionario
		
		WHERE $campo LIKE '%$valor%' ORDER BY nome_funcionario";
		
    $funcionarios = $crud->query($sql);
	
}else if ($_GET['valor'] != "") {
	
    $funcionarios = array();
	
    $funcionarios_t = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
	
    foreach ($funcionarios_t as $index => $key) {
		
        $key_e = array_search($key['empresa_funcionario'], $empresas_cr);
		
        $resp = strpos($key_e, $_GET['valor']);
		
        if ($resp !== false) {
            $funcionarios[] = $key;
        }
		
    }
	
}else {
    $funcionarios = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
}
	
    //protege de entrada sem login
    if ($_SESSION != array()) {
//		if(@$_SESSION['nivel_usuario']==='usuario'){
//			echo "<script>window.location.href='" . HOME . "/403';</script>";
//		}
    }else {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
	
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
		Gerência de Funcionários
		<form style="display: inline-block; float: right;" class="form form-inline" method="GET" action="<?= HOME ?>/lista_func">
			<select class="form-control" name="campo">
				<option value="tb_empresa.nome_empresa">Empresa</option>
				<option value="tb_funcionario.cargo_funcionario">Cargo</option>
			</select>
			<input class="form-control" type="text" name="valor" placeholder="Valor da Pesquisa..." />
			<button type="submit" class="btn btn-primary" style="margin-top: -10px">Pesquisar</button>
		</form>
	</div>
    <div class="panel-body">
        
        <a href="cad_func" class="btn btn-primary btn-block">Cadastrar funcionário</a>

        <br /><br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome:
                        </th>
                        <th>
                            Empresa:
                        </th>
                        <th>
                            Cargo:
                        </th>
                        <th colspan="2">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $index=>$key) { ?>
                        <tr>
                            <td>
                                <?= $key['nome_funcionario'] ?>
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
                                <?= $key['cargo_funcionario'] ?>
                            </td>
                            <td>
                                <form action="edita_func" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $key['id_funcionario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_funcionario'] ?>">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="php/remove_func.php" method="POST" onsubmit="return confirm('Realmente deseja remover o funcionário?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_funcionario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_funcionario'] ?>">Remover</button>
                                </form>
                            </td>
                            <!--
                            <td>
                                <form action="php/bloq_usuario.php" method="POST" onsubmit="return confirm('Realmente deseja bloquear o usuario?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">
                                        <?php if ($key['ativo_usuario'] == "1") {echo 'bloquear'; } else {echo 'desbloquear'; } ?>
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
