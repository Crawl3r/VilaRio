<?php 
require './_app/Config.inc.php';
//protege de entrada sem login
if (isset($_SESSION)) {
    echo ($_SESSION === [] ? "<script>window.location.href='index.php';</script>" : "");
}
$cod = $crud->l_cod_prop($pdo);
@$cod = sprintf("%03d", ($cod[0][0]+1));
//ok
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		<title>Proprietário</title>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        
		<link rel="stylesheet" href="themes/wshtml/css/bootstrap.min.css">
		<link rel="stylesheet" href="themes/wshtml/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="themes/wshtml/css/bootstrap-datepicker.css" >
        <link rel="stylesheet" href="themes/wshtml/css/style.css">
        
		<script src="_cdn/bootstrap.min.js"></script>
		<script src="_cdn/bootstrap-datepicker.js"></script>
		<script src="_cdn/bootstrap-datepicker.pt-BR.min.js"></script>
        
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




