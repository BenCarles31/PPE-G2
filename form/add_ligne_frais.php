<?php
/*
//recup formulaire
$valid_ajout_ligne_bordereau = isset($_POST['valid_ajout_ligne_bordereau']) ? $_POST['valid_ajout_ligne_bordereau'] : '0';
$date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : '???';
$km = isset($_POST['KM']) ? $_POST['KM'] : '???';
$peages = isset($_POST['peages']) ? $_POST['peages'] : 'null';
$repas = isset($_POST['repas']) ? $_POST['repas'] : 'null';
$hebergement = isset($_POST['hebergement']) ? $_POST['hebergement'] : 'null';

if($valid_ajout_ligne_bordereau==1){

  $anneeBordControle = explode("-", $bordereauEnCours->get_Date_bordereau());
  $anneeIndControle = explode("-", $date_frais);

  if($anneeBordControle[0]==$anneeIndControle[0]){
    $bordereauDAO->insertLigneFrais($date_frais,$trajet,$km,$peages,$repas,$hebergement,$motif,$bordereauEnCours->get_ID_bordereau());
    redirige('principal.php');
  }
  echo ('<div data-role="window" data-title="Window title" data-shadow="true" class="p-2">
           L\'année d\'une ligne de frais doit correspondre à l\'année du bordereau.
        </div>');
}*/
?>
 <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
       action="#"
       method="POST">

         <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
         <h2 class="text-light">Ajout d'une ligne de frais</h2>
         <hr class="thin mt-4 mb-4 bg-white">

             <div class="form-group">
                 <input type="text" name="date_frais" data-role="calendarpicker" data-year="false" data-locale="fr-FR">
             </div>

             <div class="form-group">
               <label>Motif:</label>
               <select data-role="select" class="mon-select2" data-validate="required not=-1" name="motif" size=1>
             	<option value="-1" class="d-none"></option>
               <?php
                  //affiche le res de la requete select tout les club dans liste deroulante
                  foreach($Motifs as $Motif){
                    echo('<option value="'.$Motif->get_IdMotif().'">'.$Motif->get_Libelle().'</option>');
                  }
               ?>
             	</select>
             </div>

             <div class="form-group">
                 <input type="text" name="trajet" data-prepend="<span class='mif-envelop'>" placeholder="Saisir trajet">
             </div>

             <div class="form-group">
                 <input type="text" name="KM" data-prepend="<span class='mif-envelop'>" placeholder="Saisir KM">
             </div>

             <div class="form-group">
                 <input type="text" name="peages" data-prepend="<span class='mif-envelop'>" placeholder="Saisir peages">
             </div>

             <div class="form-group">
                 <input type="text" name="repas" data-prepend="<span class='mif-envelop'>" placeholder="Saisir repas">
             </div>

             <div class="form-group">
                 <input type="text" name="hebergement" data-prepend="<span class='mif-envelop'>" placeholder="saisir hebergement">
             </div>
             <div class="form-group">
             <button id="test_form" name="valid_ajout_ligne_bordereau" value="1" class="button">Ajout d'une ligne</button><br/>
             </div>
     </form>
