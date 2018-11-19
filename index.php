<<<<<<< HEAD
<?php
session_start();
include "init.php";
$responsableDAO = new ResponsableDAO ();
$generalDAO = new GeneralDAO();
?>
<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
=======
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
<<<<<<< HEAD

    <title>Fredi</title>

</head>
	<body  class="bg-dark fg-white">
    <h1 class="start-screen-title">Fredi</h1></br>
    <div class="dialog" id="W_login_adherent" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/login_adherent.php'; ?></div>
    <div class="dialog" id="W_register" data-role="dialog" data-overlay-click-close="true" data-default-action="false" data-width="auto"><?php include 'form/register.php'; ?></div>
    <br/><p><a href="test.php">Test</a></p><br/>

    <div class="tiles-area">
      <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Accueil">
            <!-- ouvre le dialog pour creer un bordereau -->
            <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_register')">
                <span class="mif-github icon" onclick="Metro.dialog.open('#W_register')"></span>
                <span class="branding-bar" onclick="Metro.dialog.open('#W_register')">Inscription</span>
            </div>
            <!-- ouvre le dialog pour creer un bordereau -->
            <div data-role="tile" class="bg-indigo fg-white" onclick="Metro.dialog.open('#W_login_adherent')">
                <span class="mif-github icon" onclick="Metro.dialog.open('#W_login_adherent')"></span>
                <span class="branding-bar" onclick="Metro.dialog.open('#W_login_adherent')">Login adhérents</span>
            </div>

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    <script>
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }
        function validateForm(){
            $(".login-form").animate({
                opacity: 0
            });
        }
    </script>
    <script language="javascript" type="text/javascript">
    function redirection(test_form) {
      document.getElementById(test_form).submit();
    }
  </script>
  </body>
=======
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="start.css" rel="stylesheet">

    <body class="bg-dark fg-white">

        <div class="container-fluid start-screen no-overflow">
            <h1 class="start-screen-title">Start</h1></br>

            <div class="tiles-area">
                <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">
                    <a href="inscription.php" data-role="tile" class="bg-indigo fg-white">
                        <span class="mif-github icon"></span>
                        <span class="branding-bar">Inscription</span>
                    </a>
                    <a href="login.php" data-role="tile" class="bg-indigo fg-white">
                        <span class="mif-github icon"></span>
                        <span class="branding-bar">Connexion</span>
                    </a>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    </body>
>>>>>>> 9e52400773ee7e8434271dd834621330bab54e37
</html>
