<?php
session_start();
include "../init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
$clubDAO = new ClubDAO();

if (isset($_GET['idUser'])) {
    $idResp = $_GET['idUser'];
    $userConnecte = $responsableDAO->find($idResp);
}
//recup tout les adherents du responsable
$lesAdherents = $adherentDAO->findAllAdherentbyResp($idResp);

//recup submit suppression adherent
$validSupprAdherent = isset($_POST['val_suppr_adherent']) ? $_POST['val_suppr_adherent'] : '0';

if($validSupprAdherent==1){
  //recup num license adherent puis suppression
  $num_license = isset($_POST['adherent_supprimer']) ? $_POST['adherent_supprimer'] : '';
  $adherentDAO->deleteAdherent($num_license);
  redirige('../principal.php');
}

?>
<!DOCTYPE html>
<html>
<head lang="fr">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">

    <title>Fredi</title>

</head>
<body  class="bg-dark fg-white">
  <h1 class="start-screen-title">Fredi</h1></br>
  <center>
    <table class="bg-white fg-black table striped table-border" style='z-index: 1011'>
      <thead><tr>
              <th>Numéro de license</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Sexe</th>
              <th>Date naissance</th>
              <th>Club</th>
              <th>Action</th>
            </tr>
      </thead>
<?php
  foreach($lesAdherents as $unAdherent){
    //trouve le club de l'adherent
    $leClub = $clubDAO->find($unAdherent->get_ID_club());
    echo("<tr>
       <td>".$unAdherent->get_Num_license()."</td>
       <td>".$unAdherent->get_Nom()."</td>
       <td>".$unAdherent->get_Prenom()."</td>
       <td>".$unAdherent->get_Sexe()."</td>
       <td>".$unAdherent->get_Date_naissance()."</td>
       <td>".$leClub->get_Nom_club()."</td>");
     echo('<td><p><a href="update_adherent.php?numLicense='.$unAdherent->get_Num_license().'"><button class="button success">Modifier</button></a></p>
              <form action="#" method="POST">
                <input type="hidden" name="adherent_supprimer" value='.$unAdherent->get_Num_license().'>
                <button id="test_form" name="val_suppr_adherent" value="1" class="button alert">Supprimer</button>
              </form>
         </td>');
      echo'</tr>';
  }
?>
    </table>
  </center>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script language="javascript" type="text/javascript">
    function redirection(test_form) {
      document.getElementById(test_form).submit();
    }
  </script>
</body>
</html>
