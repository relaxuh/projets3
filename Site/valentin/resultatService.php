<div id="divResService">
<?php
	try 
	{ 
  		$bdd = pg_connect("host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail"); 
 	}
 	catch (Exception $e)
 	{
 		echo 'Erreur :'.$e->getMessage();
 	}

 	$type = strip_tags($_POST['typeService']);
 	$ville = strip_tags($_POST['ville']);

	$stmt = pg_exec($bdd,"SELECT type FROM Service JOIN serviceEntreprise ON Service.id = serviceEntreprise.service JOIN villeEntreprise USING(entreprise) JOIN Ville ON villeEntreprise.ville=ville.codePostal WHERE ville.nom = '$ville' AND service.type='$type';");
	for ($i=0; $i<pg_numrows($stmt); $i++) 
	{
        $ligne= pg_fetch_array($stmt, $i);
        echo 'Service : '.$ligne['type'].'<br />';
    }
?>
</div>