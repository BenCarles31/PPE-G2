<?php
  //recuperation des club dans la base pour la liste deroulante (pb 2 entrees BDD DAO, fonc)
  $rows=select_club($con);
  foreach($rows as $row){
   $club[$row['ID_club']] = $row['nom_club'];
  }

  //recup formulaire inscription
  $valid_ajout_adherent = isset($_POST['valid_ajout_adherent']) ? $_POST['valid_ajout_adherent'] : '0';
  $date_naiss = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '';
  $num_license = isset($_POST['num_license']) ? $_POST['num_license'] : '';
  $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
  $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
  $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
  $ajout_club = isset($_POST['club']) ? $_POST['club'] : '';

  //recreer un objet avec id recup precedement (a mon avis useless peu utiliser var session creer a la connexion direct)
  $utilisateur_connecter = $utilisateur->find($_SESSION['id_user']);

  //verifie que le formulaire a bien etait envoye
  if($valid_ajout_adherent == 1){
    //ajoute un adherent
    $utilisateur->insert_new_adherent($num_license,$nom,$prenom,$sexe,$date_naiss,$ajout_club,$utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());
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
              	<option value="Masculin">Masculin</option>
                <option value="Feminin">Feminin</option>
                <option value="Non-binaire">Non-binaire</option>
            	</select>
            </div>

            <div class="form-group">
              <label>Club:</label>
              <select data-role="select" data-validate="required not=-1" name="club" size=1>
            	<option value="-1" class="d-none"></option>
              <?php
                 //affiche le res de la requete select tout les club dans liste deroulante
                 foreach($club as $cle=>$valeur){
                   echo('<option value="'.$cle.'">'.$valeur.'</option>');
                 }
              ?>
            	</select>
            </div>

            <div class="form-group">
              <button id="test_form" name="valid_ajout_adherent" value="1" class="button">Ajouter un adherent</button><br/>
            </div>
    </form>
