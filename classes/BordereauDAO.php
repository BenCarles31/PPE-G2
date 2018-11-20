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

  function insertLigneFrais($date,$trajet,$km,$peages,$repas,$hebergement,$motif,$idBordereau){
    $nb=null;
    $sql = "insert into ligne_frais values ('',:date,:trajet,:km,:cout_peages,:cout_repas,:cout_hebergement,:id_motif,:id_bordereau);";
    $params = array(
      ':date'=>$date,
      ':trajet'=>$trajet,
      ':km'=>$km,
      ':cout_peages'=>$peages,
      ':cout_repas'=>$repas,
      ':cout_hebergement'=>$hebergement,
      ':id_motif'=>$motif,
      ':id_bordereau'=>$idBordereau
    );
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

}
 ?>
