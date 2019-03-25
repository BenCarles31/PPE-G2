<?php
session_start();
include '..'.DS.'init.php';
$motifDAO = new MotifDAO();

$valid_update_motif = isset($_POST['val_update_motif']) ? $_POST['val_update_motif'] : '';
$valid_add_motif = isset($_POST['val_add_motif']) ? $_POST['val_add_motif'] : '';

$valUpdate = isset($_POST['ValUpdate']) ? $_POST['ValUpdate'] : '';
$valAdd = isset($_POST['ValAdd']) ? $_POST['ValAdd'] : '';

if($valUpdate){
  $idMotifUpadte = isset($_POST['idMotifUpdate']) ? $_POST['idMotifUpdate'] : '';
  $libelle = isset($_POST['libelle_motif']) ? $_POST['libelle_motif'] : '';
  $motifDAO->updateMotif($libelle,$idMotifUpadte);
  redirige(ROOT .'../principal.php');
}

if($valAdd){
  $libelle = isset($_POST['libelle_motif']) ? $_POST['libelle_motif'] : '';
  $motifDAO->addMotif($libelle);
  redirige(ROOT .'../principal.php');
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
  <center><br/><br/>
  <?php
  if($valid_update_motif){
    $update_motif = isset($_POST['motif_update']) ? $_POST['motif_update'] : '';
    $motifModifier = $motifDAO->findMotifByIdMotif($update_motif);
    echo '<form class="login-form bg-white p-6 w-25 border bd-default win-shadow"
                action="#"
                method="POST">
            <input type="hidden" name="idMotifUpdate" value='.$motifModifier->get_IdMotif().'>
            <div class="form-group">
                <input type="text" name="libelle_motif" value='.$motifModifier->get_Libelle().'>
            </div>
            <p><input type="submit" name="ValUpdate" class="button success" value="Modifer"></p>
          </form>';
  }

  if($valid_add_motif){
    $add_motif = isset($_POST['motif_add']) ? $_POST['motif_add'] : '';
    echo '<form class="login-form bg-white p-6 w-25 border bd-default win-shadow"
                action="#"
                method="POST">
            <div class="form-group">
                <input type="text" name="libelle_motif" placeholder="Saisir libelle">
            </div>
            <p><input type="submit" name="ValAdd" class="button success" value="Ajouter"></p>
          </form>';
  }
  ?>
</center>
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
