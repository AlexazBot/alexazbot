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

header("Content-Type: application/json");

include "comand.php";





$response = 'ciao';


if(strpos($text, "/start") === 0 || $text=="ciao")
{
 $response = "Ciao " . $firstname . ", benvenuto!";
}
/*
else if($text=="dio cane"){
 $response = "Qui siamo cattolici praticanti!";
}
*/


foreach($comand as $indice => $valore) {
  if($text==$indice){
    $response=$valore;
  }
  else{
    $response="Comando non trovato";
}




$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
