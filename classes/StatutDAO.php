<?php
Class StatutDAO extends DAO {

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

  function findByLibelle($libelle){
    $sql = "select * from statut where libelle=:lib_statut";
    $params = array(":lib_statut" => $libelle);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $statut = new Statut($row);
    } else {
      $statut = new Statut();
    }
    // Retourne l'objet métier
    return $statut;
  }








}
