<?php
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();

$Motifs = $motifDAO->findAll();
$Indemnites = $indemniteDAO->findAll();
?>
<!DOCTYPE html>
<html>
<head lang="fr">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">

  <title>Fredi</title>

</head>
<body  class="bg-dark fg-white">
<?php
$cout_km=0;
$total_bord =0;
$openGestion=1;

if (isset($_GET['idBorddereau'])) {
    $idBord= $_GET['idBorddereau'];
}

$bordereauEnCours = $bordereauDAO->find($idBord);

$detailsBordereau = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());

echo '<table class="table bg-white striped table-border">';
//entete du tableau
echo('<thead><tr>
        <th>Date Frais</th>
        <th>Trajet</th>
        <th>KM</th>
        <th>Peages</th>
        <th>Repas</th>
        <th>Hebergement</th>
        <th>Motif</th>
     </tr></thead>');
     foreach($detailsBordereau as $detailBordereau){
       echo("<tr style='color: black'>
          <td>" .$detailBordereau->get_Date_frais() . "</td>
          <td>" .$detailBordereau->get_Trajet() . "</td>
          <td>" .$detailBordereau->get_KM()."</td>
          <td>".$detailBordereau->get_Cout_peages()."</td>
          <td>".$detailBordereau->get_Cout_repas()."</td>
          <td>".$detailBordereau->get_Cout_hebergement()."</td>");

      //cherche libelle correspondant
      foreach($Motifs as $Motif){
        if($detailBordereau->get_IdMotif()==$Motif->get_IdMotif()){
          echo("<td>".$Motif->get_Libelle()."</td>");
        }
      }
     
      foreach($Indemnites as $indemnite){
        $anneeInd = explode("-", $indemnite->get_annee());
        $anneeBord = explode("-", $bordereauEnCours->get_Date_bordereau());

        if($anneeInd[0] == $anneeBord[0]){
          $cout_km = $detailBordereau->get_KM() * $indemnite->get_Tarif_kilometrique();
        }
      }

    $total_bord = $total_bord + $detailBordereau->get_Cout_peages() + $detailBordereau->get_Cout_repas() + $detailBordereau->get_Cout_hebergement() + $cout_km;

      echo'</tr>';
}
echo '</table>';
echo '<p> Total : '.$total_bord.'</p>';
echo '<p><a href="gestion_bordereau.php">Retour</a> aux bordereaux</p>';
?>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  <script>
    function invalidForm(){
      var form  = $(this);
      form.addClass("ani-ring");
      setTimeout(function(){
        form.removeClass("ani-ring");
      }, 1000);
    }
    function validateForm(){
      $(".login-form").animate({
        opacity: 0
      });
    }
  </script>
  <script language="javascript" type="text/javascript">
    function redirection(test_form) {
      document.getElementById(test_form).submit();
    }
  </script>
</body>
</html>
