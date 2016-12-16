<?php
     session_start();

?>

<?php
    if(isset($_POST['Val']))
    {
      session_destroy();
      $_SESSION = array();
      session_destroy();
    }
    if(isset($_POST['btn_valider']))
    {
      $uname = strip_tags($_POST['Pseudo']);
      $upswd = strip_tags($_POST['Password']);
      if($uname=="")  
      {
        $error[] = "Nom invalide";
      }
      else if($upswd=="") 
      {
        $error[] = 'Mot de passe invalide';
      }
      $bdd = pg_connect('host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail');

      if(isset($erreur))
      {
        echo $erreur;
      }
      else
      {
        try
        {
          $id = pg_exec($bdd,"SELECT Login FROM Compte WHERE login = '$uname' AND mdp = '$upswd'")
          or die(print_r($bdd->errorInfo(), true));

          if (pg_numrows($id)!=0)
          {
            echo $id;
            $_SESSION['login'] = pg_fetch_array($id,0);
            echo $_SESSION['login'];
          }
        }
        catch(Exception $e)
        {
          echo 'Erreur';
        }
      }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Site pour handicapés</title>
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
      if ((!empty($_SESSION['login'])))
      {//deja co
        //changer div
         echo '<a href="profil.php" title="Accédez à votre profil">Mon profil</a>
         <form action="indextest2.php" method="post">
            <input type="submit" value="Val" name="Val">
         </form>';
         //include_once("connexion.php");

      }
      else
      {//afficher le module de co
        //changer div
         echo '<a href="connexion.php" title="Accès à la page de connexion"></a>';
         include_once("connexion.php");
      }
    ?>
      <?php
       
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
