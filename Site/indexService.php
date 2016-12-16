<!DOCTYPE html>
<html>
  <head>
    <title>Side pour handicapés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="creerservice.css">
  </head>

  <body>
    <?php
      include_once("menutest1.html");
    ?>

    <!-- <? //php $ctrl = new Controller?> -->
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