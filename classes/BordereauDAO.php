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

  function findBordByIdUser($idResponsable,$idStatut){
    $sql = "select * from bordereau where id_user=:id and id_statut =:statut";
    $params = array(":id" => $idResponsable,
                    ":statut" => $idStatut);
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

  function findBordByStatut($idStatut){
    $sql = "select * from bordereau where id_statut =:statut";
    $params = array(":statut" => $idStatut);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Bordereau($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function findAllBord(){
    $sql = "select * from bordereau";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Bordereau($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function findAllBordByUser($idUser){
    $sql = "select * from bordereau where id_user =:user";
    $params = array(":user" => $idUser);
    $sth = $this->executer($sql,$params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Bordereau($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
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

  function findLigneFraisByClub($idclub){
    $sql = "select * from ligne_frais where ID_club=:club";
    $params = array(":club" => $idclub);
    $sth = $this->executer($sql, $params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new LigneFrais($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function findUneLigne($idligne){
    $sql = "select * from ligne_frais where id_ligne=:idLigne";
    $params = array(":idLigne" => $idligne);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $ligne = new LigneFrais($row);
    } else {
      $ligne = new LigneFrais();
    }
    // Retourne l'objet métier
    return $ligne;
  }

  function update($idligne,$date,$trajet,$km,$peages,$repas,$hebergement,$motif,$idClub){
    $sql="update `ligne_frais` SET  `date_frais`=:date,
                                    `trajet`=:trajet,
                                    `KM`=:km,
                                    `cout_peages`=:cout_peages,
                                    `cout_repas`=:cout_repas,
                                    `cout_hebergement`=:cout_hebergement,
                                    `idMotif`=:id_motif,
                                    `ID_club`=:club
          WHERE id_ligne=:idLigne";
    $params = array(
      ':date'=>$date,
      ':trajet'=>$trajet,
      ':km'=>$km,
      ':cout_peages'=>$peages,
      ':cout_repas'=>$repas,
      ':cout_hebergement'=>$hebergement,
      ':id_motif'=>$motif,
      ':idLigne'=>$idligne,
      ':club'=>$idClub
    );
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

  function findDateBordereau($idBordereau){
    $sql = "select YEAR(date_bordereau) from bordereau where ID_bordereau=:idBord";
    $params = array(":idBord" => $idBordereau);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $dateBord = $row['YEAR(date_bordereau)'];
    return $dateBord;
  }

  function updateStatutBordereau($statut,$bordereau){
    $sql="update `bordereau` SET  `id_statut`=:statut
                             WHERE ID_bordereau=:bordereau";
    $params = array(':statut'=>$statut,
                    ':bordereau'=>$bordereau);
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour

  }

  function insertLigneFrais($date,$trajet,$km,$peages,$repas,$hebergement,$motif,$idBordereau,$clubAdherent){
    $nb=null;
    $sql = "insert into ligne_frais (`id_ligne`, `date_frais`, `trajet`, `KM`, `cout_peages`, `cout_repas`, `cout_hebergement`, `idMotif`, `ID_bordereau`, `ID_club`) values ('',:date,:trajet,:km,:cout_peages,:cout_repas,:cout_hebergement,:id_motif,:id_bordereau,:club_adherent);";
    $params = array(
      ':date'=>$date,
      ':trajet'=>$trajet,
      ':km'=>$km,
      ':cout_peages'=>$peages,
      ':cout_repas'=>$repas,
      ':cout_hebergement'=>$hebergement,
      ':id_motif'=>$motif,
      ':id_bordereau'=>$idBordereau,
      ':club_adherent'=>$clubAdherent
    );
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

  function deleteLigne($idLigne){
    $sql = "delete from ligne_frais where id_ligne= :idLigne";

    $params = array(':idLigne'=>$idLigne);
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

  function creation_bordereau($date,$id_user,$user_type,$statut) {
  $nb = null;
  //vérifie le type de l'utilisateur
  if($user_type == 1){
    $sql = "insert into bordereau values ('',:date,:id_user,:statut);";
    $params = array(
      ':date'=>$date,
      ':id_user'=>$id_user,
      ':statut'=>$statut);
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
  }
  return $nb; // Retourne le nombre de mise à jour
} // insert()


function findBordByuserStatut($iduser,$idStatut){
  $sql = "select * from bordereau where id_statut =:statut and id_user = :iduser";
  $params = array(":statut" => $idStatut,
                    ":iduser" => $iduser);
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





}
 ?>
