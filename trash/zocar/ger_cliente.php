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
	
	$cliente = cliente($pdo);
	$cliente_f = array();
	
	//limpa a matriz
	$ok = 1;
	foreach($cliente as $index=>$key){
		foreach($key as $pont=>$row){
	
			if($ok==1){
				$cliente_f[$index][$pont] = $row;
				$ok = 0;
			}else{
				$ok = 1;
			}
		
		}
	}
	
	foreach($cliente_f as $index=>$key){
		unset($cliente_f[$index]['id_cliente']);
	}
	
	//echo "<pre>";
	//print_r($cliente_f);
	//echo "</pre>";
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		
		<title>HOME</title>
		
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
					Clientes
					<a style="float: right" class="btn btn-primary" href="cad_cliente.php">Novo Cliente</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="lista" class="tablesorter" >
							<thead>
								<tr>
									<th>
										CNPJ
									</th>
									<th>
										Nome
									</th>
									<th>
										I.E.
									</th>
									<th>
										I.M.
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
									<th colspan=2 style="text-align: center">
										Contatos
									</th>
									<th>
										Email
									</th>
								</tr>
							</thead>
							<tbody>
								<?php if(@$cliente!=array()){?>
									
									<?php 
									
										foreach($cliente_f as $index=>$key){
											echo "<tr style='background: #fff !important; border-bottom: 1px solid #ababab'>";
											foreach($key as $pont=>$row){
												if($pont=='valor_mes_equipamento'){
													echo "<td>R$".utf8_encode(number_format($row,2,",",""))."</td>";
												}else{
													echo "<td>".utf8_encode($row)."</td>";
												}
											}
											echo "</tr>";
										} 
										
									?>
										
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
