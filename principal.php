<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();

if($_SESSION['typeUser']==1){
  $userConnecte = $responsableDAO->find($_SESSION['idUser']);
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
  <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/add_adherent.php'; ?></div>
  <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/afficher_bordereau.php'; ?></div>
  <div class="dialog" id="W_ajout_ligne_frais" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/add_ligne_frais.php'; ?></div>

  <div class="tiles-area">
    <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Accueil">
          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_aff_bordereau')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_aff_bordereau')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_aff_bordereau')">afficher Bordereau</span>
          </div>
          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_ajout_ligne_frais')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">Ajouter ligne frais</span>
          </div>

          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_add_adherent')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_add_adherent')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_add_adherent')">Ajouter adhérents</span>
          </div>

      </div>
  </div>

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
