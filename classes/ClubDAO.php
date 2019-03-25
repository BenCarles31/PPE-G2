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

  function findClubCascadingRespAndAdherent($idresp){
    $sql = "select DISTINCT(c.ID_club), `nom_club`, `adresse_club`, `cp`, `ville`, `sigle`, `nom_president`, `ID_ligue`
            from club c, adherent a
            where c.ID_club = a.ID_club
            and a.id_user in (select id_user from utilisateur where id_user =:idResp)";
    $params = array(":idResp" => $idresp);
    $sth = $this->executer($sql, $params);
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
