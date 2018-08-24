<?php
	
    session_start();
	
    include "php/conection.php";
    include "php/querys.php";
	
    //protege entrada sem login
    if(@$_SESSION == array()){
        echo "<script>window.location.href='index.php';</script>";
    }
	
    $cliente = cliente($pdo);
	
    //print_r($_SESSION);
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		
		<title>Cadastro de Locação</title>
		
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
	  	
			    $('.datepicker').datepicker({
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
			<div style="font-size: 14pt" class="panel-heading">Informações da Locação</div>
			<div class="panel-body">
				<form class="form-inline" role="form" id="cons_1" action="#" method="POST">
					
					<div class="item">
						<label>Nome/Razão Social:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="nome_razao" />
					</div>
					
					<div class="item">
						<label>CNPJ:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="cnpj" />
					</div>
					
					<div class="item">
						<label>Inscrição Estadual:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="ie" />
					</div>
					
					<div class="item">
						<label>Inscrição Municipal:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="im" />
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
						<label>Contato 1:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="contato_1" />
					</div>
					
					<div class="item">
						<label>Contato 2:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="contato_2" />
					</div>
					
					<div class="item">
						<label>Email:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="email" />
					</div>
					
					<br /><br />
					
					<button class="btn btn-default" type="submit">Cadastrar</button>
					
				
				</form>
				
			</div>
		</div>
	
	</body>

</html>
