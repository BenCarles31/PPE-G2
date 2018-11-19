<?php
include "init.php";
$responsableDAO = new ResponsableDAO ();
$responsables = $responsableDAO->findAllAdherent();

$allAdherent= isset($_POST['allAdherent']) ? $_POST['allAdherent'] : '';

$loginAdherent= isset($_POST['loginAdherent']) ? $_POST['loginAdherent'] : '';
$email= isset($_POST['email']) ? $_POST['email'] : '';
$pass= isset($_POST['pass']) ? $_POST['pass'] : '';

if($loginAdherent){
  $adherentConnected = $responsableDAO->findAdherentByEmailPass($email, $pass);
  echo "<p>".$adherentConnected->get_nom()."</p>";
  echo "<p>".$adherentConnected->get_prenom()."</p>";
  echo "<p>".$adherentConnected->get_email()."</p>";

}


if($allAdherent){
  foreach($responsables as $responsable){
    echo "<p>".$responsable->get_nom()."</p>";
    echo "<p>".$responsable->get_prenom()."</p>";
    echo "<p>".$responsable->get_email()."</p>";
  }
}


?>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>
  <form action="#" method="POST">
      <input type="submit" name="allAdherent" value="all adherents">
  </form>
  </p>

  <p>
  <form action="#" method="POST">
      <input type="text" name="email" placeholder="email">
      <input type="text" name="pass" placeholder="mdp">
      <input type="submit" name="loginAdherent" value="login">
  </form>
  </p>
</body>
</html>
