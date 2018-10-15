<?php

$bord_en_cours=$utilisateur->search_bordereau_encours($utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());

foreach($bord_en_cours as $bord_en_cour){
  $id_bord = $bord_en_cour['ID_bordereau'];
}

$tab_lignes_frais=$utilisateur->search_ligne_frais($id_bord,$utilisateur_connecter->get_ID_type());

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
              foreach($rows as $ligne){
                if($id_motif==$ligne['idMotif']){
                  echo("<td>".$row['libelle']."</td></tr>");
                }
              }
    }
    echo "</table></center><br/><br/>";
} else {
  //message si le resultat de la requete est vide
  echo "<center><p>Rien à afficher</p></center>";
  }


?>
