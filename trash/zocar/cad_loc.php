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
						<label>Cliente:</label>
						<br/>
						<select class="form-control" style="width: 270px" required name="cliente">
							<option></option>
							<?php
                                foreach($cliente as $index=>$key){
									
                                    $id = $key['id_cliente'];
                                    $nome = $cliente[0]['nome_razao_cliente'];
									
                                    echo "<option value='$id'>$nome</option>";
									
                                }
                            ?>
						</select>
					</div>
					
					<div class="item">
						<label>Contrato:</label>
						<br/>
						<input class="form-control" required placeholder="" type="text" name="contrato" />
					</div>
					
					<div class="item">
						<label>Início:</label>
						<br/>
						<input class="datepicker form-control" required placeholder="" type="text" name="inicio" />
					</div>
					
					<div class="item">
						<label>Final:</label>
						<br/>
						<input class="datepicker form-control" required placeholder="" type="text" name="final" />
					</div>
					
					
					<br /><br />
					
					<button class="btn btn-default" type="submit">Cadastrar</button>
					
				
				</form>
				
			</div>
		</div>
	
	</body>

</html>
