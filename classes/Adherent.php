<?php

class Adherent {
  // Attributs
  private $num_license=0;
  private $nom="???";
  private $prenom="???";
  private $sexe='???';
  private $date_naissance="???";
  private $ID_club="???";
  private $id_user='???';
  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_Num_license() {
      return $this->num_license;
  }

  function get_Nom() {
      return $this->nom;
  }

  function get_Prenom() {
      return $this->prenom;
  }

  function get_Sexe() {
      return $this->sexe;
  }

  function get_Date_naissance() {
      return $this->date_naissance;
  }

  function get_ID_club() {
      return $this->ID_club;
  }

  function get_Id_user() {
      return $this->id_user;
  }

  function set_Num_license($num_license) {
      $this->num_license = $num_license;
  }

  function set_Nom($nom) {
      $this->nom = $nom;
  }

  function set_Prenom($prenom) {
      $this->prenom = $prenom;
  }

  function set_Sexe($sexe) {
      $this->sexe = $sexe;
  }

  function set_Date_naissance($date_naissance) {
      $this->date_naissance = $date_naissance;
  }

  function set_ID_club($ID_club) {
      $this->ID_club = $ID_club;
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

  function afficher() {
    $html = '<ul>';
    $html .= '<li>nom=' . $this->get_nom() . '</li>';
    $html .= '<li>prenom=' . $this->get_prenom() . '</li>';
    $html .= '<li>email=' . $this->get_email() . '</li>';
    $html .= '</ul>';
    return $html;
  }
}
