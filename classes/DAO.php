<?php
<<<<<<< HEAD
<<<<<<< HEAD
/**
* Classe mère DAO
*/

abstract class DAO {

  protected $pdo = NULL;  // Objet de connexion

  /**
  * Ouvre une connexion à la base de données
  * @throws PDOException
  */
  function get_connection() {
    // On construit le DSN
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    // On se connecte à la base de données
    try {
      $this->pdo=new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la connexion à la base de données : " . $e->getMessage())."\nDSN : ".$dsn;
    }
  }

  /**
  * Exécute une requête SQL
  * @param string $sql Requête SQL
  * @param array $params Paramètres de la requête
  * @return PDOStatement Résultats de la requête
  */
  protected function executer($sql, $params = null) {
    try {
      $this->get_connection();
      if ($params == null) {
        $sth = $this->pdo->query($sql);   // exécution directe
=======
class DAO {
=======
/**
* Classe mère DAO
*/
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf

abstract class DAO {

  protected $pdo = NULL;  // Objet de connexion

  /**
  * Ouvre une connexion à la base de données
  * @throws PDOException
  */
  function get_connection() {
    // On construit le DSN
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    // On se connecte à la base de données
    try {
      $this->pdo=new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la connexion à la base de données : " . $e->getMessage())."\nDSN : ".$dsn;
    }
  }

  /**
  * Exécute une requête SQL
  * @param string $sql Requête SQL
  * @param array $params Paramètres de la requête
  * @return PDOStatement Résultats de la requête
  */
  protected function executer($sql, $params = null) {
    try {
      $this->get_connection();
      if ($params == null) {
<<<<<<< HEAD
        $sth = $this->pdo->query($sql); // exécution directe
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
        $sth = $this->pdo->query($sql);   // exécution directe
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf
      } else {
        $sth = $this->pdo->prepare($sql); // requête préparée
        $sth->execute($params);
      }
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage()."\nSQL : ".$sql);
    }
<<<<<<< HEAD
<<<<<<< HEAD
    return $sth;  // Retourne le PDOStatement
  }

}  // class DAO
=======
      return $sth; // Renvoie le handler du résultat de la requête SQL
    }

  }

?>
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
=======
    return $sth;  // Retourne le PDOStatement
  }

}  // class DAO
>>>>>>> 489dc6bd60a74e13432daf4b851333a974b5f0bf
