<?php
class UtilisateurDAO extends DAO {

    function __construct(){
        parent::__construct();
    }

    function search_user_connected($mail,$mdp){
        $sql = "select * from utilisateur where email = :mail and mdp= :pass";

        try {
          $sth = $this->pdo->prepare($sql);
          $sth->execute(array(":mail" => $mail,
                              ":pass" => $mdp));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          throw new Exception("Erreur lors de la requête SQL search_user_connected: " . $e->getMessage());
        }
        $nb = 0;

        foreach ($row as $ligne){
          $nb ++;
        }

        if($nb > 0){
        $user = new Utilisateur($row);
        // Retourne l'objet métier
        $nb = 0;
        return $user;}
      } // function search_user_connected()

      function find($id_user) {
        $sql = "select * from utilisateur where id_user= :id";
        try {
          $sth = $this->pdo->prepare($sql);
          $sth->execute(array(":id" => $id_user));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          throw new Exception("Erreur lors de la requête SQL find utilisateur : " . $e->getMessage());
        }
        $user = new Utilisateur($row);
        // Retourne l'objet métier
        return $user;
      } // function find()

      function insert_new_adherent($license,$nom,$prenom,$sexe,$date_naiss,$club,$id_user,$user_type) {
        $nb = null;
        //vérifie le type de l'utilisateur
        if($user_type == 1){
          $sql = "insert into adherent values (:num_license,:nom,:prenom,:sexe,:date_naiss,:id_club,:id_user);";
          $params = array(
            ':num_license'=>$license,
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':sexe'=>$sexe,
            ':date_naiss'=>$date_naiss,
            ':id_club'=>$club,
            ':id_user'=>$id_user
          );
          $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
          $nb = $sth->rowcount();
        }
        return $nb; // Retourne le nombre de mise à jour
      } // insert()

      function insert_ligne_frais($date,$trajet,$km,$peages,$repas,$hebergement,$motif,$bordereau,$user_type) {
        $nb = null;
        //vérifie le type de l'utilisateur
        if($user_type == 1){
          $sql = "insert into ligne_frais values ('',:date,:trajet,:km,:cout_peages,:cout_repas,:cout_hebergement,:id_motif,:id_bordereau);";
          $params = array(
            ':date'=>$date,
            ':trajet'=>$trajet,
            ':km'=>$km,
            ':cout_peages'=>$peages,
            ':cout_repas'=>$repas,
            ':cout_hebergement'=>$hebergement,
            ':id_motif'=>$motif,
            ':id_bordereau'=>$bordereau
          );
          $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
          $nb = $sth->rowcount();
        }
        return $nb; // Retourne le nombre de mise à jour
      } // insert()

      function creation_bordereau($date,$id_user,$user_type) {
        $nb = null;
        //vérifie le type de l'utilisateur
        if($user_type == 1){
          $sql = "insert into bordereau values ('',:date,:id_user);";
          $params = array(
            ':date'=>$date,
            ':id_user'=>$id_user
          );
          $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
          $nb = $sth->rowcount();
        }
        return $nb; // Retourne le nombre de mise à jour
      } // insert()

      function search_bordereau_encours($id_user,$user_type){
          //rajouter l'annee dans where
          $sth = null;
          //verifie le type de l'utilisateur
          if($user_type ==1){
          $sql = "select * from bordereau where id_user = :id";
          $params = array(
            ':id'=>$id_user);
          $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
        }
        return $sth;
      } // function search_bordereau_encours()

      function search_ligne_frais($id_bordereau,$user_type){
          $sth = null;
          //verifie le type de l'utilisateur
          if($user_type ==1){
          $sql = "select * from ligne_frais where ID_bordereau = :id";
          $params = array(
            ':id'=>$id_bordereau);
          $sth = $this->executer($sql, $params); // On passe par la méthode de la classe mère
        }
        return $sth;
      } // function search_ligne_frais_encours()



}
?>
