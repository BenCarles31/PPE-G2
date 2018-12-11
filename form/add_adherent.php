<?php
  //recuperation des club dans la base pour la liste deroulante (pb 2 entrees BDD DAO, fonc)
   $clubs = $clubDAO->findAllClub();

  //recup formulaire inscription
  $valid_ajout_adherent = isset($_POST['valid_ajout_adherent']) ? $_POST['valid_ajout_adherent'] : '0';
  $date_naiss = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '';
  $num_license = isset($_POST['num_license']) ? $_POST['num_license'] : '';
  $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
  $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
  $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
  $ajout_club = isset($_POST['club']) ? $_POST['club'] : '';

  if($valid_ajout_adherent==1){
    $responsableDAO->addAdherent($num_license,$nom,$prenom,$sexe,$date_naiss,$ajout_club,$userConnecte->get_id_user());
    header('Location: principal.php');
  }
?>
<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Ajouter un adherent</h2>
        <hr class="thin mt-4 mb-4 bg-white">

            <div class="form-group">
                <input type="text" name="date_naissance" data-role="calendarpicker" data-year="false" data-locale="fr-FR">
            </div>

            <div class="form-group">
                <input type="text" name="num_license" data-prepend="<span class='mif-envelop'>" placeholder="Saisir numero de license" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir le nom" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir le prenom" data-validate="required">
            </div>

            <div class="form-group">
              <label>Sexe:</label>
            	<select data-role="select" name="sexe" size=3>
              	<option value="1">Masculin</option>
                <option value="2">Feminin</option>
                <option value="3">Non-binaire</option>
            	</select>
            </div>

            <div class="form-group">
              <label>Club:</label>
              <select data-role="select" data-validate="required not=-1" name="club" size=1>
            	<option value="-1" class="d-none"></option>
              <?php
                 //affiche le res de la requete select tout les club dans liste deroulante
                 foreach($clubs as $club){
                   echo('<option value="'.$club->get_ID_club().'">'.$club->get_Nom_club().'</option>');
                 }
              ?>
            	</select>
            </div>

            <div class="form-group">
              <button id="test_form" name="valid_ajout_adherent" value="1" class="button">Ajouter un adherent</button><br/>
            </div>
    </form>
