<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$statutDAO = new StatutDAO();

$StatutCloturer= $statutDAO->findByLibelle('Cloturer');
$StatutValider = $statutDAO->findByLibelle('Valider');

$cloturerBordereau = isset($_POST['validBordereau']) ? $_POST['validBordereau'] : '';
$idBordereau = isset($_POST['idBordereau']) ? $_POST['idBordereau'] : '';

if($cloturerBordereau){
  $bordereauDAO->updateStatutBordereau($StatutCloturer->get_Id_statut(),$idBordereau);
  redirige('principal.php');
}
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

  <h1 class="start-screen-title">Fredi</h1></br>
<?php
$lesBordereaux = $bordereauDAO->findAllBord();

echo '<table class="table bg-white striped table-border">';
//entete du tableau
echo('<thead><tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date</th>
        <th>Détails</th>
        <th>Action</th>
     </tr></thead>');

foreach($lesBordereaux as $Bordereau){
  if($Bordereau->get_Id_statut()==$StatutValider->get_Id_statut()){
  $resp_by_bord = $responsableDAO->findRespByIdBordeau($Bordereau->get_ID_bordereau());
  echo("<tr style='color: black'>");
   echo '<td>'.$resp_by_bord->get_nom().'</td>';
   echo '<td>'.$resp_by_bord->get_prenom().'</td>';
   echo '<td>'.$Bordereau->get_Date_bordereau().'</td>';
   echo '<td><a href="affichage_details_bordereau.php?idBorddereau='.$Bordereau->get_ID_bordereau().'">Détails</a></td>';
   echo ('<td>
            <form action="#" method="POST">
              <input type="hidden" name="idBordereau" value="'.$Bordereau->get_ID_bordereau().'">
              <input type="submit" name="validBordereau" class="button success" value="Cloturer">
            </form>
        </td>');
   echo "</tr>";
 }
}
echo '</table>';
echo '<p><a href="principal.php">Retour</a> à l\'accueil</p>';
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
<script language="javascript" type="text/javascript">
  function opendialog(dialog) {
    document.getElementById(dialog).Metro.dialog.open();
  }
</script>
</body>
</html>
