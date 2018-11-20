<?php
$validLogin = isset($_POST['validLoginAdherent']) ? $_POST['validLoginAdherent'] : '0';
$email = isset($_POST['identifiantAdherent']) ? $_POST['identifiantAdherent'] : '???';
$pass = isset($_POST['motdepasseAdherent']) ? $_POST['motdepasseAdherent'] : '???';
$adherentConnected = 0;

if($validLogin==1){
    $adherentConnected = $responsableDAO->findAdherentByEmailPass($email, $pass);
    if($adherentConnected!=0){
      $_SESSION['idUser'] = $adherentConnected->get_id_user();
      $_SESSION['typeUser'] = $adherentConnected->get_ID_type();
      header('Location: principal.php');
    }
  }
  ?>
  <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
        action="#"
        method="POST">
  
          <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
          <h2 class="text-light">Connexion Trésorié</h2>
          <hr class="thin mt-4 mb-4 bg-white">
  
          <div class="form-group">
              <input type="text" name="identifiantAdherent" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Entrer votre email" data-validate="required">
          </div>
  
          <div class="form-group">
              <input type="password" name="motdepasseAdherent" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Entrer votre mdp" data-validate="required">
          </div>
  
          <div class="form-group mt-10">
              <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
              <button id="test_form" class="button success" name="validLoginAdherent" value="1">Valider</button>
          </div>
  </form>
  