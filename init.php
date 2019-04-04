<?php

/*
 * Configuration de l'application
 */

// error reporting - all errors for development (ensure you have display_errors = On in your php.ini file)
error_reporting(E_ALL | E_STRICT);
// Encodage avec les fonctions mb_*
mb_internal_encoding('UTF-8');
// Force le fuseau de Paris
date_default_timezone_set('Europe/Paris');

// Définition des chemins des fichiers
define('ROOT', dirname(dirname(dirname(__FILE__))));  // Racine du site en absolu
// TODO : il y a dans la doc. un second paramètre pour indiquer que l'on remonte MAIS ça ne fonctionne pas en PHP5, il faut passer à PHP7

define('DS', DIRECTORY_SEPARATOR);   // Séparateur de dossier (dépend de l'OS)
//define('SRC', ROOT . DS . 'src');  // Dossier src en absolu
/*
// Définition des URLs
define('BASEURL', dirname($_SERVER['SCRIPT_NAME']));
define('CSS', BASEURL . '/css');
define('JS', BASEURL . '/js');

// Paramètres de l'application
define('APPLINAME', 'Fredi');

// Gestion de la session
require_once SRC . DS . 'models' . DS . 'Utilisateur.php';  // Obligatoire pour tous les objets susceptibles d'être sérialisés dans la session

*/

/**
 * Autoload
 * @param string $classe
 */
function my_autoloader($classe) {
  include 'classes/' . $classe . '.php';
}

spl_autoload_register('my_autoloader');

/**
 * Vide le cache du navigateur
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

/**
 * Paramètre de la base de données
 */
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_HOST','localhost');
 define('DB_NAME','newfredi2');

 //fonction redirection (remplace header)
function redirige($url)
{
   die('<meta http-equiv="refresh" content="0;URL='.$url.'">');
}


// Emplacement du fichier des tokens
define("TOKEN_FILENAME",ROOT.DS."maj".DS."PPE-G2".DS."api".DS."files".DS."tokens.txt");

// Inclut les fonctions
require_once ROOT.DS."maj".DS."PPE-G2".DS."inc".DS."fonctions.inc.php";
