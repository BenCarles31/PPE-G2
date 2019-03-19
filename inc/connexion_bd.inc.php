<?php
// Connexion
$user = 'root';
$pass = 'slam2';
$host = '172.17.5.61';
$base = 'newfredi';
$dsn = 'mysql:host='.$host.';dbname='.$base;

try {
  $con = new PDO($dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die( "<p>Erreur lors de la connexion : " . $e->getMessage() . "</p>");
}




