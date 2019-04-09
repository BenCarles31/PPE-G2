<?php
$cloturerBordereau = isset($_POST['validBordereau']) ? $_POST['validBordereau'] : '';
$idBordereau = isset($_POST['idBordereau']) ? $_POST['idBordereau'] : '';

if($cloturerBordereau){
  $bordereauDAO->updateStatutBordereau($StatutCloturer->get_Id_statut(),$idBordereau);
  redirige('principal.php');
}

//récupère les bordereaux selon leur statut
$bordEnAttentes = $bordereauDAO->findBordByStatut($StatutAttente->get_Id_statut());
$bordClotures = $bordereauDAO->findBordByStatut($StatutCloturer->get_Id_statut());
$bordValides = $bordereauDAO->findBordByStatut($StatutValider->get_Id_statut());

if(count($bordEnAttentes)>0){
  // Tableau de bordereau en cours
  echo '<table class="table bg-white striped table-border">';
  echo '<caption>Bordereaux en cours</caption>';
  //entete du tableau
  echo('<thead><tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date</th>
          <th>Détails</th>
       </tr></thead>');
  foreach($bordEnAttentes as $Bordereau){
    if($Bordereau->get_Id_statut()==$StatutAttente->get_Id_statut()){
     $resp_by_bord = $responsableDAO->findRespByIdBordeau($Bordereau->get_ID_bordereau());
     echo("<tr style='color: black'>");
     echo '<td>'.$resp_by_bord->get_nom().'</td>';
     echo '<td>'.$resp_by_bord->get_prenom().'</td>';
     echo '<td>'.$Bordereau->get_Date_bordereau().'</td>';
     echo '<td><a href="form/affichage_details_bordereau.php?idBorddereau='.$Bordereau->get_ID_bordereau().'">Détails</a></td>';
     echo "</tr>";
   }
  }
  echo '</table>';
}

if(count($bordValides)>0){
  // Tableau de bordereau a cloturer
  echo '<table class="table bg-white striped table-border">';
  echo '<caption>Bordereaux Validés à Cloturer</caption>';
  //entete du tableau
  echo('<thead><tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date</th>
          <th>Détails</th>
          <th>Action</th>
       </tr></thead>');

  foreach($bordValides as $Bordereau){
    if($Bordereau->get_Id_statut()==$StatutValider->get_Id_statut()){
       $resp_by_bord = $responsableDAO->findRespByIdBordeau($Bordereau->get_ID_bordereau());
       echo("<tr style='color: black'>");
       echo '<td>'.$resp_by_bord->get_nom().'</td>';
       echo '<td>'.$resp_by_bord->get_prenom().'</td>';
       echo '<td>'.$Bordereau->get_Date_bordereau().'</td>';
       echo '<td><a href="form/affichage_details_bordereau.php?idBorddereau='.$Bordereau->get_ID_bordereau().'">Détails</a></td>';
       echo ('<td>
              <form action="#" method="POST">
                <input type="hidden" name="idBordereau" value="'.$Bordereau->get_ID_bordereau().'">
                <input type="submit" name="validBordereau" class="button success" value="Cloturer">
              </form>
          </td>');
      echo "</tr>";
   }
  }
  echo '</table>';
}

if(count($bordClotures)>0){
  // Tableau de bordereaux Cloturés
  echo '<table class="table bg-white striped table-border">';
  echo '<caption>Bordereaux Cloturés</caption>';
  //entete du tableau
  echo('<thead><tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date</th>
          <th>Détails</th>
       </tr></thead>');
  foreach($bordClotures as $Bordereau){
    if($Bordereau->get_Id_statut()==$StatutCloturer->get_Id_statut()){
    $resp_by_bord = $responsableDAO->findRespByIdBordeau($Bordereau->get_ID_bordereau());
    echo("<tr style='color: black'>");
     echo '<td>'.$resp_by_bord->get_nom().'</td>';
     echo '<td>'.$resp_by_bord->get_prenom().'</td>';
     echo '<td>'.$Bordereau->get_Date_bordereau().'</td>';
     echo '<td><a href="form/affichage_details_bordereau.php?idBorddereau='.$Bordereau->get_ID_bordereau().'">Détails</a></td>';
     echo "</tr>";
   }
  }
  echo '</table>';
}
?>
