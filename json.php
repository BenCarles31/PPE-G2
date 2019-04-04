<?php
include "init.php";
$responsableDAO = new ResponsableDAO();
$generalDAO = new GeneralDAO();
$adherentDAO = new AdherentDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$statutDAO = new StatutDAO();
$clubDAO = new ClubDAO();

$bordereauencours = $bordereauDAO->findAllBord();

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
header("Content-type: application/json; charset=utf-8");

$json=json_encode($tableau_bordereauencours, JSON_PRETTY_PRINT);
 
echo $json;
?>