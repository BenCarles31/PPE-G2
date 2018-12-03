<?php
//1 correspond au type responsable
$typeResponsable=1;
//recup formulaire inscription
$valid_inscription = isset($_POST['valid_inscrit']) ? $_POST['valid_inscrit'] : '0';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$adresse = isset($_POST['rue']) ? $_POST['rue'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$mdp1 = isset($_POST['mdp1']) ? $_POST['mdp1'] : '';
$mdp2 = isset($_POST['mdp2']) ? $_POST['mdp2'] : '';

if($valid_inscription==1){
  if($mdp1==$mdp2){
    $verif_dispo = $responsableDAO->findAdherentByEmailPass($mail, $mdp1);

      //hashage du mot de passe avec l'algo: sha256
      //$mdp1 =  hash('sha256',$mdp1);

    if(count($verif_dispo)>0){
      $generalDAO->register($nom,$prenom,$mail,$adresse,$cp,$ville,$mdp1,$typeResponsable);
      header('Location: index.php');
    }
  }
}
 ?>
<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">

      <div class="form-group">
          <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir nom" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir prenom" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="mail" data-prepend="<span class='mif-envelop'>" placeholder="Saisir email" data-validate="required email">
      </div>

      <div class="form-group">
          <input type="text" name="adresse" data-prepend="<span class='mif-envelop'>" placeholder="Saisir adresse" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="cp" data-prepend="<span class='mif-envelop'>" placeholder="Saisir code postal" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="ville" data-prepend="<span class='mif-envelop'>" placeholder="Saisir ville" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="mdp1" data-prepend="<span class='mif-envelop'>" placeholder="Saisir mdp" data-validate="required">
      </div>

      <div class="form-group">
          <input type="text" name="mdp2" data-prepend="<span class='mif-envelop'>" placeholder="Confirmer  mdp" data-validate="required">
      </div>
      <div class="form-group">
      <button id="test_form" class="button success" name="valid_inscrit" value="1">S'inscrire</button><br/>
      </div>
</form>
