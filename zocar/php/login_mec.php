<?php

	session_start();
	
	include "conection.php";
	include "querys.php";
	
	$info = $_POST;
	
	$user = chk_login($pdo,$info);
	
	echo "<pre>";
	//print_r($user);
	echo "</pre>";
	
	if($user[0]['tipo']=="usuario"){
		if($user[0]['ativo_usuario']!=0){
			
			if($user!=array()){
			
				//zera a senha
				$user[0]['senha_usuario'] = 'não interessa pra você palhaço!';
				$user[0][2] = 'não interessa pra você palhaço!';
				
				$_SESSION = array_unique($user[0]);
				
				//direciona pra os respectivos painéis
				if($_SESSION['tipo']=="adm"){
					$_SESSION['senha_adm'] = 'não interessa pra você palhaço!';
				}
				echo "<script>window.location.href='../home.php';</script>";
				
			}else{
				echo "<script>alert('Usuário ou Senha incorretos!');window.location.href='../login.php';</script>";
			}
		
		}else{
			echo "<script>alert('Usuário Bloqueado!');window.location.href='../login.php';</script>";
		}
	}else{
		if($user!=array()){
			
			//zera a senha
			$user[0]['senha_usuario'] = 'não interessa pra você palhaço!';
			$user[0][2] = 'não interessa pra você palhaço!';
			
			$_SESSION = array_unique($user[0]);
			
			//direciona pra os respectivos painéis
			if($_SESSION['tipo']=="adm"){
				$_SESSION['senha_adm'] = 'não interessa pra você palhaço!';
			}
			echo "<script>window.location.href='../home.php';</script>";
			
		}else{
			echo "<script>alert('Usuário ou Senha incorretos!');window.location.href='../login.php';</script>";
		}
	}
	
	
?>