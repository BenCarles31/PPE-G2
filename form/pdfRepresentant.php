<?php
session_start();
include "../init.php";
require('../lib/fpdf/fpdf.php');

$clubDAO = new ClubDAO();
$adherentDAO = new AdherentDAO();
$responsableDAO = new ResponsableDAO ();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$statutDAO = new StatutDAO();
$motifDAO = new MotifDAO();

$StatutAttente = $statutDAO->findByLibelle('En attente');
$userConnecte = $responsableDAO->find($_SESSION['idUser']);
$Indemnites = $indemniteDAO->findAll();

$bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user(),$StatutAttente->get_Id_statut());
$LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());
$lesClubsadherents = $clubDAO->findClubCascadingRespAndAdherent($userConnecte->get_id_user());

$datetime = date("Y-m-d");

class MON_PDF extends FPDF {

  function Header() {
    $this->SetFont('Arial','B',15);
    $this->Cell(0,10,utf8_decode('Bordereau des frais de déplacements'),'B',0,'C');
    $this->Ln(20);
  }

  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(0,0,0); // Noir
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}','T',0,'C');
  }
}

// Instanciation de l'objet dérivé
$pdf = new MON_PDF();

//boucle sur les clubs des adherents
foreach($lesClubsadherents as $unClub){

  //recup des lignes de frais d'un club
  $lignesFraisClubs = $bordereauDAO->findLigneFraisByClub($unClub->get_ID_club());

  if(count($lignesFraisClubs)>0){

    //Recupère les adhérents du club
    $adherentsDuClub = $adherentDAO->findAllAdherentByClubAndResp($unClub->get_ID_club(),$userConnecte->get_id_user());

    //recup les infos du club
    $infoclub = $clubDAO->find($unClub->get_ID_club());

    //cout total du bordereau du club
    $total_bord =0;

    $pdf->AddPage('L');
    $pdf->AliasNbPages();

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(42,10,utf8_decode('Je soussigné(e) :'));
    $pdf->Cell(40,10,utf8_decode($userConnecte->get_nom()).' '.utf8_decode($userConnecte->get_prenom()));
    $pdf->ln();
    $pdf->Cell(30,10,utf8_decode('Demeurant :'));
    $pdf->Cell(40,10,utf8_decode($userConnecte->get_rue()).', '.utf8_decode($userConnecte->get_cp()).', '.utf8_decode($userConnecte->get_Ville()));
    $pdf->ln();
    $pdf->Cell(40,10,utf8_decode('Certifie renoncer au rembourdement des frais ci-dessous et les laisser à l\'association :'));
    $pdf->ln();
    $pdf->Cell(40,10,utf8_decode('-').utf8_decode($infoclub->get_Nom_club()).' '.utf8_decode($infoclub->get_Adresse_club()).', '.utf8_decode($infoclub->get_Cp()).', '.utf8_decode($infoclub->get_Ville()));
    $pdf->ln();
    $pdf->Cell(40,10,utf8_decode('en tant que don.'));
    $pdf->ln();

    //debut tableau
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(0,0,0); // Noir
    $pdf->SetFillColor(200); // Niveau de gris
    //$pdf->SetX(80);
    $pdf->Cell(30,15,utf8_decode('Date'),1,0,'C',true);
    $pdf->Cell(50,15,utf8_decode('Motif'),1,0,'C',true);
    $pdf->Cell(50,15,utf8_decode('Trajet'),1,0,'C',true);
    $pdf->Cell(10,15,utf8_decode('Km'),1,0,'C',true);
    $pdf->Cell(30,15,utf8_decode('Coût trajet'),1,0,'C',true);
    $pdf->Cell(20,15,utf8_decode('Péages'),1,0,'C',true);
    $pdf->Cell(15,15,utf8_decode('Repas'),1,0,'C',true);
    $pdf->Cell(35,15,utf8_decode('Hébergement'),1,0,'C',true);
    $pdf->Cell(20,15,utf8_decode('Total'),1,0,'C',true);
    $pdf->Ln();

    //boucle sur les lignes de frais d'un club
    foreach($lignesFraisClubs as $uneLigneFraisClubs){

        //cout km de la ligne
        $cout_km=0;
        //cout total de la ligne
        $total_ligne =0;

      //recup le motif de la ligne de fraissq
      $leMotif = $motifDAO->findMotifByIdMotif($uneLigneFraisClubs->get_IdMotif());

      //boucle sur les indemnités
      foreach($Indemnites as $indemnite){
        //sépare l'année le mois et le jour dans un tableau
        $anneeBord = explode("-", $bordereauEnCours->get_Date_bordereau());
        $anneeInd = explode("-", $indemnite->get_annee());

        //trouve la correspondance entre la date de la ligne de frais et la date d'indemnité km
        if($anneeInd[0] == $anneeBord[0]){
          $cout_km = $uneLigneFraisClubs->get_KM() * $indemnite->get_Tarif_kilometrique();
        }

        //somme des différents frais de la ligne
        $total_ligne = $uneLigneFraisClubs->get_Cout_peages() + $uneLigneFraisClubs->get_Cout_repas() + $uneLigneFraisClubs->get_Cout_hebergement() + $cout_km;
      }

      //somme des différents frais de la ligne
      $total_bord = $total_bord + $total_ligne;

      //affiche les lignes de frais
      $pdf->Cell(30,15,utf8_decode($uneLigneFraisClubs->get_Date_frais()),1,0,'C',false);
      $pdf->Cell(50,15,utf8_decode($leMotif->get_Libelle()),1,0,'C',false);
      $pdf->Cell(50,15,utf8_decode($uneLigneFraisClubs->get_Trajet()),1,0,'C',false);
      $pdf->Cell(10,15,utf8_decode($uneLigneFraisClubs->get_KM()),1,0,'C',false);
      $pdf->Cell(30,15,utf8_decode($cout_km),1,0,'C',false);
      $pdf->Cell(20,15,utf8_decode($uneLigneFraisClubs->get_Cout_peages()),1,0,'C',false);
      $pdf->Cell(15,15,utf8_decode($uneLigneFraisClubs->get_Cout_repas()),1,0,'C',false);
      $pdf->Cell(35,15,utf8_decode($uneLigneFraisClubs->get_Cout_hebergement()),1,0,'C',false);
      $pdf->Cell(20,15,utf8_decode($total_ligne),1,0,'C',false);
      $pdf->ln();
    }

    $pdf->Cell(240,15,utf8_decode('Montant total des frais de déplacement'),1,0,'C',false);
    $pdf->Cell(20,15,utf8_decode($total_bord),1,0,'C',false);
    $pdf->ln();

    $pdf->Cell(110,10,utf8_decode('Je suis le représentant légal des adhérents suivants :'));
    $pdf->ln();

    //boucle sur les adhérents du club pour les affichés
    foreach($adherentsDuClub as $unAdherentDuClub){
      $pdf->Cell(50,10,'-'.utf8_decode($unAdherentDuClub->get_Nom()).' '.utf8_decode($unAdherentDuClub->get_Prenom()));
      $pdf->ln();
    }

    $pdf->Cell(50,10,utf8_decode('Montant total des dons :'));
    $pdf->Cell(50,10,utf8_decode($total_bord));
    $pdf->ln();
    $pdf->Cell(50,10,utf8_decode('Partie réservé à l\'association'));
    $pdf->ln();
    $pdf->Cell(50,10,utf8_decode('N° d\'ordre du Reçu :'));
    $pdf->Cell(50,10,utf8_decode(''));
    $pdf->ln();
    $pdf->Cell(50,10,utf8_decode('Remis le :'));
    $pdf->ln();
    $pdf->Cell(50,10,utf8_decode('Signature du Trésorier :'));
    $pdf->ln();
  }
}

// Génération du document PDF
$pdf->Output();
