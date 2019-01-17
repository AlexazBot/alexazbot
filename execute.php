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

require "comand.php";
$response = '';

if(strpos($text, "/start") === 0)
{
 $response = "Ciao " . $firstname . ", benvenuto!" . "<br/>" . "Questi sono i miei comandi: <br/>";
 foreach($comandi as $testo => $risposta){
    $response += $testo . "<br/>";
  }
}




foreach($comandi as $testo => $risposta){
  if($testo==$text){
    $response=$risposta;
  }
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
