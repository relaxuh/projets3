<?php
 	$type = strip_tags($_POST['typeService']);
 	$ville = strip_tags($_POST['ville']);
 	if ($ville!='')
 	{
 		$stmt1 = pg_exec($bdd,"SELECT * FROM Service JOIN serviceEntreprise ON Service.id = serviceEntreprise.service JOIN villeEntreprise USING(entreprise) JOIN Ville ON villeEntreprise.ville=ville.codePostal WHERE ville.nom = '$ville' AND service.type='$type';");
 	}	
	else
	{
		$stmt1 = pg_exec($bdd,"SELECT * FROM Service JOIN serviceEntreprise ON Service.id = serviceEntreprise.service WHERE type='$type';");
	}
	for ($i=0; $i<pg_numrows($stmt1); $i++) 
	{
        $ligne1= pg_fetch_array($stmt1, $i);
        $stmt12 = pg_exec($bdd,"SELECT entreprise.id, entreprise.nom, adresse, numtel, email, ville.codepostal, ville.nom AS nomville FROM Entreprise JOIN CoordonneesEntreprise ON entreprise.id = CoordonneesEntreprise.entreprise JOIN villeEntreprise ON entreprise.id = villeEntreprise.entreprise JOIN ville ON villeEntreprise.ville = ville.codepostal WHERE coordonneesentreprise.entreprise = ".$ligne1['entreprise'].";");
        $ligne12 = pg_fetch_array($stmt12,0);
        echo "Service par une entreprise : ".$ligne1['type']."<br />
                Nom de l'entreprise : ".$ligne12['nom']."<br />
                Adresse de l'entreprise : ".$ligne12['adresse'].", ".$ligne12['codepostal']." ".$ligne12['nomville']."<br />
                Numéro de téléphone de l'entreprise : ".$ligne12['numtel']."<br />
                email de l'entreprise : ".$ligne12['email']."<br />";
    }
    echo "<br />";
    if ($ville!='')
    {
    	$stmt2 = pg_exec($bdd,"SELECT * FROM Service JOIN serviceUtilisateur ON Service.id = serviceUtilisateur.service JOIN Compte ON serviceUtilisateur.user=Compte.login JOIN ville ON compte.ville = ville.codepostal WHERE ville.nom = '$ville' AND service.type='$type';");
    }
    else
    {
    	$stmt2 = pg_exec($bdd, "SELECT * FROM Service JOIN ServiceUtilisateur ON Service.id = serviceUtilisateur.service JOIN Compte ON serviceUtilisateur.user=Compte.login WHERE type = '$type';");
    }
    for ($j=0; $j<pg_numrows($stmt2); $j++) 
	{
        $ligne2 = pg_fetch_array($stmt2, $j);
        $stmt22 = pg_exec($bdd,"SELECT * FROM Compte JOIN CoordonneesUtilisateur USING (login) JOIN ville ON compte.ville = ville.codepostal WHERE login = '".$ligne2['login']."';");
        $ligne22 = pg_fetch_array($stmt22,0);
        echo 'Service par un autre utilisateur : '.$ligne2['type']."<br />
                Pseudo de l'utilisateur : ".$ligne22['login']."<br />
                Adresse de l'utilisateur : ".$ligne22['adresse'].", ".$ligne22['codepostal']." ".$ligne22['nom']."<br />
                Numéro de téléphone de l'utilisateur : ".$ligne22['numtel']."<br />
                email de l'utilisateur : ".$ligne22['email']."<br />";
    }
?>