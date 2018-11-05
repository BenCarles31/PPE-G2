<?php
session_start();
include "Fonc.php";
include 'classes/DAO.php';
include 'classes/UtilisateurDAO.php';
include 'classes/Utilisateur.php';
//connexion pour requete affichage dans formulaire pb 2 entree dans la base
$con=db_connect();
$utilisateur = new UtilisateurDAO();

//par defaut pour tester
$type_user = 1;

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

if($valid_inscription == 1){

    //verifie que les 2 mdp sont identiques
    if($mdp1 == $mdp2){
        //cherche si l'utilisateur existe deja (completer la requete pour plus precision ex: email, date_naiss...)
        $rows=$utilisateur->if_user_exist($nom,$prenom);

        //si user n'existe pas deja
        if(count($rows)>0){
            //hasshage du mdp
            $mdp=mdp_hash($mdp1);
            //requete d'insertion de l'user dans la BDD
            $utilisateur->register($nom,$prenom,$mail,$adresse,$cp,$ville,$mdp,$type_user,$con);
            //redirige vers index
            header('Location: index.php');
        }else{
            echo('Ce profil existe deja</br>');
        }
    }else{
        echo('Les mdp doivent etre identique</br>');
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

            <div class="form-group">
                <input type="text" name="nom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir nom" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="prenom" data-prepend="<span class='mif-envelop'>" placeholder="Saisir prenom" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" name="sexe"  data-prepend="<span class='mif-envelop'>" placeholder="Saisir sexe" data-validate="required">
            </div>

            <div class="form-group">
                <input type="text" data-role="calendarpicker" name="naissance" data-year="false" data-locale="fr-FR">
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
            <button id="test_form" name="valid_inscrit" value="1" class="button">S'inscrire</button><br/>
            </div>
    </form>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
      <script>
          function invalidForm(){
              var form  = $(this);
              form.addClass("ani-ring");
              setTimeout(function(){
                  form.removeClass("ani-ring");
              }, 1000);
          }
          function validateForm(){
              $(".login-form").animate({
                  opacity: 0
              });
          }
      </script>
            <script language="javascript" type="text/javascript">
      function redirection(test_form) {
        document.getElementById(test_form).submit();
      }
    </script>
    </body>
</html>
