<?php
  session_start();
  $bdd = pg_connect('host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail');
  if(isset($_POST['Val']))
  {
    session_destroy();
    $_SESSION = array();
    session_destroy();
  }
  if(isset($_POST['connexion']))
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
    if(isset($erreur))
    {
      echo $erreur;
    }
    else
    {
      try
      {
        $id = pg_exec($bdd,"SELECT Login FROM Compte WHERE login = '$uname' AND mdp = '$upswd'") or die(print_r($bdd->errorInfo(), true));
        if (pg_numrows($id)!=0)
        {
          $temp = pg_fetch_array($id,0);
          $_SESSION['login'] = $temp[0];
        }
      }
      catch(Exception $e)
      {
        echo 'Erreur';
      }
    }
  }
?>