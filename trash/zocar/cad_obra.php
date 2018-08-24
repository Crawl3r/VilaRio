<?php
	
    session_start();
	
    include "php/conection.php";
    include "php/querys.php";
	
    //protege entrada sem login
    if(@$_SESSION == array()){
        echo "<script>window.location.href='index.php';</script>";
    }
	
    $loc = loc($pdo);
	
    //print_r($_SESSION);
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		
		<title>Cadastro de Obra</title>
		
		<style>
			body{
				padding-top: 70px;
			}
			.item{
				display: inline-block;
			}
		</style>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
		<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css" >
		
		<script src="bootstrap/bootstrap.min.js"></script>
		<script src="datepicker/js/bootstrap-datepicker.js"></script>
		<script src="datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
		
		<script>
		
			$( function() {
	  	
			    $('.datepicker_1').datepicker({
				    format: 'dd/mm/yyyy',
				    autoclose: true,
				    language: 'pt-BR'
				  });
				    
			  });
		
		</script>
		
	</head>

	<body>
		
		<?php include "menu.php"; ?>
		
		<div class="panel panel-default">
			<div style="font-size: 14pt" class="panel-heading">Informações da Obra</div>
			<div class="panel-body">
				<form class="form-inline" role="form" id="cons_1" action="#" method="POST">
					
					<div class="item">
						<label>Locação:</label>
						<br/>
						<select class="form-control" style="width: 270px" required name="locacao">
							<option></option>
							<?php
                                foreach($loc as $index=>$key){
									
                                    $cliente = clienteId($pdo,$key['id_cliente']);
									
                                    $id = $key['id_locacao'];
                                    $nome = $cliente[0]['nome_razao_cliente'];
									
                                    echo "<option value='$id'>$nome - $id</option>";
									
                                }
                            ?>
						</select>
					</div>
					
					<div class="item">
						<label>Nome:</label>
						<br/>
						<input class="form-control" style="width: 270px" required placeholder="" type="text" name="nome" />
					</div>
					
					<div class="item">
						<label>Projeto de Lei:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="projeto_lei" />
					</div>
					
					<br />
					
					<div class="item">
						<label>Logradouro:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="logradouro" />
					</div>
					
					<div class="item">
						<label>Estado:</label>
						<br/>
						<select class="form-control" required name="estado">
							<option></option>
						</select>
					</div>
					
					<div class="item">
						<label>Cidade:</label>
						<br/>
						<select class="form-control" required name="cidade">
							<option></option>
						</select>
					</div>
					
					<div class="item">
						<label>Bairro:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="bairro" />
					</div>
					
					<div class="item">
						<label>CEP:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="cep" />
					</div>
					
					<br />
					
					<div class="item">
						<label>Responsável:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="responsavel" />
					</div>
					
					<div class="item">
						<label>Contato:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="contato" />
					</div>
					
					<br /><br />
					
					<button class="btn btn-default" type="submit">Cadastrar</button>
					
				
				</form>
				
			</div>
		</div>
	
	</body>

</html>
