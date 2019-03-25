<?php
Class ClubDAO extends DAO {

  function findAllClub(){
    $sql = "select * from club";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Club($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function find($idClub){
    $sql = "select * from club where id_club=:idClub";
    $params = array(":idClub" => $idClub);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $Club = new Club($row);
    } else {
      $Club = new Club();
    }
    // Retourne l'objet métier
    return $Club;
  }






}
