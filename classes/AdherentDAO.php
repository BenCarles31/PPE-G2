<?php
Class AdherentDAO extends DAO {

  function find($idAdherent){
    $sql = "select * from adherent where num_license=:idAdherent";
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

  function findAllAdherentbyResp($idResp){
    $sql = "select * from adherent where id_user = :idResp";
    $params = array(":idResp" => $idResp);
    $sth = $this->executer($sql,$params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Adherent($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }


    function findlibClubbyAdherent($idAdherent){
      $sql = "Select nom_club from club c, adherent a where a.ID_club = c.ID_club and a.num_license = :idAdherent";
      $params = array(":idAdherent" => $idAdherent);
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

    function deleteAdherent($license){
      $sql = "delete from adherent where num_license = :license";

      $params = array(':license'=>$license);
      $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
      $nb = $sth->rowcount();
      return $nb; // Retourne le nombre de mise à jour
    }

    function updateAdherent($nom,$prenom,$sexe,$date_naissance,$id_club,$idResp,$license){
      $sql="update `adherent` SET   `nom`=:nom,
                                    `prenom`=:prenom,
                                    `sexe`=:sexe,
                                    `date_naissance`=:date_naiss,
                                    `ID_club`=:club
                              WHERE `id_user`=:idResp
                              AND   `num_license`=:license";
      $params = array(
        ':nom'=>$nom,
        ':prenom'=>$prenom,
        ':sexe'=>$sexe,
        ':date_naiss'=>$date_naissance,
        ':club'=>$id_club,
        ':idResp'=>$idResp,
        ':license'=>$license

      );
      $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
      $nb = $sth->rowcount();
      return $nb; // Retourne le nombre de mise à jour
    }


}
