<?php
session_start();
include "../init.php";
$responsableDAO = new ResponsableDAO ();
$adherentDAO = new AdherentDAO();
$clubDAO = new ClubDAO();

if (isset($_GET['numLicense'])) {
    $num_license = $_GET['numLicense'];
    $adherent = $adherentDAO->find($num_license);
    //trouve club d el'adherent
    $clubAdherent = $clubDAO->find($adherent->get_ID_club());
}

$lesClubs = $clubDAO->findAllClub();

//recup submit update adherent
$validUpdateAdherent = isset($_POST['valid_update_adherent']) ? $_POST['valid_update_adherent'] : '0';

if($validUpdateAdherent==1){
  //recup formulaire
  $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
  $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
  $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
  $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '';
  $id_club = isset($_POST['nom_club']) ? $_POST['nom_club'] : '';

  $adherentDAO->updateAdherent($nom,$prenom,$sexe,$date_naissance,$id_club,$adherent->get_Id_user(),$adherent->get_Num_license());

  redirige('../principal.php');
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
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Nom(); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Prenom(); ?>">
            </div>

            <div class="form-group">
              <label>Sexe:</label>
            	<select data-role="select" class="mon-select2" name="sexe" size=3>
              	<option value="1">Masculin</option>
                <option value="2">Feminin</option>
                <option value="3">Non-binaire</option>
            	</select>
            </div>

            <div class="form-group">
                <input type="text" name="date_naissance" data-prepend="<span class='mif-envelop'>" value="<?php echo $adherent->get_Date_naissance(); ?>">
            </div>

            <div class="form-group">
              <label>Club:</label>
              <select data-role="select" class="mon-select2" data-validate="required not=-1" name="nom_club" size=1>
             <option value="<?php echo $clubAdherent->get_ID_club();?>"><?php echo $clubAdherent->get_Nom_club(); ?></option>
              <?php
                 //affiche les libelle des motifs en liste déroulante
                 foreach($lesClubs as $unClub){
                   echo('<option value="'.$unClub->get_ID_club().'">'.$unClub->get_Nom_club().'</option>');
                 }
              ?>
             </select>
            </div>

            <div class="form-group">
              <button id="test_form" name="valid_update_adherent" value="1" class="button success">Modifier l'adhérent</button><br/>
            </div>
      </form>
   </center>
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
