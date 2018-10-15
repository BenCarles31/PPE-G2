<?php

$bord_en_cours=$utilisateur->search_bordereau_encours($utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());

foreach($bord_en_cours as $bord_en_cour){
  $id_bord = $bord_en_cour['ID_bordereau'];
}

$tab_ligne_frais=$utilisateur->search_ligne_frais($id_bord,$utilisateur_connecter->get_ID_type());

if (count($tab_ligne_frais)>0) {
    echo '<center><table id="test" class="table striped table-border">';
    //entete du tableau
    echo('<tr>
            <th>Date Repas</th>
            <th>Restaurant</th>
            <th>Montant</th>
            <th>Nombre de personnes</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Statut</th>
         </tr>');
    //affiche le resultat de la requete
    foreach ($tab_ligne_frais as $row) {
      echo ("<tr>
              <td>" . $row["dateRepas"] . "</td>
              <td>" . $row["restaurant"] . "</td>
              <td>" . $row['montant']."</td>
              <td>".$row['nombrePers']."</td>
              <td>".$row['nom']."</td>
              <td>".$row['prénom']."</td>
              <td>".$row['idStatut']."</td>
            </tr>");
    }
    echo "</table></center><br/><br/>";
} else {
  //message si le resultat de la requete est vide
  echo "<center><p>Rien à afficher</p></center>";
  }


?>
