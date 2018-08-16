<?php
	
//protege de entrada sem login
if($_SESSION != array()){
    if ($_SESSION['nome_usuario'] != "Gisele") {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
}else{
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}

//abre o arquivo
$my_file = './log/folhas.txt';

$file = file($my_file);
$file = array_reverse($file);
array_pop($file);
	
?>

<style>
    
    .form-control {
        margin: 0;
    }

    td{
        padding: 3px !important;
    }    
    
</style>

<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">
		Listas Geradas
	</div>
    <div class="panel-body">

        <br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Data
                        </th>
                        <th>
                            Link
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($file as $key) { 
                        $key = explode("---",$key);
                    ?>
                    <tr>
                        <td>
                            <?= $key[0] ?>
                        </td>
                        <td>
                            <a target="blank" href="<?= $key[1] . "&impr=0&data_emis=" . $key[0] ?>" >Visualizar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>$('[data-toggle="tooltip"]').tooltip();</script>