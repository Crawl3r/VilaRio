<?php

	$user = "root";
	$pass = "";

	try {
	    $pdo = new PDO('mysql:host=localhost;dbname=db_morada', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	
?>