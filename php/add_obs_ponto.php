<?php
	
    include "../_app/Config.inc.php";
    
    date_default_timezone_set('America/Sao_Paulo');
	
    $info = $_POST;
    
    $mes_r = $info['mes_retorno'];
    
    unset($info['mes_retorno']);
    
    //print_r($info);
    
    $cond1 = "WHERE id_usuario = '" . $info['id_usuario'] . "' ";
    $cond2 = "dia LIKE '%" . $info['dia'] . "%' ";
    $obs = $crud->query("SELECT * FROM tb_obs_dia $cond1 AND $cond2 LIMIT 1");
    
    //echo "SELECT id_rp FROM tb_reg_ponto $cond1 AND $cond2 AND $cond3 ";
    //print_r($ponto);
	
    if ($obs == array()) {
        $crud->pdo_cadastro_l('obs_dia', $info);
    } else {
        $info['id_o'] = $obs[0]['id_o'];
        $crud->pdo_edit_l('obs_dia', $info, 'id_o');
    }
	
    header("Location:../lista_reg_geral?user=" . $_POST['id_usuario'] . "&valor=" . $mes_r);
	
?>