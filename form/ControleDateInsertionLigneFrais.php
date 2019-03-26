<?php
//recup formulaire
$date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$clubAdherent = isset($_POST['nom_club']) ? $_POST['nom_club'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : '???';
$km = isset($_POST['KM']) ? $_POST['KM'] : '???';
$peages = isset($_POST['peages']) ? $_POST['peages'] : 'null';
$repas = isset($_POST['repas']) ? $_POST['repas'] : 'null';
$hebergement = isset($_POST['hebergement']) ? $_POST['hebergement'] : 'null';

//sépare l'année les mois et les jours pour comparer uniquement les années
$anneeBordControle = explode("-", $bordereauEnCours->get_Date_bordereau());
$anneeIndControle = explode("-", $date_frais);

//compare si l'annee de la ligne de frais correspond à l'annee du bordereau
if($anneeBordControle[0]==$anneeIndControle[0]){
  $bordereauDAO->insertLigneFrais($date_frais,$trajet,$km,$peages,$repas,$hebergement,$motif,$bordereauEnCours->get_ID_bordereau(),$clubAdherent);
  redirige('principal.php');
}else{
  echo ('<div data-role="window" data-title="Erreur contrôle des dates" data-shadow="true" class="p-2" style="z-index: 100;">
             L\'année d\'une ligne de frais doit correspondre à l\'année du bordereau.
        </div>');
}
?>
