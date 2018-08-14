<?php
require './_app/Config.inc.php';
//protege de entrada sem login
if(isset($_SESSION)){
    echo ($_SESSION === [] ? "<script>window.location.href='index.php';</script>" : "");
}
$prop = $crud->prop($pdo);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<!-- <meta charset="utf-8" /> -->
		<meta name="viewport" content="initial-scale=1.0">
		<title>Lista de Proprietários</title>
        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
		<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css" >
		<link rel="stylesheet" href="css/style.css">
		<script src="bootstrap/bootstrap.min.js"></script>
        
	</head>
	<body>
		<?php
		require "./themes/wshtml/inc/menu.php";
		?>
		
		 <?php
         require "./themes/wshtml/inc/footer.php";
         ?>
	</body>
</html>