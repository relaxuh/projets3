<?php
	$login = $_SESSION['login'];

	$stmt = pg_exec($bdd,"SELECT * FROM Message WHERE destinataire='".$login."' AND lu='FALSE';");
	echo "Bienvenu sur votre messagerie ".$login.", ";
    if (pg_numrows($stmt)==0)
    {
    	echo "vous n'avez actuellement aucun message non lu !";
    }
    else if (pg_numrows($stmt)==1)
    {
        echo "vous avez actuellement 1 message non lu !";
    }
    else
    {
    	echo "vous avez actuellement ".pg_numrows($stmt)." messages non lus !";
    }
?>
<br /><br /><br />
<form action="index.php?param=creerMessage.php" method="post">
	Vous souhaîtez envoyer un message
	<input type="submit" value="Appuyez ici"><br /><br />
</form>
<form action="index.php?param=messageTous.php" method="post">
	Vous souhaîtez afficher tous les messages reçus
	<input type="submit" value="Appuyez ici"><br /><br />
</form>
<form action="index.php?param=messageNonLu.php" method="post">
	Vous souhaîtez afficher tous les messages non lus
	<input type="submit" value="Appuyez ici"><br /><br />
</form>
<form action="index.php?param=messageEnvoye.php" method="post">
	Vous souhaîtez afficher les messages que vous avez envoyés
	<input type="submit" value="Appuyez ici"><br /><br />
</form>