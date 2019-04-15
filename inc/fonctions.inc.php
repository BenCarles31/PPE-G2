<?php
//
// top14server - Serveur web service RESTful
//
// Fonctions pour l'application


/**
 * Construit une chaîne JSON à partir d'un tableau PHP
 * @param string $message
 * @param string $token
 * @param array $bordereaux
 * @return string
 */
function build_json($bordereaux) {

  $tableau = array(
    
    "LigneFrais" => $bordereaux
);
$json = json_encode($tableau,JSON_PRETTY_PRINT);
return $json;
}

/**
 * Envoie une réponse HTTP en JSON
 * @param string $json
 * TODO : envoyer une status code HTTP
 */
function send_json($json) {
  header("Content-type: application/json; charset=utf-8");
  echo $json;
}
