<?php
Class IndemniteDAO extends DAO {

  function findAll(){
    $sql = "select * from indemnite";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Indemnite($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }
  
}
