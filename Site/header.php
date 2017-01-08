<div id='bandeau'>
      		<div id='logo'>
        		<img src="bannierehandicap.png" alt="logo"/>
      		</div>
      		<?php
        		if ((!empty($_SESSION['login'])))
        		{
          			echo '<h3>Connecté en tant que '.$_SESSION['login'].'<form action="index.php" method="post"><input type="submit" value="Déconnexion" name="Val"></form></h3>';
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
      		<br /><br /><br />