<?php
class Motif {
  // Attributs
  private $idMotif=0;
  private $libelle="???";

  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_IdMotif() {
      return $this->idMotif;
  }

  function get_Libelle() {
      return $this->libelle;
  }

  function set_IdMotif($idMotif) {
      $this->idMotif = $idMotif;
  }

  function set_Libelle($libelle) {
      $this->libelle = $libelle;
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
