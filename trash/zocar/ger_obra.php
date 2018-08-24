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
	
    $obra = obra($pdo);
	
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
		
		<?php if (@$_SESSION['bloq_ger_usuario'] != "1") { ?>
			<div class="panel panel-default">
				<div style="font-size: 14pt; display: table; width: 100%" class="panel-heading">
					Obras
					<a style="float: right" class="btn btn-primary" href="cad_obra.php">Nova Obra</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="lista" class="tablesorter" >
							<thead>
								<tr>
									<th>
										Locação
									</th>
									<th>
										Nome
									</th>
									<th>
										Projeto de Lei
									</th>
									<th>
										Logradouro
									</th>
									<th>
										Bairro
									</th>
									<th>
										Cidade
									</th>
									<th>
										UF
									</th>
									<th>
										CEP
									</th>
									<th>
										Responsável
									</th>
									<th>
										Contato
									</th>
								</tr>
							</thead>
							<tbody>
								
								<?php if (@$obra != array()) {?>
									
									<?php foreach ($obra as $index=>$key) { ?>
										
										<tr style='background: #fff !important; border-bottom: 1px solid #ababab'>
											<td>
												<?php echo $key['id_locacao'] ?>
											</td>
											<td>
												<?php echo $key['nome_obra'] ?>
											</td>
											<td>
												<?php echo $key['projeto_lei_obra'] ?>
											</td>
											<td>
												<?php echo utf8_encode($key['logradouro_obra']) ?>
											</td>
											<td>
												<?php echo $key['bairro_obra'] ?>
											</td>
											<td>
												<?php echo $key['cidade_obra'] ?>
											</td>
											<td>
												<?php echo $key['estado_obra'] ?>
											</td>
											<td>
												<?php echo $key['cep_obra'] ?>
											</td>
											<td>
												<?php echo $key['responsavel_obra'] ?>
											</td>
											<td>
												<?php echo $key['contato_obra'] ?>
											</td>
										</tr>
										
									<?php } ?> 
										
								<?php }else { ?>
									
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
		<?php }else { ?>
			<div class="panel panel-default">
				<div class="panel-heading"><center><h2>USUARIO SOMENTE PARA CADASTRO</h3></center></div>
			</div>
		<?php } ?>
		
	</body>

</html>
