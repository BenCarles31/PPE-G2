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




}
