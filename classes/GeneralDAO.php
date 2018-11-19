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

  function findMotifByIdMotif($idMotif){
    $sql = "select * from motif where idMotif=:idMotif";
    $params = array(":idMotif" => $idMotif);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $motif = new Motif($row);
    } else {
      $motif = new Motif();
    }
    // Retourne l'objet métier
    return $motif;
  }







}
