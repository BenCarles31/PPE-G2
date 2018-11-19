<?php

Class ResponsableDAO extends DAO {

  function find($idResponsable){
    $sql = "select * from utilisateur where id_user=:idUser";
    $params = array(":idUser" => $idResponsable);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $responsable = new Utilisateur($row);
    } else {
      $responsable = new Utilisateur();
    }
    // Retourne l'objet métier
    return $responsable;
  }

  function findAllAdherent() {
    $userType = 1;
    $sql = "select * from utilisateur where ID_type = :type";
    $params = array(":type" => $userType);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Utilisateur($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function findAdherentByEmailPass($email,$pass) {
    $sql = "select * from utilisateur where email =:mail and mdp =:pass";
    $params = array(":mail" => $email,
                    ":pass" => $pass);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if($row!==FALSE){
      $adherent = new Utilisateur($row);
    } else {
      $adherent = new Utilisateur();
    }
    return $adherent;
  }

  function addAdherent($license, $nom, $prenom, $sexe, $date_naiss, $club, $id_user) {
    $sql = "insert into adherent values (:num_license,:nom,:prenom,:sexe,:date_naiss,:id_club,:id_user);";
    $params = array(':num_license'=>$license,
                    ':nom'=>$nom,
                    ':prenom'=>$prenom,
                    ':sexe'=>$sexe,
                    ':date_naiss'=>$date_naiss,
                    ':id_club'=>$club,
                    ':id_user'=>$id_user);
    $sth = $this->executer($sql,$params);
    $nb = $sth->rowcount();
    // Retourne le nombre de mise à jour
    return $nb;
  }





}
