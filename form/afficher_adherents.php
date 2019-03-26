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
$lesAdherents = $adherentDAO->findAllAdherentbyResp($idResp)
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
  <center>
    <table class="table striped table-border">
      <thead><tr style='color: black'>
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
    $leClub = $clubDAO->find($unAdherent->get_ID_club());
    echo("<tr style='color: black'>
       <td>".$unAdherent->get_Num_license()."</td>
       <td>".$unAdherent->get_Nom()."</td>
       <td>".$unAdherent->get_Prenom()."</td>
       <td>".$unAdherent->get_Sexe()."</td>
       <td>".$unAdherent->get_Date_naissance()."</td>
       <td>".$leClub->get_Nom_club()."</td>");
     echo('<td><p><a href="form'.DS.'update_adherent.php?idLigne='.$unAdherent->get_Num_license().'"><button class="button success">Modifier</button></a></p>
              <form action="#" method="POST">
                <input type="hidden" name="ligne_supprimer" value='.$unAdherent->get_Num_license().'>
                <input type="submit" name="val_suppr" class="button alert" value="Supprimer">
              </form>
         </td>');
      echo'</tr>';
  }
?>
    </table>
  </center>
</body>
</html>
