<?php
class Indemnite {
  // Attributs
  private $annee="0000-00-00";
  private $tarif_kilometrique="???";

  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_Annee() {
      return $this->annee;
  }

  function get_Tarif_kilometrique() {
      return $this->tarif_kilometrique;
  }

  function set_Annee($annee) {
      $this->annee = $annee;
  }

  function set_Tarif_kilometrique($tarif_kilometrique) {
      $this->tarif_kilometrique = $tarif_kilometrique;
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
