<?php
	$host= "localhost";
	$user="root";
	$password="";
	$db = "nuova_rubrica";
	
	$connessione = new mysqli($host, $user, $password, $db);
	
	if($connessione->connect_errno){
		echo "Connessione fallita: " . $connessione->connect_error . ".";
		exit();
	}
	else{
		echo "Connessione e apertura eseguita con successo";
	}
?>
