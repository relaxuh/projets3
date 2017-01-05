<?php
    $pseudo = strip_tags($_POST['pseudo']);
    $password = strip_tags($_POST['password']);
    $email = strip_tags($_POST['email']);
    $ville = strip_tags($_POST['ville']);
    $codepostal = strip_tags($_POST['codepostal']);
    $bdd = pg_connect('host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail');
    $stmtverif = pg_exec($bdd,"SELECT * FROM Ville WHERE nom = '$ville' AND codepostal = '$codepostal'");
    if (pg_numrows($stmtverif)==0)
    {
    	$stmt0 = pg_exec($bdd,"INSERT INTO Ville VALUES ('$ville','$codepostal')");
    }
    try
    {
    	$stmtverif2 = pg_exec($bdd,"SELECT * FROM Compte WHERE login = '$pseudo' OR email = '$email'");
    	if(pg_numrows($stmtverif2)==0)
    	{
    		$stmt = pg_exec($bdd,"INSERT INTO Compte VALUES('$pseudo', '$password', '$email', '$codepostal')");
    		echo 'Félicitations, vous avez bien été inscrit !!!';
    	}
    	else
    	{
    		echo 'Erreur à l\'inscription, le login ou l\'email est déjà utilisé';
    	}
    }
    catch(Exception $e)
    {
    	echo 'Erreur d\'inscription';
    }
 ?>