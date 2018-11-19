<?php
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

$verif_identifiant=0;
$verif_pass=0;
$user_connected = 0;

//est egal a 1 si le formulaire est envoye
if($valid_login_adherent==1){

    //verif si identifaint et mdp ne sont pas vide
    if(!empty($identifiant_adherent) && !empty($pass_adherent)){

    /*enleve pour teste connexion version hasher
    //Hashage du mdp
    $pass_adherent=mdp_hash($pass_adherent);

    //enleve caractere chariot
    $pass_adherent = str_replace('\r\n', '', $pass_adherent);
    $pass_adherent = str_replace('\r', '', $pass_adherent);
    $pass_adherent = str_replace('\n', '', $pass_adherent);*/

    $user_connected = $user->search_user_connected($identifiant_adherent,$pass_adherent);

    $_SESSION['id_user']  = $user_connected->get_id_user();
    //pas utile pour l'instant
    /*$_SESSION['prenom']  = $user_connected->get_prenom();
    $_SESSION['rue']  = $user_connected->get_rue();
    $_SESSION['cp']  = $user_connected->get_cp();
    $_SESSION['ville']  = $user_connected->get_ville();
    $_SESSION['email']  = $user_connected->get_email();*/
    $_SESSION['type_user']  = $user_connected->get_ID_type();

    header('Location: principal.php');
    }else{
    //Sinon redirige vers index
    header('Location: index.php');
  }
    //remet la valeur a 0;
    $valid_login_adherent=0;
}
?>
<form class="login-form bg-white p-6 mx-auto border bd-default win-shadow"
            data-role="validator"
            action="#"
            method="POST"
            data-clear-invalid="2000"
            data-on-error-form="invalidForm"
            data-on-validate-form="validateForm">
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37

        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Connexion Adherent</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
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
        </div>

        <div class="form-group mt-10">
            <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
<<<<<<< HEAD
            <button id="test_form" class="button success" name="validLoginAdherent" value="1">Valider</button>
        </div>
</form>
=======
            <button id="test_form" name="valid_login_adherent" value="1" class="button">Valider</button>
        </div>
    </form>
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
