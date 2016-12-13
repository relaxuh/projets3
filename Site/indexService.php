<!DOCTYPE html>
<html>
  <head>
    <title>Side pour handicapés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="creerservice.css">
    <!--inclure CSS-->
  </head>

  <body>
    <!--inclure Header-->
    <?php
     include_once("menutest1.html");
    ?>

    <!-- <? //php $ctrl = new Controller?> -->

    <!--inclure contenu de la page à charger-->
    <ul>
      <?php
        include_once("resultatService.php");
      ?>
    </ul>


    <!--inclure Footer-->
    <?php
      include_once("Footer.php");
    ?>
  </body>
</html>