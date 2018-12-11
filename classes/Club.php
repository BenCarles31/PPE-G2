<?php

class Club {
  // Attributs
  private $ID_club=0;
  private $nom_club="???";
  private $adresse_club="???";
  private $cp='???';
  private $ville="???";
  private $sigle='???';
  private $nom_president="???";
  private $ID_ligue="???";

  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_ID_club() {
      return $this->ID_club;
  }

  function get_Nom_club() {
      return $this->nom_club;
  }

  function get_Adresse_club() {
      return $this->adresse_club;
  }

  function get_Cp() {
      return $this->cp;
  }

  function get_Ville() {
      return $this->ville;
  }

  function get_Sigle() {
      return $this->sigle;
  }

  function get_Nom_president() {
      return $this->nom_president;
  }

  function get_ID_ligue() {
      return $this->ID_ligue;
  }

  function set_ID_club($ID_club) {
      $this->ID_club = $ID_club;
  }

  function set_Nom_club($nom_club) {
      $this->nom_club = $nom_club;
  }

  function set_Adresse_club($adresse_club) {
      $this->adresse_club = $adresse_club;
  }

  function set_Cp($cp) {
      $this->cp = $cp;
  }

  function set_Ville($ville) {
      $this->ville = $ville;
  }

  function set_Sigle($sigle) {
      $this->sigle = $sigle;
  }

  function set_Nom_president($nom_president) {
      $this->nom_president = $nom_president;
  }

  function set_ID_ligue($ID_ligue) {
      $this->ID_ligue = $ID_ligue;
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
