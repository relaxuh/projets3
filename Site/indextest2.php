<!DOCTYPE html>
<html>
  <head>
    <title>Side pour handicapés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="creerservice.css">
    <!--inclure CSS-->
  </head>

  <body>
    <div id='bandeau'>
      <div id='logo'>
      <img src="logo.png" alt="logo"/>
      </div>
      <?php
       include_once("connexion.php");
      ?>
    <!--inclure Header-->
    <?php
     include_once("menutest1.html");
    ?>

    <!-- <? //php $ctrl = new Controller?> -->

    <!--inclure contenu de la page à charger-->
    <?php
      include_once("creerservicetest1.php");
    ?>


    <!--inclure Footer-->
    <?php
      include_once("Footer.php");
    ?>
  </div>
  </body>
</html>
