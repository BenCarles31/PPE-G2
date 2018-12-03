<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$Motifs = $motifDAO->findAll();

if($_SESSION['typeUser']==1){
  $userConnecte = $responsableDAO->find($_SESSION['idUser']);
  $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
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
  <!-- affiche la creation d'un bordereau (include)-->
  <div class="dialog" id="W_creation_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/creer_bordereau.php'; ?></div>
  <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/add_adherent.php'; ?></div>
  <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/afficher_bordereau.php'; ?></div>
  <div class="dialog" id="W_ajout_ligne_frais" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/add_ligne_frais.php'; ?></div>
  <div class="dialog" id="W_gestion_profil" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/gestion_profil.php'; ?></div>

  <div class="tiles-area">
    <?php if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==1)
      {
    ?>
    <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Accueil">
      <!-- ouvre le dialog pour creer un bordereau -->
      <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_creation_bordereau')">
          <span class="mif-github icon" onclick="Metro.dialog.open('#W_creation_bordereau')"></span>
          <span class="branding-bar" onclick="Metro.dialog.open('#W_creation_bordereau')">Creation bordereau</span>
      </div>


          <!-- ouvre le dialog pour afficher le bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_aff_bordereau')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_aff_bordereau')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_aff_bordereau')">afficher Bordereau</span>
          </div>
          <!-- ouvre le dialog pour ajouter une ligne de frais -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_ajout_ligne_frais')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">Ajouter ligne frais</span>
          </div>

          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_add_adherent')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_add_adherent')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_add_adherent')">Ajouter adhérents</span>
          </div>

          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_gestion_profil')">
              <span class="mif-github icon" onclick="Metro.dialog.open('#W_gestion_profil')"></span>
              <span class="branding-bar" onclick="Metro.dialog.open('#W_gestion_profil')">Gestion du profil</span>
          </div>

      </div>
      <?php
        }
        if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==2)
        {
      ?>
      <div class="tiles-area">
        <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Tresorier">
          <!-- ouvre le dialog pour acceder au bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_acceder_bordereau')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_acceder_bordereau')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_acceder_bordereau')">Acceder au bordereau</span>
          </div>
          <!-- ouvre le dialog pour afficher justificatif -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_afficher_justificatif')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_afficher_justificatif')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_afficher_justificatif')">Afficher justificatif</span>
          </div>
        </div>
      </div>
      <?php
          }
          if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==3)
          {
      ?>

      <?php
          }
      ?>
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
