<?php
$LesBordereaux = $bordereauDAO->findAllBordByUser($userConnecte->get_id_user());
$Indemnites = $indemniteDAO->findAll();

foreach($LesBordereaux as $bordereau){
  $cout_km=0;
  $total_bord=0;
  $dateBord = $bordereauDAO->findDateBordereau($bordereau->get_ID_bordereau());

  if($bordereau->get_Id_statut() == $StatutCloturer->get_Id_statut() || $bordereau->get_Id_statut() ==  $StatutValider->get_Id_statut()){
      $lib = $statutDAO->find($bordereau->get_Id_statut())->get_Libelle();
      echo '<p> Statut du bordereau : '. $lib;
  
    $LignesFrais = $bordereauDAO->findLigneFrais($bordereau->get_ID_bordereau());
    echo '<table class="table striped table-border">';
    //entete du tableau
    echo('<thead><tr>
            <th>ID</th>
            <th>Date Frais</th>
            <th>Trajet</th>
            <th>KM</th>
            <th>Peages</th>
            <th>Repas</th>
            <th>Hebergement</th>
            <th>Motif</th>
         </tr></thead>');

         foreach($LignesFrais as $LigneFrais){
           echo("<tr style='color: black'>
              <td>".$bordereau->get_ID_bordereau()."</td>
              <td>".$LigneFrais->get_Date_frais()."</td>
              <td>".$LigneFrais->get_Trajet()."</td>
              <td>".$LigneFrais->get_KM()."</td>
              <td>".$LigneFrais->get_Cout_peages()."</td>
              <td>".$LigneFrais->get_Cout_repas()."</td>
              <td>".$LigneFrais->get_Cout_hebergement()."</td>");

          //cherche libelle correspondant
          foreach($Motifs as $Motif){
            if($LigneFrais->get_IdMotif()==$Motif->get_IdMotif()){
              echo("<td>".$Motif->get_Libelle()."</td>");
            }
          }

          foreach($Indemnites as $indemnite){
            $anneeInd = explode("-", $indemnite->get_annee());
            $anneeBord = explode("-", $bordereau->get_Date_bordereau());
            if($anneeInd[0] == $anneeBord[0]){
              $cout_km = $LigneFrais->get_KM() * $indemnite->get_Tarif_kilometrique();
            }
          }

        $total_bord = $total_bord + $LigneFrais->get_Cout_peages() + $LigneFrais->get_Cout_repas() + $LigneFrais->get_Cout_hebergement() + $cout_km;
        echo'</tr>';
      }
  echo '</table>';
  echo '<p> Total : '.$total_bord.'</p>';

  echo '____________________________________________________';
  }
}
?>
