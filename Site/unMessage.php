<?php
	if (isset($_GET['recu']))
	{
		$stmt = pg_exec("UPDATE Message SET lu=TRUE WHERE id=".$_GET['msg']);
	}
	
	$stmt2 = pg_exec("SELECT * FROM Message JOIN Compte ON Compte.login = Message.expediteur WHERE id=".$_GET['msg']);
	$ligne = pg_fetch_array($stmt2,0);
	$email = $ligne['email'];
	$expediteur = $ligne['expediteur'];
	$objet = $ligne['objet'];
	$message = $ligne['contenu'];
	echo "Expediteur : ".$email." (".$expediteur.")<br /><br />Objet : ".$objet."<br /><br />Message : <br /><br />".$message."<br /><br /><br />"
?>