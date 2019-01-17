<?php

  require "execute.php";

  $comandi = array(
    "ciao" => "Ciao! " . $firstname . ", Benvenuto!",
    "chi sei" => "Sono Alexa",
    "come stai" => "Molto bene grazie",
    "che ore sono" => date("H:i"),
    "che giorno è" => date("d/m/y")
  );
?>
