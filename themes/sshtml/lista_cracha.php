<?php

if(!isset($_GET['campo'])){
	
	$funcionarios = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
	
}else if($_GET['campo']!="tb_empresa.nome_empresa"){
	
	$campo = $_GET['campo'];
	$valor = $_GET['valor'];
	
	$sql = "
		SELECT * FROM tb_funcionario
		
		WHERE $campo LIKE '%$valor%' ORDER BY nome_funcionario";
		
	$funcionarios = $crud->query($sql);
	
}else if($_GET['valor']!=""){
	
	$funcionarios = array();
	
	$funcionarios_t = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
	
	foreach($funcionarios_t as $index => $key){
		
		$key_e = array_search($key['empresa_funcionario'], $empresas_cr);
		
		$resp = strpos($key_e,$_GET['valor']);
		
		if($resp !== false){
			$funcionarios[] = $key;
		}
		
	}
	
}else{
	$funcionarios = $crud->pdo_src('funcionario', 'ORDER BY nome_funcionario');
}

//print_r($funcionarios);


//protege de entrada sem login
if ($_SESSION != array()) {
//    if (@$_SESSION['nivel_usuario'] === 'usuario') {
//        echo "<script>window.location.href='" . HOME . "/403';</script>";
//    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}
?>

<script>
    var ativo = 0;
    function io(ativo) {
        if(ativo===0){
            $(".ch:not(.active)").click();
            return ativo = 1;
        }else{
            $(".ch.active").click();
            return ativo = 0;
        }
    };
</script>

<style>
    .btn span.glyphicon {    			
        opacity: 0;				
    }
    .btn.active span.glyphicon {				
        opacity: 1;				
    }
    .material-switch > input[type="checkbox"] {
        display: none;   
    }
</style>

<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
		Geraçao de Crachás
		<form style="display: inline-block; float: right;" class="form form-inline" method="GET" action="<?= HOME ?>/lista_cracha">
			<select class="form-control" name="campo">
				<option value="tb_empresa.nome_empresa">Empresa</option>
				<option value="tb_funcionario.cargo_funcionario">Cargo</option>
			</select>
			<input class="form-control" type="text" name="valor" placeholder="Valor da Pesquisa..." />
			<button type="submit" class="btn btn-primary" style="margin-top: -10px">Pesquisar</button>
		</form>
	</div>
    <div class="panel-body">

        <form onsubmit="return confirm('Realmente deseja Gerar os cracrás?');" target="blank" action="./cracha_impr" method="POST">

            <button type="submit" onclick="location.reload();" class="btn btn-primary btn-block">Gerar Crachás</button>

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
                            <th style="text-align: center;">
                                Impresso:
                            </th>
							<th style="text-align: center;">
                                Última Impressão:
                            </th>
                            <th style="width: 200px; text-align: center;">                              
                                <div onclick="ativo=io(ativo);" id="todos" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="checkbox" />
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </label>
                                </div>
                                </td>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($funcionarios as $index => $key) { ?>
                            <tr>
                                <td>
                                    <?= $key['nome_funcionario'] ?>
                                </td>
                                <td>
                                    <?php
                                    foreach ($empresas_cr as $index => $key_e) {
                                        if ($key_e === $key['empresa_funcionario']) {
                                            echo $index;
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $key['cargo_funcionario'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php
                                        $sim = '<label class="btn btn-danger">
                                        Sim
                                        </label>';
                                        
                                        $nao = '<label class="btn btn-success">
                                        Não
                                        </label>';
                                        
                                        echo $key['impresso_yn_funcionario']==='1' ? $sim : $nao ;
                                    ?>
                                </td>
								<td class="text-center">
									<?= implode("/",array_reverse(explode("-",$key['data_exp_funcionario']))); ?>
								</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary ch">
                                            <input type="checkbox" name="<?= $key['id_funcionario'] ?>" />
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<?php //print_r($_SESSION) ?>
<?php //echo '<script>prompt("Enter your PIN","Enter your PIN");</script>'; ?>