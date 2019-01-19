<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);
require "connessione.php";


<?php
	require "connessione.php";
	
	if(!$connessione->query("INSERT INTO Utenti (firstname, lastname, username) 
  VALUES ( " . $firstname . ", " . $lastname . ", ". $username . ")")
	{
		echo "Errore nella query: " . $connessione->error . ".";
	}
	else{
		echo "Inserimenti effettuati correttamente.";
	}
	
	$connessione->close();					
?>



header("Content-Type: application/json");
date_default_timezone_set('Europe/Rome');

require "command.php";
$response = 'comando non trovato';

if(strpos($text, "/start") === 0)
{
 $response = "Ciao " . $firstname . ", benvenuto!";
}

foreach($comandi as $testo => $risposta){
  if(!(strpos($text, $testo) === false)){
    $response=$risposta;
  }
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
