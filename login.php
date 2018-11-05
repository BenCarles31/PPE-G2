<?php
include "Fonc.php";
include 'classes/DAO.php';
include 'classes/UtilisateurDAO.php';
include 'classes/Utilisateur.php';

$user = new UtilisateurDAO();
$id_user_connected = 0;

session_start();
$_SESSION['id_user']=0;
$_SESSION['type_user']=0;

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
          margin-top: -160px;
      }
    </style>

    <body class="h-vh-100 bg-dark fg-white">

        <div class="container-fluid start-screen no-overflow">
        <h1 class="start-screen-title">Connexion</h1></br>

        <div class="tiles-area">
            <div class="tiles-grid tiles-group size-2 fg-white">
                <!-- ouvre le formulaire de connexion pour les adherents -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_login_adherent')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_login_adherent')"></span>
                    <span class="branding-bar"onclick="Metro.dialog.open('#W_login_adherent')">Adherent</span>
                </div>

                <!-- ouvre le formulaire de connexion pour le CRIB/treso -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_login_admin')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_login_admin')"></span>
                    <span class="branding-bar" onclick="Metro.dialog.open('#W_login_admin')">CRIB/Tresorier</span>
                </div>
            </div>

        </div>
        <!-- affiche le formulaire de connexion adherent (include)-->
        <div class="dialog" id="W_login_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/login_adherent.php'; ?></div>

        <!-- affiche le formulaire de connexion CRIB/treso (include) -->
        <div class="dialog" id="W_login_admin" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/login_crib_treso.php'; ?></div>

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
