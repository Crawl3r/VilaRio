<?php

	session_start();
	
	include "php/conection.php";
	include "php/querys.php";
	
	//protege entrada sem login
	if(@$_SESSION == array()){
		echo "<script>window.location.href='index.php';</script>";
	}
	
	@$id = $_SESSION['id_usuario'];
	@$id_adm = $_SESSION['id_adm'];
	
	//print_r($_SESSION);
	
	$loc = loc($pdo);
	$cliente = clienteId($pdo,$loc[0]['id_cliente']);
	
	//echo "<pre>";
	//print_r($equip_f);
	//echo "</pre>";
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		
		<title>Obras</title>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
		<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css" >
		
		<script src="bootstrap/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="js/tema/style.css" />
	    <script type="text/javascript" src="js/tabela/jquery-latest.js"></script>
	    <script type="text/javascript" src="js/tabela/jquery.tablesorter.js"></script> 
	    
		<script>
			$(document).ready(function() 
			    { 			    	
			        $("#lista").tablesorter();
			        //$("#lista").tablesorter( {sortList: [[0,0]]} );
			     }
			);
		</script>
		
		<style>
			body{
				padding-top: 70px;
			}
			.item{
				display: inline-block;
			}
			th{
				padding-right: 20px !important;
				min-width: 80px !important;
			}
		</style>
		
	</head>

	<body>
		
		<?php include "menu.php"; ?>
		
		<!--
		<div class="panel panel-default">
			<div class="panel-heading"><center><h2>Home</h3></center></div>
		</div>
		-->
		
		<?php if(@$_SESSION['bloq_ger_usuario']!="1"){ ?>
			<div class="panel panel-default">
				<div style="font-size: 14pt; display: table; width: 100%" class="panel-heading">
					Locações
					<a style="float: right" class="btn btn-primary" href="cad_loc.php">Nova Locação</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="lista" class="tablesorter" >
							<thead>
								<tr>
									<th>
										Locação N°
									</th>
									<th>
										Cliente
									</th>
									<th>
										Contrato
									</th>
									<th>
										Data de Início
									</th>
									<th>
										Data de Término
									</th>
								</tr>
							</thead>
							<tbody>
									
								<?php if(@$loc!=array()){?>
									
									<?php foreach($loc as $index=>$key){ ?>
										
										<tr style='background: #fff !important; border-bottom: 1px solid #ababab'>	
											<td>
												<?php echo $key['id_locacao'] ?>
											</td>
											<td>
												<?php echo $cliente[0]['nome_razao_cliente'] ?>
											</td>
											<td>
												<?php echo $key['contrato_locacao'] ?>
											</td>
											<td>
												<?php echo $key['inicio_locacao'] ?>
											</td>
											<td>
												<?php echo $key['final_locacao'] ?>
											</td>
										</tr>
										
									<?php } ?> 
									
									
										
								<?php }else{ ?>
									
									<tr>
										<td colspan=24>
											<center>
												Nenhum equipamento alocado.
											</center>
										</td>
									</tr>
									
								<?php } ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php }else{ ?>
			<div class="panel panel-default">
				<div class="panel-heading"><center><h2>USUARIO SOMENTE PARA CADASTRO</h3></center></div>
			</div>
		<?php } ?>
		
	</body>

</html>
