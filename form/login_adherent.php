<?php
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
//recup formulaire inscription
$valid_login_adherent= isset($_POST['valid_login_adherent']) ? $_POST['valid_login_adherent'] : '0';
$identifiant_adherent = isset($_POST['identifiant_adherent']) ? $_POST['identifiant_adherent'] : '';
$pass_adherent = isset($_POST['motdepasse_adherent']) ? $_POST['motdepasse_adherent'] : '';
=======
$validLogin = isset($_POST['validLoginAdherent']) ? $_POST['validLoginAdherent'] : '0';
$email = isset($_POST['identifiantAdherent']) ? $_POST['identifiantAdherent'] : '???';
$pass = isset($_POST['motdepasseAdherent']) ? $_POST['motdepasseAdherent'] : '???';
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf

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
<<<<<<< HEAD
            data-role="validator"
            action="#"
            method="POST"
            data-clear-invalid="2000"
            data-on-error-form="invalidForm"
            data-on-validate-form="validateForm">
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
      action="#"
      method="POST">
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Connexion Adherent</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
<<<<<<< HEAD
<<<<<<< HEAD
            <input type="text" name="identifiantAdherent" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Entrer votre email" data-validate="required">
        </div>

        <div class="form-group">
            <input type="password" name="motdepasseAdherent" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Entrer votre mdp" data-validate="required">
=======
            <input type="text" name="identifiant_adherent" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Enter your email..." data-validate="required email">
        </div>

        <div class="form-group">
            <input type="password" name="motdepasse_adherent" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..." data-validate="required minlength=6">
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
            <input type="text" name="identifiantAdherent" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Entrer votre email" data-validate="required">
        </div>

        <div class="form-group">
            <input type="password" name="motdepasseAdherent" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Entrer votre mdp" data-validate="required">
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf
        </div>

        <div class="form-group mt-10">
            <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
<<<<<<< HEAD
<<<<<<< HEAD
            <button id="test_form" class="button success" name="validLoginAdherent" value="1">Valider</button>
        </div>
</form>
=======
            <button id="test_form" name="valid_login_adherent" value="1" class="button">Valider</button>
        </div>
    </form>
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
            <button id="test_form" class="button success" name="validLoginAdherent" value="1">Valider</button>
        </div>
</form>
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf
