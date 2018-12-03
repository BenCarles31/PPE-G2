<?php
include "init.php";
$responsableDAO = new ResponsableDAO ();
$bordereauDAO = new BordereauDAO();
$userConnecte = $responsableDAO->find(1);
$affBordereau= isset($_POST['affBordereau']) ? $_POST['affBordereau'] : '';

if($affBordereau){
 $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
 $LignesFrais = $bordereauDAO->findLigneFrais($bordereauEnCours->get_ID_bordereau());
  echo "<p>".$userConnecte->get_nom()."</p>";
 echo "<p>".$bordereauEnCours->get_ID_bordereau()."</p>";
  echo "<p>".$bordereauEnCours->get_Date_bordereau()."</p>";
   echo "<p>".$bordereauEnCours->get_Id_user()."</p>";
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
      foreach($LignesFrais as $LigneFrais){
        echo ("<tr>
           <td>".$LigneFrais->get_Date_frais() . "</td>
           <td>".$LigneFrais->get_Trajet() . "</td>
           <td>".$LigneFrais->get_KM()."</td>
           <td>".$LigneFrais->get_Cout_peages()."</td>
           <td>".$LigneFrais->get_Cout_repas()."</td>
           <td>Hebergement</td>");
           '</tr>';

         }
    echo '</table>';
}

if($affBordereau1){
   $bordereauEnCours = $bordereauDAO->findBordByIdUser($userConnecte->get_id_user());
   echo "<p>".$bordereauEnCours['ID_bordereau']."</p>";
   echo "<p>".$bordereauEnCours['date_bordereau']."</p>";
   echo "<p>".$bordereauEnCours['id_user']."</p>";
}

?>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>
  <form action="#" method="POST">
      <input type="submit" name="affBordereau" value="aff bordereau">
  </form>
  </p>
</body>
</html>
