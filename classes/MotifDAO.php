<?php
Class MotifDAO extends DAO {

  function findAll(){
    $sql = "select * from motif";
    $sth = $this->executer($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new Motif($row);
    }
    // Retourne un tableau d\'objet métier
    return $tableau;
  }

  function findMotifByIdMotif($idMotif){
    $sql = "select * from motif where idMotif=:idMotif";
    $params = array(":idMotif" => $idMotif);
    $sth = $this->executer($sql, $params);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if ($row !==FALSE) {
      $motif = new Motif($row);
    } else {
      $motif = new Motif();
    }
    // Retourne l'objet métier
    return $motif;
  }

  function addMotif($libelle){
    $nb=null;
    $sql = "insert into motif values ('',:libelle);";
    $params = array(':libelle'=>$libelle);
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

  function updateMotif($libelle,$idMotif){
    $sql="update `motif` SET  `libelle`=:libelle_motif
                         WHERE idMotif=:id_motif";
    $params = array(':libelle_motif'=>$libelle,
                    ':id_motif'=>$idMotif);
    $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
    $nb = $sth->rowcount();
    return $nb; // Retourne le nombre de mise à jour
  }

}
