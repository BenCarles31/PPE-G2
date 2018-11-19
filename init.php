<?php
<<<<<<< HEAD
<<<<<<< HEAD
//include "Fonc.php";
=======
include "Fonc.php";
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
//include "Fonc.php";
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf

//
// Initialisations dans chaque page
//

/**
 * Paramétrage pour certains serveurs qui n'affichent pas les erreurs PHP par défaut
 */
ini_set('display_errors', '1');
ini_set('html_errors', '1');

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
 define('DB_NAME','fredi');
