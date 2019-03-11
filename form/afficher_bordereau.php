<?php
$valid_suppr_ligne_bordereau = isset($_POST['val_suppr']) ? $_POST['val_suppr'] : '';
$ligne_a_suppr = isset($_POST['ligne_supprimer']) ? $_POST['ligne_supprimer'] : '';

if($valid_suppr_ligne_bordereau){
  $bordereauDAO->deleteLigne($ligne_a_suppr);
  //header('Location: principal.php');
  redirige('principal.php');
}

$validByresp = isset($_POST['validerByResp']) ? $_POST['validerByResp'] : '0';

if($validByresp !=0){
  $bordereauDAO->updateStatutBordereau($StatutValider->get_Id_statut(),$bordereauEnCours->get_ID_bordereau());
  redirige('principal.php');
}

$Indemnites = $indemniteDAO->findAll();

$LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());
$anneeBordereau = $bordereauDAO->findDateBordereau($bordereauEnCours->get_ID_bordereau());

$cout_km=0;
$total_bord =0;

  echo '<table class="table striped table-border">';
  //entete du tableau
  echo('<thead><tr>
          <th>Date Frais</th>
          <th>Trajet</th>
          <th>KM</th>
          <th>Peages</th>
          <th>Repas</th>
          <th>Hebergement</th>
          <th>Motif</th>
          <th>Action</th>
       </tr></thead>');
       foreach($LignesFrais as $LigneFrais){
         echo("<tr style='color: black'>
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
          $anneeBord = explode("-", $bordereauEnCours->get_Date_bordereau());

          if($anneeInd[0] == $anneeBord[0]){
            $cout_km = $LigneFrais->get_KM() * $indemnite->get_Tarif_kilometrique();
          }
        }

      $total_bord = $total_bord + $LigneFrais->get_Cout_peages() + $LigneFrais->get_Cout_repas() + $LigneFrais->get_Cout_hebergement() + $cout_km;


       echo('<td><p><a href="update_ligne.php?idLigne='.$LigneFrais->get_Id_ligne().'"><button class="button success">Modifier</button></a></p>
                <form action="#" method="POST">
                  <input type="hidden" name="ligne_supprimer" value='.$LigneFrais->get_Id_ligne().'>
                  <input type="submit" name="val_suppr" class="button alert" value="Supprimer">
                </form>
           </td>');
        echo'</tr>';
  }
echo '</table>';
echo '<p> Total : '.$total_bord.'</p><br/>';
echo ('<form action="#" method="POST">
        <p><button id="test_form" name="validerByResp" value="1" class="button success">Valider le bordereau</button></p><br/>
      </form>');
?>
