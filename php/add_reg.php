<?php
	
	include "../_app/Config.inc.php";
	
	$info = $_POST;
    $info['reg'] = $info['dia'] . " " . $info['reg'];
    unset($info['dia']);
    
    //print_r($info);
    
    $cond1 = "WHERE id_usuario = '".$info['id_usuario']."' ";
    $cond2 = "reg LIKE '%".explode(" ",$info['reg'])[0]."%' ";
    $cond3 = "tipo = " . $info['tipo'];
    $ponto = $crud->query("SELECT * FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 LIMIT 1");
    
    //echo "SELECT id_rp FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 ";
    //print_r($ponto);
	
    if($ponto==array()){
        $crud->pdo_cadastro_l('reg_ponto', $info);
    }else{
        $info['id_rp'] = $ponto[0]['id_rp'];
        $crud->pdo_edit_l('reg_ponto', $info, 'id_rp');
    }
	
	
	header("Location:../lista_reg_user");
	
?>