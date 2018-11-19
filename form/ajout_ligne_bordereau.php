<?php
//recuperation des motifs dans la base pour la liste deroulante (pb 2 entrees BDD DAO, fonc)
$rows=select_motif($con);
foreach($rows as $row){
 $tabmotif[$row['idMotif']] = $row['libelle'];
}
//recup en cas de modification (suppr puis insert)
$valid_modification = isset($_POST['modifier']) ? $_POST['modifier'] : '0';
$id_ligne_modifier = isset($_POST['ligne_modifier']) ? $_POST['ligne_modifier'] : '';

if($valid_modification==1){
  $utilisateur->delete_ligne_frais($id_ligne_modifier,$utilisateur_connecter->get_ID_type());
}

//recup formulaire
$valid_ajout_ligne_bordereau = isset($_POST['valid_ajout_ligne_bordereau']) ? $_POST['valid_ajout_ligne_bordereau'] : '0';
$date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : '';
$motif = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet = isset($_POST['trajet']) ? $_POST['trajet'] : 'null';
$km = isset($_POST['KM']) ? $_POST['KM'] : 'null';
$peages = isset($_POST['peages']) ? $_POST['peages'] : 'null';
$repas = isset($_POST['repas']) ? $_POST['repas'] : 'null';
$hebergement = isset($_POST['hebergement']) ? $_POST['hebergement'] : 'null';

if($valid_ajout_ligne_bordereau==1){
  echo '</br></br><p>'.$motif.'</p></br></br>';
  $bord_en_cours=$utilisateur->search_bordereau_encours($utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());

  //rajouter condition sur l'annee
  foreach($bord_en_cours as $bord_en_cour){
    $id_bord_encours = $bord_en_cour['ID_bordereau'];
  }

  $utilisateur->insert_ligne_frais($date_frais,$trajet,$km,$peages,$repas,$hebergement,$motif,$id_bord_encours,$utilisateur_connecter->get_ID_type());

}


?>
<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
            data-role="validator"
            action="#"
            method="POST"
            data-clear-invalid="2000"
            data-on-error-form="invalidForm"
            data-on-validate-form="validateForm">

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Ajout de ligne bordereau</h2>
        <hr class="thin mt-4 mb-4 bg-white">

            <div class="form-group">
                <input type="text" name="date_frais" data-role="calendarpicker" data-year="false" data-locale="fr-FR">
            </div>

            <div class="form-group">
              <label>Motif:</label>
              <select data-role="select" data-validate="required not=-1" name="motif" size=1>
            	<option value="-1" class="d-none"></option>
              <?php
                 //affiche le res de la requete select tout les club dans liste deroulante
                 foreach($tabmotif as $cle=>$valeur){
                   echo('<option value="'.$cle.'">'.$valeur.'</option>');
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
