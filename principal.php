<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$statutDAO = new StatutDAO();
$clubDAO = new ClubDAO();

$statuts = $statutDAO->findAllStatut();
$StatutAttente = $statutDAO->findByLibelle('En attente');
$StatutCloturer= $statutDAO->findByLibelle('Cloturer');
$StatutValider = $statutDAO->findByLibelle('Valider');
$Motifs = $motifDAO->findAll();

$userConnecte = $responsableDAO->find($_SESSION['idUser']);
if($_SESSION['typeUser']==1){
  $date = date('Y-m-d');
  $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user(),$StatutAttente->get_Id_statut());
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

  <div class="tiles-area">
    <?php if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==1) {

      ?>
      <div class="dialog" id="W_creation_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/creer_bordereau.php'; ?></div>
      <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/add_adherent.php'; ?></div>
      <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/afficher_bordereau.php'; ?></div>
      <div class="dialog" id="W_aff_oldBordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/afficher_oldBordereau.php'; ?></div>
      <div class="dialog" id="W_ajout_ligne_frais" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/add_ligne_frais.php'; ?></div>
      <div class="dialog" id="W_gestion_profil" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/gestion_profil.php'; ?></div>

      <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Accueil">
        <?php if($bordereauEnCours->get_Id_statut()=='???' && $_SESSION['typeUser']==1){ ?>
        <!-- ouvre le dialog pour creer un bordereau -->
        <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_creation_bordereau')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_creation_bordereau')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_creation_bordereau')">Creation bordereau</span>
        </div>
      <?php
        }
        if($bordereauEnCours->get_Id_statut()!=='???' && $_SESSION['typeUser']==1){
      ?>
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
      <?php
        }
      ?>
        <!-- ouvre le dialog pour afficher le bordereau -->
        <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_aff_oldBordereau')">
          <span class="mif-github icon" onclick="Metro.dialog.open('#W_aff_oldBordereau')"></span>
          <span class="branding-bar" onclick="Metro.dialog.open('#W_aff_oldBordereau')">afficher anciens Bordereau</span>
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
        <!-- ouvre le dialog pour se déconnecter -->
        <a href="logout.php">
          <div data-role="tile" class="bg-indigo fg-white">
              <span class="mif-github icon"></span>
              <span class="branding-bar">Déconnexion</span>
          </div>
        </a>

      </div>
      <?php
        }
        if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==2) {
      ?>
      <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/acceder_bordereau.php'; ?></div>
      <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/afficher_justificatif.php'; ?></div>

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
          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_gestion_profil')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_gestion_profil')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_gestion_profil')">Gestion du profil</span>
          </div>

          <a href="logout.php">
            <div data-role="tile" class="bg-indigo fg-white">
                <span class="mif-github icon"></span>
                <span class="branding-bar">Déconnexion</span>
            </div>
          </a>
        </div>
      </div>
      <?php
        }
        if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==3) {
      ?>
      <div class="dialog" id="W_gestion_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto">
        <button class=" button alert drop-shadow" onclick="Metro.dialog.open('#w_NDF_Refusmana');Metro.dialog.close('#W_NDF_Affmana')" ><span class="mif-cross icon"> Refuser </span></button>
        <?php include 'form/gestion_bordereau.php'; ?>
      </div>
      <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form/gestion_motif'; ?></div>
      <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php// include 'form/add_motif_frais.php'; ?></div>

      <div class="tiles-area">
        <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="CRIB">
          <!-- ouvre le dialog pour affilier un club -->
          <div data-role="tile" class="bg-indigo fg-white">
            <a href="gestion_bordereau.php" style="color: black"><span> Gestion des Bordereau </span>
            </a>
          </div>
          <!-- ouvre le dialog pour ajouter un tarif kilométrique -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')">Tarif kilométrique</span>
          </div>
          <!-- ouvre le dialog pour ajouter un motif de frais -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_add_motif_frais')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_add_motif_frais')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_add_motif_frais')">Motif de frais</span>
          </div>
          <!-- ouvre le dialog pour creer un bordereau -->
          <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_gestion_profil')">
            <span class="mif-github icon" onclick="Metro.dialog.open('#W_gestion_profil')"></span>
            <span class="branding-bar" onclick="Metro.dialog.open('#W_gestion_profil')">Gestion du profil</span>
          </div>

          <a href="logout.php">
            <div data-role="tile" class="bg-indigo fg-white">
                <span class="mif-github icon"></span>
                <span class="branding-bar">Déconnexion</span>
            </div>
          </a>
        </div>
      </div>
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
  <script language="javascript" type="text/javascript">
    function opendialog(dialog) {
      document.getElementById(dialog).Metro.dialog.open();
    }
  </script>
</body>
</html>
