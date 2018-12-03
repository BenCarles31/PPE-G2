<?php
$valid_creation_bordereau = isset($_POST['valid_creation_bordereau']) ? $_POST['valid_creation_bordereau'] : '0';
if($valid_creation_bordereau==1){
  $bord_encours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
  $nb_bord=0;
  foreach($bord_encours as $bord_encour){
    $nb_bord++;
  }

  echo '<p>'.$nb_bord.'</p>';

  if($nb_bord==0){
    $date_courant = Date('Y-m-d');
    echo $date_courant;
    $bordereauDAO->creation_bordereau($date_courant,$userConnecte->get_id_user(),$userConnecte->get_ID_type());
    echo '<p>Sa a peut etre marche, ou pas</p>';
  }else{
    echo '<p>La tuile creation</p>';
  }
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
        <h2 class="text-light">Création du bordereau</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
          <button id="test_form" name="valid_creation_bordereau" value="1" class="button">Creation du bordereau</button><br/>
        </div>

        <div class="form-group">
          <a href='#'>Retour</a><br/>
        </div>
    </form>
