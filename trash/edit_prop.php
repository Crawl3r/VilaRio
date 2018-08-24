<?php 
require './_app/Config.inc.php';
//protege de entrada sem login
if (isset($_SESSION)) {
    echo ($_SESSION === [] ? "<script>window.location.href='index.php';</script>" : "");
}
$prop = $crud->prop_id($pdo, $_GET['id']);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		<title>Proprietário</title>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
		<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css" >
		<link rel="stylesheet" href="css/style.css">
		<script src="bootstrap/bootstrap.min.js"></script>
		<script src="datepicker/js/bootstrap-datepicker.js"></script>
		<script src="datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
		<script>
			$(function() {
				$('.datepicker').datepicker({
					format : 'dd/mm/yyyy',
					autoclose : true,
					language : 'pt-BR'
				});
			});
		</script>
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




