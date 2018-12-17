<?php
if(!isset($valid_update_motif) && !isset($valid_add_motif)){
  echo '<table class="table striped table-border">';
  //entete du tableau
  echo('<thead><tr>
          <th>ID</th>
          <th>Motif</th>
          <th>Action</th>
       </tr></thead>');

  foreach($Motifs as $motif){
    echo("<tr style='color: black'>
         <td>".$motif->get_IdMotif(). "</td>
         <td>".$motif->get_Libelle(). "</td>");
   echo('<td><form action="form/update_motif.php" method="POST">
              <input type="hidden" name="motif_update" value='.$motif->get_IdMotif().'>
              <input type="submit" name="val_update_motif" class="button success" value="Modifer">
            </form>
        </td>');
    echo'</tr>';
  }
   echo '</table>';
   echo('<center><form action="form/update_motif.php" method="POST">
                    <input type="hidden" name="motif_add" value='.$motif->get_IdMotif().'>
                    <input type="submit" name="val_add_motif" class="button success" value="Ajouter">
                </form>
        </center>');
}
?>
