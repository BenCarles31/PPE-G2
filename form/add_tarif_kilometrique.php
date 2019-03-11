<?php
//recup formulaire
$valid_ajout_tarif = isset($_POST['valid_ajout_tarif']) ? $_POST['valid_ajout_tarif'] : '0';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$tarif = isset($_POST['tarif']) ? $_POST['tarif'] : '';

if($valid_ajout_tarif==1){
  $indemniteDAO->insertTarif($date,$tarif);
  redirige('principal.php');
}
?>

<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Ajout du tarif kilometrique</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
            <input type="text" data-role="calendarpicker" name="date" data-prepend="<span class='mif-envelop'>" placeholder="Saisir année">
        </div>
        <div class="form-group">
            <input type="text" name="tarif" data-prepend="<span class='mif-envelop'>" placeholder="Saisir tarif kilométrique">
        </div>
        <div class="form-group">
        <button id="test_form" name="valid_ajout_tarif" value="1" class="button success">Ajout d'un tarif pour l'année</button><br/>
        </div>
</form>
