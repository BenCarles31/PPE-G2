<?php
session_start();
include "init.php";
//connexion pour requete affichage dans formulaire pb 2 entree dans la base
$con=db_connect();
$utilisateur = new UtilisateurDAO();
$utilisateur_connecter = $utilisateur->find($_SESSION['id_user']);

//recuperation des motifs dans la base pour la liste deroulante (pb 2 entrees BDD DAO, fonc)
$rows=select_motif($con);
foreach($rows as $row){
 $tabmotif[$row['idMotif']] = $row['libelle'];
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

    <body class="bg-dark fg-white">
      <div class="container-fluid start-screen no-overflow">
          <h1 class="start-screen-title">Fredi</h1></br>


      <?php if($_SESSION['id_user']!=0 && $_SESSION['type_user']==1)
        {
      ?>
        <div class="tiles-area">
          <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Responsable">
                <!-- ouvre le dialog pour ajouter un adherent -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_ajout_adherent')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_ajout_adherent')"></span>
                    <span class="branding-bar"onclick="Metro.dialog.open('#W_ajout_adherent')">Ajouter un adherent</span>
                </div>

                <!-- ouvre le dialog pour creer un bordereau -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_creation_bordereau')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_creation_bordereau')"></span>
                    <span class="branding-bar" onclick="Metro.dialog.open('#W_creation_bordereau')">Creation bordereau</span>
                </div>

                <!-- ouvre le dialog pour ajouter une ligne de frais -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_ajout_ligne_frais')"></span>
                    <span class="branding-bar" onclick="Metro.dialog.open('#W_ajout_ligne_frais')">Ajouter ligne de frais</span>
                </div>

                <!-- ouvre le dialog pour visualiser le bordereau en cours -->
                <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_afficher_bordereau')">
                    <span class="mif-github icon" onclick="Metro.dialog.open('#W_afficher_bordereau')"></span>
                    <span class="branding-bar" onclick="Metro.dialog.open('#W_afficher_bordereau')">Afficher bordereau</span>
                </div>
            </div>
        </div>

    <?php
      }else{
        echo ('La tuile');
      }
    ?>
    <!-- affiche la creation d'un bordereau (include)-->
    <div class="dialog" id="W_creation_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/creer_bordereau.php'; ?></div>
    <!-- affiche le formulaire pour ajouter un adherent (include)-->
    <div class="dialog" id="W_ajout_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/ajout_adherent.php'; ?></div>
    <!-- affiche le formulaire pour ajouter une ligne de frais (include)-->
    <div class="dialog" id="W_ajout_ligne_frais" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/ajout_ligne_bordereau.php'; ?></div>
    <!-- affiche le bordereau en cours (include)-->
    <div class="w-100" id="W_afficher_bordereau" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="50%"><?php include 'form/afficher_bordereau.php'; ?></div>


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
