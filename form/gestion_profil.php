<?php
  echo '<table class="table striped table-border" style="color: black">';
  echo '<tr>';
  echo '<th>nom</th>';
  echo '<td>'.$userConnecte->get_nom().'</td>';
  echo '</tr>';
  echo '<th>prénom</th>';
  echo '<td>'.$userConnecte->get_prenom().'</td>';
  echo '</tr>';
  echo '<th>rue</th>';
  echo '<td>'.$userConnecte->get_rue().'</td>';
  echo '</tr>';
  echo '<th>cp</th>';
  echo '<td>'.$userConnecte->get_cp().'</td>';
  echo '</tr>';
  echo '<th>ville</th>';
  echo '<td>'.$userConnecte->get_Ville().'</td>';
  echo '</tr>';
  echo '<th>email</th>';
  echo '<td>'.$userConnecte->get_email().'</td>';
  echo '</tr>';
  echo '</tr>';
  echo('<td>
          <p><a href="form/update_profil.php?idUser='.$userConnecte->get_id_user().'"><button class="button success">Modifier</button></a></p>
      </td>');
  echo('<td>
          <p><a href="form'.DS.'afficher_adherents.php?idUser='.$userConnecte->get_id_user().'"><button class="button success">Gestion adhérents</button></a></p>
      </td>');
  echo '</tr>';
  echo '</table>';
?>
