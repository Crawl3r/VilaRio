<?php
	
	session_start();
	
	include "php/conection.php";
	include "php/querys.php";
	
	//protege login em cima de login
	if($_SESSION != array()){
		echo "<script>window.location.href='home.php';</script>";
	}
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=0.9">
		<title>LOGIN</title>
	</head>
	
	<style>
		.item{
			display: inline-block;
		}
		.shadowed {
		    -webkit-filter: drop-shadow(10px 10px 2px #777);
  			filter: drop-shadow(10px 10px 2px #777);
		}
	</style>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css" >
	
	<script src="bootstrap/bootstrap.min.js"></script>

	<body style="margin-top: 40px;">
		
		<br /><br /><br />
		
		<center>
			
			<div style="width: 400px;" class="panel panel-default">
				<div style="font-size: 14pt" class="panel-heading">
					<img style="max-width: 180px;" src="img/CONTROLE-2.png" />
				</div>
				<div class="panel-body">
					<form class="form-inline" role="form" action="php/login_mec.php" method="POST">
						<div class="item" style="text-align: right;">
							<label>Login:</label>
							<br />
							<label>Senha:</label>
						</div>
						<div class="item" style="text-align: left;">
							<input autofocus class="form-control" required type="text" name="login" />
							<br />
							<input class="form-control" required type="password" name="senha" />
						</div>
						<br /><br />
						<button class="btn btn-default" type="submit">Entrar</button>
					</form>
					<br />
					
					<img class="" style="width: 300px; margin:-10px; margin-left: 5px;" src="img/logo.png" />
					<br />
					<br />
				</div>
			</div>
		
		</center>
	
	</body>

</html>
