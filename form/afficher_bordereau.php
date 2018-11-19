<?php

$bordereauDAO = new BordereauDAO();
$motifDAO = new MotifDAO();
$indemniteDAO = new IndemniteDAO();
$Motifs = $motifDAO->findAll();
$Indemnites = $indemniteDAO->findAll();
$bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
$LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());

$cout_km=0;
$total_bord =0;

$nom1 = "ligne_modifier";
$sub1 = "modifier";

$nom2 = "ligne_supprimer";
$sub2 = "supprimer";

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
            <td>" .$LigneFrais->get_Date_frais() . "</td>
            <td>" .$LigneFrais->get_Trajet() . "</td>
            <td>" .$LigneFrais->get_KM()."</td>
            <td>".$LigneFrais->get_Cout_peages()."</td>
            <td>".$LigneFrais->get_Cout_repas()."</td>
            <td>".$LigneFrais->get_Cout_hebergement()."</td>");

        //cherche libelle correspondant
        foreach($Motifs as $Motif){
          if($LigneFrais->get_IdMotif()==$Motif->get_IdMotif()){
            echo("<td>".$Motif->get_Libelle()."</td>");
          }
        }
        //rajouter condition sur les annees à la place de 1
        foreach($Indemnites as $indemnite){
          if($indemnite->get_Tarif_kilometrique() ==1){
            $cout_km = $LigneFrais->get_KM() * $indemnite->get_Tarif_kilometrique();
          }
        }

      $total_bord = $total_bord + $LigneFrais->get_Cout_peages() + $LigneFrais->get_Cout_repas() + $LigneFrais->get_Cout_hebergement() + $cout_km;


       echo('<td><form action="#" method="POST">
                  <input type="hidden" name='.$nom1.' value='.$LigneFrais->get_Id_ligne().'>
                  <input type="hidden" name='.$sub1.' value="1">
                  <button class="button success" onclick="Metro.dialog.open(\'#W_ajout_ligne_frais\')">Modifier</button>

                  <input type="hidden" name='.$nom2.' value='.$LigneFrais->get_Id_ligne().'>
                  <input type="hidden" name='.$sub2.' value="1">
                  <input type="submit" class="button alert" value="Supprimer">
                </form>
           </td>');
        echo'</tr>';
  }
echo '</table>';
echo '<p> Total : '.$total_bord.'</p>';
?>
