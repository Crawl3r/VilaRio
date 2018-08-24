<?php
	
    session_start();
	
    include "php/conection.php";
    include "php/querys.php";
	
    //protege entrada sem login
    if(@$_SESSION == array()){
        echo "<script>window.location.href='index.php';</script>";
    }
	
    //print_r($_SESSION);
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		
		<title>Cadastro de Equipamento</title>
		
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
			<div style="font-size: 14pt" class="panel-heading">Informações do Equipamento</div>
			<div class="panel-body">
				<form class="form-inline" role="form" id="cons_1" action="#" method="POST">
					
					<div class="item">
						<label>Nome:</label>
						<br/>
						<input class="form-control" style="width: 270px" required placeholder="" type="text" name="nome" />
					</div>
					
					<div class="item">
						<label>Modelo:</label>
						<br/>
						<input class="form-control" style="width: 270px" required placeholder="" type="text" name="modelo" />
					</div>
					
					<div class="item">
						<label>Placa/Série:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="placa/serie" />
					</div>
					
					<div class="item">
						<label>RENAVA:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="renava" />
					</div>
					
					<div class="item">
						<label>Chassi:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="chassi" />
					</div>
					
					<div class="item">
						<label>Ano:</label>
						<br/>
						<select class="form-control" name="ano">
							<option></option>
							<?php
                                for($i=1950;$i<2099;$i++){
                                    echo "<option>$i</option>";
                                }
                            ?>
						</select>
					</div>
					
					<div class="item">
						<label>Ulti. Lic.:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="ulti_lic" />
					</div>
					
					<div class="item">
						<label>ID:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="id" />
					</div>
					
					<div class="item">
						<label>HOR:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="hor" />
					</div>
					
					<div class="item">
						<label>Kilômetragem:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="km" />
					</div>
					
					<div class="item">
						<label>N° da Nota:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="num_nota" />
					</div>
					
					<div class="item">
						<label>Proposta:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="proposta" />
					</div>
					
					<div class="item">
						<label>Seguro:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="seguro" />
					</div>
					
					<div class="item">
						<label>Tacógrafo:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="tacografo" />
					</div>
					
					<div class="item">
						<label>Teste de Opac.:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="teste_opac" />
					</div>
					
					<div class="item">
						<label>Compr. de Prop.:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="compr_prop" />
					</div>
					
					<div class="item">
						<label>Contrato:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="contrato" />
					</div>
					
					<div class="item">
						<label>Valor Mensal:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="vel_mes" />
					</div>
					
					<div class="item">
						<label>Destino:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="destino" />
					</div>
					
					<div class="item">
						<label>MOB:</label>
						<br/>
						<input class="form-control" placeholder="" type="text" name="mob" />
					</div>
					
					<br /><br />
					
					<button class="btn btn-default" type="submit">Cadastrar</button>
					
				
				</form>
				
			</div>
		</div>
	
	</body>

</html>
