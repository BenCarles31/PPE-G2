<?php
Class GeneralDAO extends DAO {

  function register($nom,$prenom,$mail,$adresse,$cp,$ville,$mdp,$type){
    $sql = 'insert into utilisateur VALUES ("",:nom,:prenom,:rue,:cp,:ville,:email,:mdp,:type_user);';
    $params = array(':nom'=>$nom,
                          ':prenom'=>$prenom,
                          ':email'=>$mail,
                          ':rue'=>$adresse,
                          ':cp'=>$cp,
                          ':ville'=>$ville,
                          ':mdp'=>$mdp,
                          ':type_user'=>$type);
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
  }

  function findAllClub(){
    $sql = "select * from club";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
  }

  function findAllStatut(){
    $sql = "select * from statut";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Statut($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }








}
