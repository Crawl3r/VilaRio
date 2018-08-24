<?php
	
    function chk_login($pdo,$info){
		
        $adm = 1;
        $usuario = 1;
        $tipo = "";
		
        $select = $pdo->prepare("SELECT * FROM tab_adm WHERE login_adm = ? AND senha_adm = ?");
		
        $select->bindParam(1, $info['login'], PDO::PARAM_INT );
        $select->bindParam(2, $info['senha'], PDO::PARAM_INT );
		
        $select->execute();
        $select = $select->fetchAll();
		
        if($select==array()){
			
            $adm = 0;
            unset($select);
			
            $select = $pdo->prepare("SELECT * FROM tab_usuario WHERE login_usuario = ? AND senha_usuario = ?");
		
            $select->bindParam(1, $info['login'], PDO::PARAM_INT );
            $select->bindParam(2, $info['senha'], PDO::PARAM_INT );
			
            $select->execute();
            $select = $select->fetchAll();
			
        }else{
            $usuario = 0;
        }

        if($select!=array()){
			
            if($adm==!0){
                $select[0]['tipo'] = "adm";
            }else{
                $select[0]['tipo'] = "usuario";
            }
			
        }
		
        return $select;
		
    }
	
    function equipamento($pdo){
		
        $select = $pdo->query("SELECT * FROM tab_equipamento");
        return $select->fetchAll();
		
    }
	
    function equipamento_obra_AAA($pdo){
		
        $select = $pdo->query("
			SELECT 
				tab_equipamento.*,
				tab_obra.*
			FROM 
				tab_equipamento
			INNER JOIN tab_obra ON
				tab_equipamento.id_obra = tab_obra.id_obra
				
			
		");
        return $select->fetchAll();
		
    }
	
    function equipamento_obra($pdo,$id){
		
        $select = $pdo->query("SELECT * FROM tab_equipamento WHERE id_obra = $id");
        return $select->fetchAll();
		
    }
	
    function obra($pdo){
		
        $select = $pdo->query("SELECT * FROM tab_obra");
        return $select->fetchAll();
		
    }
	
    function loc($pdo){
		
        $select = $pdo->query("SELECT * FROM tab_locacao");
        return $select->fetchAll();
		
    }
	
    function cliente($pdo){
		
        $select = $pdo->query("SELECT * FROM tab_cliente");
        return $select->fetchAll();
		
    }
	
    function clienteId($pdo,$id){
		
        $select = $pdo->query("SELECT * FROM tab_cliente WHERE id_cliente = $id ");
        return $select->fetchAll();
		
    }
	
?>