<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();

if (isset($_GET['idUser'])) {
    $idResp = $_GET['idUser'];
    $userConnecte = $responsableDAO->find($idResp);
}

$update_profil = isset($_POST['valid_update_profil']) ? $_POST['valid_update_profil'] : '0';
$mdp1 = isset($_POST['mdp1']) ? $_POST['mdp1'] : 'null';
$mdp2 = isset($_POST['mdp2']) ? $_POST['mdp2'] : 'null';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$rue = isset($_POST['rue']) ? $_POST['rue'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

if($update_profil==1){
  echo $mdp1.'</br>';
  echo $mdp2.'</br>';

  if($mdp1!='null' && $mdp2!='null'){
    if($mdp1!=$userConnecte->get_mdp() && $mdp2!=$userConnecte->get_mdp()){
      if($mdp1==$mdp2){
        $responsableDAO->update($userConnecte->get_id_user(),$nom,$prenom,$rue,$cp,$ville,$email,$mdp1);
      }
    }
  }

  if($mdp1='null' && $mdp2='null'){
    $responsableDAO->update($userConnecte->get_id_user(),$nom,$prenom,$rue,$cp,$ville,$email,$userConnecte->get_mdp());
  }

  //header('Location: principal.php');
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
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_nom(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_prenom(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="rue" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_rue(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="cp" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_cp(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="ville" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_Ville(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="email" data-prepend="<span class='mif-envelop'>" value="<?php echo $userConnecte->get_email(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="mdp1" placeholder="Saisir mdp">
            </div>

            <div class="form-group">
                <input type="text" name="mdp2" placeholder="Confirmer  mdp">
            </div>

            <div class="form-group">
              <button id="test_form" name="valid_update_profil" value="1" class="button success">Modifier le profil</button><br/>
            </div>
      </form>
   </center
