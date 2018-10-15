<?php

class Utilisateur {
  // Attributs
  private $id=0;
  private $nom="???";
  private $prenom="???";
  private $rue='???';
  private $cp="???";
  private $ville="???";
  private $email='???';
  private $mdp="???";
  private $type="???";

  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_id_user() {
      return $this->id;
  }

  function get_nom() {
      return $this->nom;
  }

  function get_prenom() {
      return $this->prenom;
  }

  function get_rue() {
      return $this->rue;
  }

  function get_cp() {
      return $this->cp;
  }

  function get_Ville() {
      return $this->ville;
  }

  function get_email() {
      return $this->email;
  }

  function get_mdp() {
      return $this->mdp;
  }

  function get_ID_type() {
      return $this->type;
  }

  function set_id_user($id) {
      $this->id = $id;
  }

  function set_nom($nom) {
      $this->nom = $nom;
  }

  function set_prenom($prenom) {
      $this->prenom = $prenom;
  }

  function set_rue($rue) {
      $this->rue = $rue;
  }

  function set_cp($cp) {
      $this->cp = $cp;
  }

  function set_Ville($ville) {
      $this->ville = $ville;
  }

  function set_email($email) {
      $this->email = $email;
  }

  function set_mdp($mdp) {
      $this->mdp = $mdp;
  }

  function set_ID_type($type) {
      $this->type = $type;
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
