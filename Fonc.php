<?php
/*******************************************************************************/
      //fonction de connexion à la BD
      //serv: $user = "admin"; $pass = 'FilmBulle20m';
      //local: $user = "root"; $pass = '';
/*******************************************************************************/
function db_connect() {
    //paramètre de connexion
    $dsn = 'mysql:host=localhost;dbname=fredi';
    $user = "root";
    $pass = '';

    //requete de connexion à la BD
    try{
        $con = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND
        => "SET NAMES utf8"));
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $ex) {
        die("Erreur lors de la connexion à la BD : ".$ex->getMessage());
    }
}

/*******************************************************************************/
      //fonction hashage de mot de passe
/*******************************************************************************/
function mdp_hash($mdp){
  //hashage du mot de passe avec l'algo: sha256
  $mdph =  hash('sha256',$mdp);
  return $mdph;
}

/*******************************************************************************/
      //fonction inscription
/*******************************************************************************/
function register($nom,$prenom,$mail,$adresse,$cp,$ville,$mdp,$type,$con){
    $sql = 'INSERT INTO utilisateur VALUES ("",:nom,:prenom,:rue,:cp,:ville,:email,:mdp,:type_user);';

      //execution de la requete
      try {
          $sth = $con->prepare($sql);
          $sth->execute(array(':nom'=>$nom,
                              ':prenom'=>$prenom,
                              ':email'=>$mail,
                              ':rue'=>$adresse,
                              ':cp'=>$cp,
                              ':ville'=>$ville,
                              ':mdp'=>$mdp,
                              ':type_user'=>$type));
        } catch (PDOException $ex) {
          die("Erreur lors de la requête SQL d'inscription: " . $ex->getMessage());
        }
    }

/*******************************************************************************/
     //fonction verif si profiol existe
/*******************************************************************************/
function select_utilisateur($nom,$prenom,$con){
  $sql ='SELECT * FROM utilisateur WHERE nom=:nom AND prenom=:prenom';

  //execution de la requete
  try {
      $sth = $con->prepare($sql);
      $sth->execute(array(':nom' => $nom,
                          ':prenom' => $prenom));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
}

/*******************************************************************************/
     //fonction select tout les clubs
/*******************************************************************************/
function select_club($con){
  $sql ='SELECT * FROM club';

  //execution de la requete
  try {
      $sth = $con->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $rows;

  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
}

/*******************************************************************************/
     //fonction select tout les motifs
/*******************************************************************************/
function select_motif($con){
  $sql ='SELECT * FROM motif';

  //execution de la requete
  try {
      $sth = $con->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $rows;

  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
}

/*******************************************************************************/
     //fonction select tout les indemnite
/*******************************************************************************/
function select_indemnite($con){
  $sql ='SELECT * FROM indemnite';

  //execution de la requete
  try {
      $sth = $con->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $rows;

  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
}

/*******************************************************************************/
     //fonction verif login adherent
/*******************************************************************************/
function verif_login_adherent($identifiant,$mdp,$con){
  $sql ='SELECT * FROM adherent WHERE email=:identifiant AND mdp=:pass';

  //execution de la requete
  try {
      $sth = $con->prepare($sql);
      $sth->execute(array(':identifiant' => $identifiant,
                          ':pass' => $mdp));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
  } catch (PDOException $ex) {
      die("Erreur lors de la requête SQL : " . $ex->getMessage());
  }
}

function aff_tbody_form_modif_suppr($nom1,$nom2,$valeur1,$nom_sub1,$nom_sub2){
  echo('<td><form action="#" method="POST">
              <input type="hidden" name='.$nom1.' value='.$valeur1.'>
              <input type="hidden" name='.$nom_sub1.' value="1">
              <button class="button success" onclick="Metro.dialog.open(\'#W_ajout_ligne_bordereau\')">Modifier</button>

              <input type="hidden" name='.$nom2.' value='.$valeur1.'>
              <input type="hidden" name='.$nom_sub2.' value="1">
              <input type="submit" class="button alert" value="Supprimer">
            </form>
       </td>');
}




?>
