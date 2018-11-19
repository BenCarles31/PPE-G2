<?php

$bordereauDAO = new BordereauDAO();
$bordereauEnCours = $bordereauDAO->findByResponsable($userConnecte->get_id_user());
$LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());

$cout_km=0;
$total_bord =0;

echo 'test';

  echo '<table class="table striped table-border">';
  //entete du tableau
  echo('<tr>
          <th>Date Frais</th>
          <th>Trajet</th>
          <th>KM</th>
          <th>Peages</th>
          <th>Repas</th>
          <th>Hebergement</th>
          <th>Motif</th>
          <th>Action</th>
       </tr>');
  /*foreach($LignesFrais as $LigneFrais){
    echo ("<tr>
            <td>" .$LigneFrais->get_Date_frais() . "</td>
            <td>" .$LigneFrais->get_Trajet() . "</td>
            <td>" .$LigneFrais->get_KM()."</td>
            <td>".$LigneFrais->get_Cout_peages()."</td>
            <td>".$LigneFrais->get_Cout_repas()."</td>
            <td>".$LigneFrais->get_Cout_hebergement()."</td>");

  }*/




 ?>
