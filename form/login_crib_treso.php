<?php
//recup formulaire inscription
$valid_login_CRIB_treso= isset($_POST['valid_login_CRIB_treso']) ? $_POST['valid_login_CRIB_treso'] : '0';
$identifiant_CRIB_treso = isset($_POST['identifiant_CRIB_treso']) ? $_POST['identifiant_CRIB_treso'] : '';
$pass_CRIB_treso = isset($_POST['motdepasse_CRIB_treso']) ? $_POST['motdepasse_CRIB_treso'] : '';

$verif_identifiant=0;
$verif_pass=0;

if($valid_login_CRIB_treso==1){
    //verif si identifaint et mdp ne sont pas vide
    if(!empty($identifiant_CRIB_treso) && !empty($pass_CRIB_treso)){
    
    //connexion BDD
    $con=db_connect();

    //Hashage du mdp, mis en com pour tester (mdp de test pas hasher)
    //$pass_CRIB_treso=mdp_hash($pass_CRIB_treso);
    
    //enleve caractere chariot
    /*$pass_CRIB_treso = str_replace('\r\n', '', $pass_CRIB_treso);
    $pass_CRIB_treso = str_replace('\r', '', $pass_CRIB_treso);
    $pass_CRIB_treso = str_replace('\n', '', $pass_CRIB_treso);*/

    //cherche dans bd l'id et mdp correspondant a ceux du formulaire
    $rows=verif_login_crib_treso($identifiant_CRIB_treso,$pass_CRIB_treso,$con);
    
    //Si le resultat est sup a 0 (correspondance trouve)
    if(count($rows)>0){

        foreach($rows as $row){
            $verif_identifiant=$row['mail'];
            $verif_pass=$row['mdp'];
            $id_user=$row['id_admin'];
        }
        //verifie si les id et mdp du formulaire correspondent bien a ceux entres dans le formulaire
        if($identifiant_CRIB_treso==$verif_identifiant && $pass_CRIB_treso==$verif_pass){

            $_SESSION['identifiant'] = $identifiant_CRIB_treso;
            $_SESSION['id_admin'] = $id_user;
            $_SESSION['type'] = 'CRIB_treso';
            //rediriection
            header('Location: principal.php');
        }
    }
    }else{
    //Sinon redirige vers index
    echo('<p>La tuile</p)>');
    header('Location: index.php');
    }
    $valid_login_CRIB_treso=0;
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
        <h2 class="text-light">Connexion CRIB/Tresorier</h2>
        <hr class="thin mt-4 mb-4 bg-white">

        <div class="form-group">
            <input type="text" name="identifiant_CRIB_treso" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Enter your email..." data-validate="required email">
        </div>

        <div class="form-group">
            <input type="password" name="motdepasse_CRIB_treso" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Enter your password..." data-validate="required minlength=6">
        </div>

        <div class="form-group mt-10">
            <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
            <button id="test_form" name="valid_login_CRIB_treso" value="1" class="button">Valider</button>
        </div>
    </form>