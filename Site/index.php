<?php
  include_once("session.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Site pour handicapés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div id='bandeau'>
      <div id='logo'>
        <img src="bannierehandicap.png" alt="logo"/>
      </div>
      <?php
        if ((!empty($_SESSION['login'])))
        {
          echo '<!--<a href="profil.php" title="Accédez à votre profil">--> Connecté en tant que '.$_SESSION['login'].'<!--</a>--><form action="index.php" method="post"><input type="submit" value="Déconnexion" name="Val"></form>';
        }
        else
        {
          echo '<a href="connexion.php" title="Accès à la page de connexion"></a>';
          include_once("connexion.php");
        }
      ?>
      <?php
        include_once("menu.html");
      ?>
      <?php
        if(isset($_GET['param']))
        {
          include_once($_GET['param']);
        }
        else
        {
          include_once("accueil.php");
        }
      ?>
      <?php
        include_once("Footer.php");
      ?>
    </div>
  </body>
</html>