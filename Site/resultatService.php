<?php
 	$type = strip_tags($_POST['typeService']);
 	$ville = strip_tags($_POST['ville']);
 	if ($ville!='')
 	{
 		$stmt = pg_exec($bdd,"SELECT * FROM Service JOIN serviceEntreprise ON Service.id = serviceEntreprise.service JOIN villeEntreprise USING(entreprise) JOIN Ville ON villeEntreprise.ville=ville.codePostal WHERE ville.nom = '$ville' AND service.type='$type';");
 	}	
	else
	{
		$stmt = pg_exec($bdd,"SELECT * FROM Service JOIN serviceEntreprise ON Service.id = serviceEntreprise.service WHERE type='$type';");
	}
	for ($i=0; $i<pg_numrows($stmt); $i++) 
	{
        $ligne= pg_fetch_array($stmt, $i);
        echo 'Service par une entreprise : '.$ligne['type'].'<br />';
    }
    if ($ville!='')
    {
    	$stmt2 = pg_exec($bdd,"SELECT * FROM Service JOIN serviceUtilisateur ON Service.id = serviceUtilisateur.service JOIN Compte ON serviceUtilisateur.user=Compte.login WHERE ville.nom = '$ville' AND service.type='$type';");
    }
    else
    {
    	$stmt2 = pg_exec($bdd, "SELECT * FROM Service JOIN ServiceUtilisateur ON Service.id = serviceUtilisateur.service JOIN Compte ON serviceUtilisateur.user=Compte.login WHERE type = '$type';");
    }
    for ($j=0; $j<pg_numrows($stmt2); $j++) 
	{
        $ligne2 = pg_fetch_array($stmt2, $j);
        echo 'Service par un autre utilisateur : '.$ligne2['type'].'<br />';
    }
?>