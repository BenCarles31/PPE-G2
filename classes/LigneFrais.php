<?php
class LigneFrais {
  // Attributs
  private $id_ligne=0;
  private $date_frais="???";
  private $trajet="???";
  private $KM='???';
  private $cout_peages="???";
  private $cout_repas="???";
  private $cout_hebergement='???';
  private $idMotif="???";
  private $ID_bordereau="???";

  function __construct(array $tableau = null) {
    if ($tableau != null) {
      $this->hydrater($tableau);
    }
  }

  function get_Id_ligne() {
      return $this->id_ligne;
  }

  function get_Date_frais() {
      return $this->date_frais;
  }

  function get_Trajet() {
      return $this->trajet;
  }

  function get_KM() {
      return $this->KM;
  }

  function get_Cout_peages() {
      return $this->cout_peages;
  }

  function get_Cout_repas() {
      return $this->cout_repas;
  }

  function get_Cout_hebergement() {
      return $this->cout_hebergement;
  }

  function get_IdMotif() {
      return $this->idMotif;
  }

  function get_ID_bordereau() {
      return $this->ID_bordereau;
  }

  function set_Id_ligne($id_ligne) {
      $this->id_ligne = $id_ligne;
  }

  function set_Date_frais($date_frais) {
      $this->date_frais = $date_frais;
  }

  function set_Trajet($trajet) {
      $this->trajet = $trajet;
  }

  function set_KM($KM) {
      $this->KM = $KM;
  }

  function set_Cout_peages($cout_peages) {
      $this->cout_peages = $cout_peages;
  }

  function set_Cout_repas($cout_repas) {
      $this->cout_repas = $cout_repas;
  }

  function set_Cout_hebergement($cout_hebergement) {
      $this->cout_hebergement = $cout_hebergement;
  }

  function set_IdMotif($idMotif) {
      $this->idMotif = $idMotif;
  }

  function set_ID_bordereau($ID_bordereau) {
      $this->ID_bordereau = $ID_bordereau;
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
