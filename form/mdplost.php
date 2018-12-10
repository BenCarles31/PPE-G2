<?php
$mail = isset($_POST['mail']) ? $_POST['mail'] : '!!';
$mail1 = isset($_POST['mail1']) ? $_POST['mail1'] : '??';
$valider = isset($_POST['valider']) ? $_POST['valider'] : '0';
$valid_modif = isset($_POST['valid_modif']) ? $_POST['valid_modif'] : '0';
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '???';

$verif_bdd = $responsableDAO->findAdherentByEmailPass($mail,$mdp);
$mail2 = $verif_bdd->get_email();   //test

echo ($mail2);  //affichage test

  if($valider == 0  ){
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

}
  if($mail==$verif_bdd->get_email()){
  ?>
  <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
    action="#"
    method="POST">
   <div class="form-group">
        <input type="text" name="mdp" data-prepend="<span class='mif-envelop'>" placeholder="Saisir nouveau mdp" data-validate="required">
        <input type="hidden" name="mail1" value="<?php $verif_bdd->get_email();?>">
    </div>
    <div class="form-group">
    <button id="test_form" class="button success" name="valid_modif" value="1">Modification</button><br/>


    <p>je suis la </p>

    <?php echo ($verif_bdd->get_email());  //Test
    $mail2 = $verif_bdd->get_email();?>



    </div>
</form>
<?php
}

   if($valid_modif != 0){

     echo($mail2);
     echo ('lol');          //test condiditon
     echo ($mdp);

          $responsableDAO->updatemdp($mdp,$mail2);
         /* header('Location: index.php');*/
       }
