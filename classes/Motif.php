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
  function getIdMotif() {
      return $this->idMotif;
  }

  function getLibelle() {
      return $this->libelle;
  }

  function setIdMotif($idMotif) {
      $this->idMotif = $idMotif;
  }

  function setLibelle($libelle) {
      $this->libelle = $libelle;
  }

   /**
   * Hydrateur
   * Alimente les propriétés à partir d'un tableau
   * @param array $tableau
   */
  function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set__' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}
 ?>
