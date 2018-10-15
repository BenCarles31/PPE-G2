<?php
  $bord_encours=$utilisateur->search_bordereau_encours($utilisateur_connecter->get_id_user(),$utilisateur_connecter->get_ID_type());
  $nb_bord=0;
  foreach($bord_encours as $bord_encour){
    $nb_bord++;
  }
  echo '<p>'.$nb_bord.'</p>';
  if($nb_bord==0){
    $date_courant = Date('Y-m-d');
    echo $date_courant;
    $utilisateur->creation_bordereau($date_courant,$utilisateur_connecter->get_id_user(),$date_courant,$utilisateur_connecter->get_ID_type());
    echo 'Sa a peut etre marche, ou pas';
  }else{
    echo 'La tuile';
  }
?>
