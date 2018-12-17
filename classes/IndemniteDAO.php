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

  function findDateIndemnite($anne){
    $sql = "select * from indemnite where annee=:idannee";
    $params = array(":idannee" => $anne);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $indemnite = new Indemnite($row);
    } else {
      $indemnite = new Indemnite();
    }
    // Retourne l'objet métier
    return $indemnite;
  }

}
