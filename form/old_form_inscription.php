<?php
include "Fonc.php";
session_start();

//par defaut pour tester
$license_null='null';
$id_club=1;
$id_responsable=null;

//recup formulaire inscription
$valid_inscription = isset($_POST['valid_inscrit']) ? $_POST['valid_inscrit'] : '0';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
$date_naiss = isset($_POST['naissance']) ? $_POST['naissance'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$mdp1 = isset($_POST['mdp1']) ? $_POST['mdp1'] : '';
$mdp2 = isset($_POST['mdp2']) ? $_POST['mdp2'] : '';

if($valid_inscription == 1){
    //connexion BD
    $con=db_connect();

    //verifie que les 2 mdp sont identiques
    if($mdp1 == $mdp2){

        //cherche si l'utilsiateur existe deja (completer la requete email, date_naiss...)
        $rows=select_utilisateur($nom,$prenom,$con);

        //si user n'existe pas deja
        if(count($rows)==0){
            //hasshage du mdp
            $mdp=mdp_hash($mdp1);
            //requete d'insertion de l'user dans la BDD
            register($license_null,$nom,$prenom,$sexe,$date_naiss,$mail,$adresse,$cp,$ville,$mdp,$id_club,$id_responsable,$con);
            //redirige vers index
            header('Location: index.php');
        }else{
            echo('Ce profil existe deja</br>');
        }
    }else{
        echo('mdp doivent etre identique</br>');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="start.css" rel="stylesheet">

    <style>
      .login-form {
          width: 350px;
          height: auto;
          top: 50%;
          margin-top: -300px;
      }
    </style>

    <body class="h-vh-100 bg-dark fg-white">

      <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
            data-role="validator"
            action="#"
            method="POST"
            data-clear-invalid="2000"
            data-on-error-form="invalidForm"
            data-on-validate-form="validateForm">

            <div class="form-group">
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir nom" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir prenom" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="sexe"  data-prepend="<span class='mif-envelop'>" placeholder="Saisir sexe" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" data-role="calendarpicker" name="naissance" data-year="false" data-locale="fr-FR">
            </div>

            <div class="form-group">
                <input type="text" name="mail" data-prepend="<span class='mif-envelop'>" placeholder="Saisir email" data-validate="required email">
            </div>

            <div class="form-group">
                <input type="text" name="adresse" data-prepend="<span class='mif-envelop'>" placeholder="Saisir adresse" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="cp" data-prepend="<span class='mif-envelop'>" placeholder="Saisir code postal" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="ville" data-prepend="<span class='mif-envelop'>" placeholder="Saisir ville" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="mdp1" data-prepend="<span class='mif-envelop'>" placeholder="Saisir mdp" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="mdp2" data-prepend="<span class='mif-envelop'>" placeholder="Confirmer  mdp" data-validate="required">
            </div>
            <div class="form-group">
            <button id="test_form" name="valid_inscrit" value="1" class="button">S'inscrire</button><br/>
            </div>
    </form>

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
