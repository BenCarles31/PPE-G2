<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
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
$Indemnites = $indemniteDAO->findAll();

$userConnecte = $responsableDAO->find($_SESSION['idUser']);
if($_SESSION['typeUser']==1){
  $date = date('Y-m-d');
  $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user(),$StatutAttente->get_Id_statut());

  $ALLBordereaux = $bordereauDAO->findAllBordByUser($userConnecte->get_id_user());
  $bordereauCloturer=0;

  $lesClubsByAdherents = $clubDAO->findClubCascadingRespAndAdherent($userConnecte->get_id_user());

  foreach ($ALLBordereaux as $unBordereau){
    if($unBordereau->get_Id_statut() == $StatutCloturer->get_Id_statut()){
      $bordereauCloturer++;
    }
  }
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

  <div class="tiles-area">
    <?php if($_SESSION['idUser']!=0 && $_SESSION['typeUser']==1) {

      ?>
      <div class="dialog" id="W_creation_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form'.DS.'creer_bordereau.php'; ?></div>
      <div class="dialog" id="W_add_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form'.DS.'add_adherent.php'; ?></div>
      <div class="dialog" id="W_aff_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form'.DS.'afficher_bordereau.php'; ?></div>
      <div class="dialog" id="W_aff_oldBordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form'.DS.'afficher_oldBordereau.php'; ?></div>
      <div class="dialog" id="W_ajout_ligne_frais" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form'.DS.'add_ligne_frais.php'; ?></div>
      <div class="dialog" id="W_gestion_profil" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form'.DS.'gestion_profil.php'; ?></div>

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
          //recup du submit de add ligne de frais
          $valid_ajout_ligne_bordereau = isset($_POST['valid_ajout_ligne_bordereau']) ? $_POST['valid_ajout_ligne_bordereau'] : '0';

          if($valid_ajout_ligne_bordereau==1){
            //controle de la correspondance des dates des ligne de frais et du bordereau + insertion
            include 'form'.DS.'ControleDateInsertionLigneFrais.php';
          }
        }
        if($bordereauCloturer>0){
      ?>
        <!-- ouvre le dialog pour afficher le bordereau -->
        <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_aff_oldBordereau')">
          <span class="mif-github icon" onclick="Metro.dialog.open('#W_aff_oldBordereau')"></span>
          <span class="branding-bar" onclick="Metro.dialog.open('#W_aff_oldBordereau')">afficher anciens Bordereau</span>
        </div>
      <?php
        }
      ?>
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

        <a href="form/pdf.php">
          <div data-role="tile" class="bg-indigo fg-white">
              <span class="mif-github icon"></span>
              <span class="branding-bar">Générer PDF</span>
          </div>
        </a>
        &nbsp
        <!-- ouvre le dialog pour se déconnecter -->
        <a href="logout.php" taget="_BLANK">
          <div data-role="tile" class="bg-indigo fg-white">
              <span class="mif-github icon"></span>
              <span class="branding-bar">Déconnexion</span>
          </div>
        </a>

      </div>
      <?php
        }
        if($_SESSION['idUser']!=0 && ($_SESSION['typeUser']==3 || $_SESSION['typeUser']==2)) {
      ?>
      <div class="dialog" id="W_gestion_motif" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="w-75"><?php include 'form'.DS.'gestion_motif.php' ?></div>
      <div class="dialog" id="W_add_tarif_kilometrique" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form'.DS.'add_tarif_kilometrique.php'; ?></div>

      <div class="tiles-area">
        <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="CRIB">
          <!-- ouvre le dialog pour affilier un club -->
          </div>
          <div class="grid">
            <div class="row">
                <a href="gestion_bordereau.php">
                  <div data-role="tile" class="bg-indigo fg-white">
                      <span class="mif-github icon"></span>
                      <span class="branding-bar">Gestion des Bordereau</span>
                  </div>
                </a>
                &nbsp
              <!-- ouvre le dialog pour ajouter un tarif kilométrique -->
              <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')">
                <span class="mif-github icon" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')"></span>
                <span class="branding-bar" onclick="Metro.dialog.open('#W_add_tarif_kilometrique')">Tarif kilométrique</span>
              </div>
            </div>
          </div>

          <div class="grid">
            <div class="row">
              <!-- ouvre le dialog pour ajouter un motif de frais -->
              <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_gestion_motif')">
                <span class="mif-github icon" onclick="Metro.dialog.open('#W_gestion_motif')"></span>
                <span class="branding-bar" onclick="Metro.dialog.open('#W_gestion_motif')">Motif de frais</span>
              </div>
              &nbsp
              <a href="logout.php">
                <div data-role="tile" class="bg-indigo fg-white">
                    <span class="mif-github icon"></span>
                    <span class="branding-bar">Déconnexion</span>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
      <?php
        }
      ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
  <script>
    $(document).ready(function() {
        $('mon-select2').select2();
    });
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
