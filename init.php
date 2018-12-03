<?php

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


 $responsableDAO = new ResponsableDAO ();
 $generalDAO = new GeneralDAO();
 $bordereauDAO = new BordereauDAO();
 $indemniteDAO = new IndemniteDAO();
 $motifDAO = new MotifDAO();
 $Motifs = $motifDAO->findAll();

 if($_SESSION['typeUser']==1){
   $userConnecte = $responsableDAO->find($_SESSION['idUser']);
   $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
 }
