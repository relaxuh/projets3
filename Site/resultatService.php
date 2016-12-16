
<?php
	try 
	{ 
  		$bdd = pg_connect("host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail"); 
 	}
 	catch (Exception $e)
 	{
 		echo 'Erreur :'.$e->getMessage();
 	}
	$stmt = pg_exec($bdd,"SELECT type FROM Service");
	for ($i=0; $i<pg_numrows($stmt); $i++) 
	{
        $ligne= pg_fetch_array($stmt, $i);
        echo 'Service : '.$ligne['type'].'<br />';
    }
?>