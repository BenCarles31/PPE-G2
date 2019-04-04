<?php
session_start();
include "../init.php";

$clubDAO = new ClubDAO();
$adherentDAO = new AdherentDAO();
$responsableDAO = new ResponsableDAO ();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$statutDAO = new StatutDAO();

$StatutAttente = $statutDAO->findByLibelle('En attente');
$StatutCloturer= $statutDAO->findByLibelle('Cloturer');
$Indemnites = $indemniteDAO->findAll();
$bordereauEnCours = $bordereauDAO->findBordByIdUser($_SESSION['idUser'],$StatutAttente->get_Id_statut());
$LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());
$userConnecte = $responsableDAO->find($_SESSION['idUser']);

$lesadherents = $adherentDAO->findAllAdherentbyResp($_SESSION['idUser']);
$lesClubsadherents = $clubDAO->findClubCascadingRespAndAdherent($_SESSION['idUser']);

$datetime = date("Y-m-d");

require('../lib/fpdf/fpdf.php');

class MON_PDF extends FPDF {

    function Header() {
        // Logo

        // Police Arial gras 15
        $this->SetFont('Arial','B',20);
        // Titre

      }
      function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
      }
    }

// Instanciation de l'objet dérivé
$pdf = new MON_PDF();

//boucle sur les clubs des adherents
foreach($lesClubsadherents as $unClub){
  $cout_km=0;
  $total_bord =0;
  //recup des lignes de frais d'un club
  $lignesFraisClubs = $bordereauDAO->findLigneFraisByClub($unClub->get_ID_club());

  //boucle sur les lignes de frais d'un club
  foreach($lignesFraisClubs as $uneLigneFraisClubs){

    //boucle sur les indemnités
    foreach($Indemnites as $indemnite){
      $anneeBord = explode("-", $bordereauEnCours->get_Date_bordereau());
      $anneeInd = explode("-", $indemnite->get_annee());

      //trouve la correspondance entre la date de la ligne de frais et la date d'indemnité km
      if($anneeInd[0] == $anneeBord[0]){
        $cout_km = $uneLigneFraisClubs->get_KM() * $indemnite->get_Tarif_kilometrique();
      }
    }
    //somme des différents frais de la ligne
    $total_bord = $total_bord + $uneLigneFraisClubs->get_Cout_peages() + $uneLigneFraisClubs->get_Cout_repas() + $uneLigneFraisClubs->get_Cout_hebergement() + $cout_km;
  }


  $infoclub = $clubDAO->find($unClub->get_ID_club());

  $pdf->AddPage();
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(120,60,$infoclub->get_Nom_club(),'','','L');
  $pdf->ln(1);
  $pdf->Cell(40,80,$infoclub->get_Adresse_club().'-'.$infoclub->get_Cp().' '.$infoclub->get_Ville(),'','','L');
  $pdf->ln(1);
  $pdf->Cell(80,115,$infoclub->get_Nom_club(),'','','L');
  $pdf->SetFont('Arial','B',11);
  $pdf->ln(110);
  $pdf->Cell(240,150,$userConnecte->get_prenom().' '.$userConnecte->get_nom(),'',1,'L');
  $pdf->ln(0);
  $pdf->Cell(40,-129,$userConnecte->get_rue(),'','','L');
  $pdf->ln(1);
  $pdf->Cell(35,-120,$userConnecte->get_cp(),'','','C');$pdf->Cell(75,-120,$userConnecte->get_Ville(),'','','C');
  $pdf->ln(1);
  $pdf->Cell(125,-88,$total_bord  ,'','','C');
  $pdf->ln(1);
  $pdf->Cell(110,-72,$datetime,'','','C');
  // Définit l'alias du nombre de pages {nb}
}
// Génération du document PDF
$pdf->Output();
?>
