<?php
require './_app/Config.inc.php';
//protege login em cima de login
if (isset($_SESSION)) {
    echo ($_SESSION !== [] ? "<script>window.location.href='home.php';</script>" : "");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=0.9">
        <title>LOGIN</title>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

        <link rel="stylesheet" href="themes/wshtml/css/bootstrap.min.css">
        <link rel="stylesheet" href="themes/wshtml/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="themes/wshtml/css/bootstrap-datepicker.css" >
        <link rel="stylesheet" href="themes/wshtml/css/style.css">

        <script src="_cdn/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        $Url[1] = (empty($Url[1]) ? 'index' : $Url[1]);
        if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')){
            require REQUIRE_PATH . '/' . $Url[0] . '.php';
        } else {
            require REQUIRE_PATH . '/404.php';
        }
        endif;

        echo $Url[1];
        ?>
        <?php
        require "./themes/wshtml/inc/footer.php";
        ?>
    </body>
</html>
