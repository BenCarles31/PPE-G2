<?php
$indemnites = select_indemnite($con);

$bord_en_cours=$utilisateur->search_bordereau_encours($utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());

foreach($bord_en_cours as $bord_en_cour){
  $id_bord = $bord_en_cour['ID_bordereau'];
}

$tab_lignes_frais=$utilisateur->search_ligne_frais($id_bord,$utilisateur_connecter->get_ID_type());
$cout_km=0;
$total_bord =0;
$nom1 = "ligne_modifier";
$sub1 = "modifier";
$nom2 = "ligne_supprimer";
$sub2 = "supprimer";

if (isset($tab_lignes_frais)) {
    echo '<center><table id="test" class="table striped table-border">';
    //entete du tableau
    echo('<tr>
            <th>Date Frais</th>
            <th>Trajet</th>
            <th>KM</th>
            <th>Peages</th>
            <th>Repas</th>
            <th>Hebergement</th>
            <th>Motif</th>
            <th>Modif/Suppr</th>
         </tr>');
    //affiche le resultat de la requete
    foreach ($tab_lignes_frais as $tab_ligne_frais) {
        echo ("<tr>
                <td>" . $tab_ligne_frais["date_frais"] . "</td>
                <td>" . $tab_ligne_frais["trajet"] . "</td>
                <td>" . $tab_ligne_frais['KM']."</td>
                <td>".$tab_ligne_frais['cout_peages']."</td>
                <td>".$tab_ligne_frais['cout_repas']."</td>
                <td>".$tab_ligne_frais['cout_hebergement']."</td>");


      $id_motif = $tab_ligne_frais["idMotif"];
      $km = $tab_ligne_frais['KM'];

      //cherche libelle correspondant
      foreach($rows as $ligne){
        if($id_motif==$ligne['idMotif']){
          echo("<td>".$row['libelle']."</td>");
        }
      }
      aff_tbody_form_modif_suppr($nom1,$nom2,$tab_ligne_frais['id_ligne'],$sub1,$sub2);
      /*echo "<td><a href='#?id=".$tab_ligne_frais['id_ligne']."'>Modifier</a></td>";
      echo "<td><a href='#?id1=".$tab_ligne_frais['id_ligne']."'>Supprimer</a></td>";*/

      //tester avec les date pour les if a la place du tarif (pour l'instant cout_km = km car indemnite =1)
      foreach($indemnites as $indemnite){
        if($indemnite['tarif_kilometrique']==1){
          $cout_km = $km * $indemnite['tarif_kilometrique'];
        }
      }
      //total du bordereau
      $total_bord = $total_bord + $tab_ligne_frais['cout_peages'] + $tab_ligne_frais['cout_repas'] + $tab_ligne_frais['cout_hebergement'] + $cout_km;
      
      echo("</tr>");
    }
    echo "<tr>
            <td>Total</td>
            <td>".$total_bord."</td>
          </tr>";
    echo "</table></center><br/><br/>";
} else {
  //message si le resultat de la requete est vide
  echo "<center><p>Rien à afficher</p></center>";
  }


?>
