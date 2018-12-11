<?php
Class AdherentDAO extends DAO {

  function find($idAdherent){
    $sql = "select * from utilisateur where num_license=:idAdherent";
    $params = array(":idAdherent" => $idAdherent);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $Adherent = new Adherent($row);
    } else {
      $Adherent = new Adherent();
    }
    // Retourne l'objet métier
    return $Adherent;
  }

  function findAllAdherent(){
    $sql = "select * from adherent";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Adherent($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }


    function findClubbyAdherent($idAdherent){
      $sql = "select * from club where num_license = (select u.id_user from utilisateur u, bordereau b where b.id_user = u.id_user and ID_bordereau=:idBordereau)";
      $params = array(":idBordereau" => $idBordereau);
      $sth = $this->executer($sql, $params);
      $row = $sth->fetch(PDO::FETCH_ASSOC);
      if ($row !==FALSE) {
        $club = new Club($row);
      } else {
        $club = new Club();
      }
      // Retourne l'objet métier
      return $club;
    }


}
