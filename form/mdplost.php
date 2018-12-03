<?php
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$valider = isset($_POST['valider']) ? $_POST['valider'] : '0';
$valid_modif = isset($_POST['valid_modif']) ? $_POST['valid_modif'] : '0';

$verif_bdd = $responsableDAO->findAdherentByEmail($mail);
?>

<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">
<div class="form-group">
<input type="text" name="mail" data-prepend="<span class='mif-envelop'>" placeholder="Saisir mail" data-validate="required">
</div>
<div class="form-group">
      <button id="test_form" class="button success" name="valider" value="1">Valider</button><br/>
      </div>
</form>

<?php 



  if($mail==$verif_bdd){
    ?>
    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">
     <div class="form-group">
          <input type="text" name="mdp" data-prepend="<span class='mif-envelop'>" placeholder="Saisir nouveau mdp" data-validate="required">
      </div>
      <div class="form-group">
      <button id="test_form" class="button success" name="valid_modif" value="1">Modification</button><br/>
      </div>
</form>
<?php
    }

      if($valid_modif==1){

          $responsableDAO->updatemdp($mdp);
         /* header('Location: index.php');*/
      }





















