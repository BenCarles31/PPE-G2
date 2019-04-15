<?php
//
// top14server - Serveur web service RESTful
//
// Authentifie un client Android et renvoie une réponse JSON
// Exemple : http://http://localhost/BTS/PPE-G2/api/login.php?user=vinz@email.com&password=vinzvinz
include "../init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$statutDAO = new StatutDAO();
$clubDAO = new ClubDAO();



$StatutAttente = $statutDAO->findByLibelle('En attente');
$StatutCloturer= $statutDAO->findByLibelle('Cloturer');
$StatutValider = $statutDAO->findByLibelle('Valider');


$authentifie = false;
// Récupère les paramètres dans l'URL
$user = isset($_GET["user"]) ? $_GET["user"] : "";
$password = isset($_GET["password"]) ? $_GET["password"] : "";

$UserConnected = $responsableDAO->findAdherentByEmailPass($user, $password);
// Vérifie si le user existe
if($UserConnected->get_email()== $user && $UserConnected->get_mdp()== $password){
  $_SESSION['idUser'] = $UserConnected->get_id_user();
  $_SESSION['typeUser'] = $UserConnected->get_ID_type();
      
  $authentifie = true; 
}



// Si authentifié, fournit la liste des clubs
if ($authentifie) {
    $bordereauencour = $bordereauDAO->findBordByuserStatut($_SESSION['idUser'],$StatutAttente->get_Id_statut() );
    
      $tableau_lignes = array(); // remise a 0 du tableau
      $lignes = $bordereauDAO->findLigneFrais($bordereauencour->get_ID_bordereau());
      foreach($lignes as $ligne){

         
          $tableau_lignes[] = array( 
          "Id borderau"=>$bordereauencour->get_ID_bordereau(),
          "Date Frais "=>$ligne->get_Date_frais(),
          "Trajet"=>$ligne->get_Trajet(), 
          "KM"=>$ligne->get_KM(), 
          "Peages"=>$ligne->get_Cout_peages(), 
          "Cout repas"=>$ligne->get_Cout_repas(), 
          "cout hebergement "=>$ligne->get_Cout_hebergement(), 
          "Motif"=>$motifDAO->findMotifByIdMotif($ligne->get_IdMotif())->get_Libelle(),      
          "nom Club"=>$clubDAO->find($ligne->get_ID_club())->get_Nom_club()  
      ); 
    $tableau_ligne[] = (object) $ligne;
      }
     
 

   
  // $tableau_bordereauencours[] = (object) $bordereauencour;
 
  } else {
    $tableau_lignes = NULL;
  }
  

// Construit le format JSON
$json = build_json($tableau_lignes);
// Envoie la réponse 
send_json($json);