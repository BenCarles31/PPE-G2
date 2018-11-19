<?php
Class BordereauDAO extends DAO{

  function find($idBordereau){
    $sql = "select * from bordereau where ID_bordereau=:idBordereau";
    $params = array(":idBordereau" => $idBordereau);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $bordereau = new Bordereau($row);
    } else {
      $bordereau = new Bordereau();
    }
    // Retourne l'objet métier
    return $bordereau;
  }

  function findBordByIdUser($idResponsable){
    $sql = "select * from bordereau where id_user=:id";
    $params = array(":id" => $idResponsable);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $bordereau = new Bordereau($row);
    } else {
      $bordereau = new Bordereau();
    }
    // Retourne l'objet métier
    return $bordereau;
  }

  function findLigneFrais($idBordereau){
    $sql = "select * from ligne_frais where ID_bordereau=:idBordereau";
    $params = array(":idBordereau" => $idBordereau);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new LigneFrais($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

}
 ?>
