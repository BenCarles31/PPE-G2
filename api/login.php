<?php
//
// top14server - Serveur web service RESTful
//
// Authentifie un client Android et renvoie une réponse JSON
// Exemple : http://localhost/projets/top14server/login.php?user=jef&password=jefjef
include "../init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$statutDAO = new StatutDAO();
$clubDAO = new ClubDAO();

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
  // Crée un token aléatoire (<PHP7)
  $token = bin2hex(openssl_random_pseudo_bytes(15));
  // Ajoute le token au fichier des tokens
  add_token($token);
} else {
  $authentifie = false;
  $token = null;
}



// Si authentifié, fournit la liste des clubs
if ($authentifie) {
    $bordereauencours = $bordereauDAO->findAllBordByUser($_SESSION['idUser']);
  
    foreach($bordereauencours as $bordereauencour){
    
      $tableau_lignes = array(); // remise a 0 du tableau
      $lignes = $bordereauDAO->findLigneFrais($bordereauencour->get_ID_bordereau());
      foreach($lignes as $ligne){
         
          $tableau_lignes[] = array( 
          "id bordereau "=>$ligne->get_ID_bordereau(),
          "Date Frais "=>$ligne->get_Date_frais(),
          "Trajet"=>$ligne->get_Trajet(), 
          "KM"=>$ligne->get_KM(), 
          "Peages"=>$ligne->get_Cout_peages(), 
          "Cout repas"=>$ligne->get_Cout_repas(), 
          "cout hebergement "=>$ligne->get_Cout_hebergement(), 
          "Motif"=>$motifDAO->findMotifByIdMotif($ligne->get_IdMotif())->get_Libelle(),      
          "nom Club"=>$clubDAO->find($ligne->get_ID_club())->get_Nom_club()  
      ); 
   //  $tableau_ligne[] = (object) $ligne;
      }
      $tableau_bordereauencours[] = array(
          "Id"=>$bordereauencour->get_ID_bordereau(),
          "Date"=>$bordereauencour->get_Date_bordereau(),
          "Nom User"=>$responsableDAO->findRespByIdBordeau($bordereauencour->get_ID_bordereau())->get_nom(),
          "Prenom User"=>$responsableDAO->findRespByIdBordeau($bordereauencour->get_ID_bordereau())->get_prenom(),
          "Statut"=> $statutDAO->find($bordereauencour->get_Id_statut())->get_Libelle(),
          "Lignes"=>$tableau_lignes,         
      );
     
  } 

   
  // $tableau_bordereauencours[] = (object) $bordereauencour;
    $message = count($tableau_bordereauencours) . " bordereau(x)";
  } else {
    $message = "user non authentifié";
    $tableau_bordereauencours = NULL;
  }
  

// Construit le format JSON
$json = build_json($message, $token, $tableau_bordereauencours);
// Envoie la réponse 
send_json($json);