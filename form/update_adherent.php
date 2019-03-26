<?php
session_start();
include "../init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
$clubDAO = new ClubDAO();

if (isset($_GET['numLicense'])) {
    $num_license = $_GET['numLicense'];
    $adherent = $adherentDAO->find($num_license);
    //trouve club d el'adherent
    $clubAdherent = $clubDAO->find($adherent->get_ID_club());
}
$lesClubs = $clubDAO->findAllClub();

//recup submit update adherent
$validUpdateAdherent = isset($_POST['valid_update_adherent']) ? $_POST['valid_update_adherent'] : '0';

if($validUpdateAdherent==1){
  //recup formulaire
  $license = isset($_POST['num_license']) ? $_POST['num_license'] : '';
  $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
  $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
  $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
  $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '';
  $id_club = isset($_POST['nom_club']) ? $_POST['nom_club'] : '';

  $adherentDAO->updateAdherent($license,$nom,$prenom,$sexe,$date_naissance,$id_club,);

  redirige('../principal.php');
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
  <center>
    <form class="login-form bg-white p-6 w-25 border bd-default win-shadow"
      action="#"
      method="POST">

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light" style="color: black">Modification du profil</h2>
        <hr class="thin mt-4 mb-4 bg-white">

            <div class="form-group">
                <input type="text" name="num_license" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Num_license(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Nom(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Prenom(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="sexe" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Sexe(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="date_naissance" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Date_naissance(); ?>">
            </div>

            <div class="form-group">
              <label>Club:</label>
              <select data-role="select" class="mon-select2" data-validate="required not=-1" name="nom_club" size=1>
             <option value="<?php echo $clubAdherent->get_ID_club();?>"><?php echo $clubAdherent->get_Nom_club(); ?></option>
              <?php
                 //affiche les libelle des motifs en liste déroulante
                 foreach($lesClubs as $unClub){
                   echo('<option value="'.$unClub->get_ID_club().'">'.$unClub->get_Nom_club().'</option>');
                 }
              ?>
             </select>
            </div>

            <div class="form-group">
              <button id="test_form" name="valid_update_adherent" value="1" class="button success">Modifier l'adhérent</button><br/>
            </div>
      </form>
   </center
