<?php
$validLogin = isset($_POST['validLogin']) ? $_POST['validLogin'] : '0';
$email = isset($_POST['identifiant']) ? $_POST['identifiant'] : '???';
$pass = isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '???';

$adherentConnected = null;

if($validLogin==1){
  $adherentConnected = $responsableDAO->findAdherentByEmailPass($email, $pass);
  if($adherentConnected->get_email()!='???'){
    $_SESSION['idUser'] = $adherentConnected->get_id_user();
    $_SESSION['typeUser'] = $adherentConnected->get_ID_type();
    header('Location: principal.php');
  }else{
    header('Location: index.php');
  }
}
?>
<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
      action="#"
      method="POST">

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Connexion</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
            <input type="text" name="identifiant" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Entrer votre email" data-validate="required">
        </div>

        <div class="form-group">
            <input type="password" name="motdepasse" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Entrer votre mdp" data-validate="required">
        </div>

        <div class="form-group mt-10">
            <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
            <button id="test_form" class="button success" name="validLogin" value="1">Valider</button>
        </div>
</form>
