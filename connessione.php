<?php
	$host= "148.251.192.210";
	$user="andreaco_andrez";
	$password="Alexaz20195ID";
	$db = "andreaco_alexaz";
	
	$connessione = new mysqli($host, $user, $password, $db);
	
	if($connessione->connect_errno){
		echo "Connessione fallita: " . $connessione->connect_error . ".";
		exit();
	}
	else{
		echo "Connessione e apertura eseguita con successo";
	}
?>
