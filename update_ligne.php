<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
$bordereauDAO = new BordereauDAO();
$indemniteDAO = new IndemniteDAO();
$motifDAO = new MotifDAO();
$statutDAO = new StatutDAO();
$Motifs = $motifDAO->findAll();


$StatutAttente = $statutDAO->findByLibelle('En attente');

if($_SESSION['typeUser']==1){
  $userConnecte = $responsableDAO->find($_SESSION['idUser']);
  $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user(),$StatutAttente->get_Id_statut());
}

if (isset($_GET['idLigne'])) {
    $idLigne = $_GET['idLigne'];
    $ligneModifier = $bordereauDAO->findUneLigne($idLigne);
    foreach($Motifs as $Motif){
      if($Motif->get_IdMotif()==$ligneModifier->get_IdMotif()){
        $motifLigneModifier = $Motif->get_Libelle();
        $IdMotifLigneModifier = $Motif->get_IdMotif();
      }
    }
}

//recup formulaire
$valid_modif_ligne_bordereau = isset($_POST['valid_modif_ligne_bordereau']) ? $_POST['valid_modif_ligne_bordereau'] : '0';
$date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : 'null';
$km = isset($_POST['KM']) ? $_POST['KM'] : 'null';
$peages = isset($_POST['peages']) ? $_POST['peages'] : 'null';
$repas = isset($_POST['repas']) ? $_POST['repas'] : 'null';
$hebergement = isset($_POST['hebergement']) ? $_POST['hebergement'] : 'null';

if($valid_modif_ligne_bordereau==1){
  $bordereauDAO->update($ligneModifier->get_Id_ligne(),$date_frais,$trajet,$km,$peages,$repas,$hebergement,$motif);

  redirige('principal.php');
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
          <h2 class="text-light" style="color: black">Modification d'une ligne de frais</h2>
          <hr class="thin mt-4 mb-4 bg-white">

              <div class="form-group">
                  <input type="text" name="date_frais" data-role="calendarpicker" data-year="false" data-locale="fr-FR"
                  value="<?php echo $ligneModifier->get_Date_frais(); ?>">
              </div>

              <div class="form-group">
                <label>Motif:</label>
                <select data-role="select" data-validate="required not=-1" name="motif" size=1>
               <option value="<?php echo $IdMotifLigneModifier;?>"><?php echo $motifLigneModifier; ?></option>
                <?php
                   //affiche les libelle des motifs en liste déroulante
                   foreach($Motifs as $Motif){
                     echo('<option value="'.$Motif->get_IdMotif().'">'.$Motif->get_Libelle().'</option>');
                   }
                ?>
               </select>
              </div>

              <div class="form-group">
                  <input type="text" name="trajet" data-prepend="<span class='mif-envelop'>" value="<?php echo $ligneModifier->get_Trajet(); ?>">
              </div>

              <div class="form-group">
                  <input type="text" name="KM" data-prepend="<span class='mif-envelop'>" value="<?php echo $ligneModifier->get_KM(); ?>">
              </div>

              <div class="form-group">
                  <input type="text" name="peages" data-prepend="<span class='mif-envelop'>" value="<?php echo $ligneModifier->get_Cout_peages(); ?>">
              </div>

              <div class="form-group">
                  <input type="text" name="repas" data-prepend="<span class='mif-envelop'>" value="<?php echo $ligneModifier->get_Cout_repas(); ?>">
              </div>

              <div class="form-group">
                  <input type="text" name="hebergement" data-prepend="<span class='mif-envelop'>" value="<?php echo $ligneModifier->get_Cout_hebergement(); ?>">
              </div>
              <div class="form-group">
                <button id="test_form" name="valid_modif_ligne_bordereau" value="1" class="button success">Modifier d'une ligne</button><br/>
              </div>
      </form>
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
</html>
