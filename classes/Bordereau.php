<?php

class Bordereau {
  // Attributs
  private $ID_bordereau="???";
  private $date_bordereau="???";
  private $id_user="???";
  private $id_statut="???";


  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }
  
  function get_Id_statut() {
      return $this->id_statut;
  }

    function get_ID_bordereau() {
      return $this->ID_bordereau;
  }

  function get_Date_bordereau() {
      return $this->date_bordereau;
  }

  function get_Id_user() {
      return $this->id_user;
  }

  function set_Id_statut($id_statut) {
      $this->id_statut = $id_statut;
  }
  
  function set_ID_bordereau($ID_bordereau) {
      $this->ID_bordereau = $ID_bordereau;
  }

  function set_Date_bordereau($date_bordereau) {
      $this->date_bordereau = $date_bordereau;
  }

  function set_Id_user($id_user) {
      $this->id_user = $id_user;
  }


  /**
   * Hydrateur
   * Alimente les propriétés à partir d'un tableau
   * @param array $tableau
   */
  function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}
