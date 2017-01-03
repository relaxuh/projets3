<div>
<?php
	if (isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		$stmt0 = pg_exec($bdd,"SELECT id FROM Compte JOIN Ordonnance ON Compte.login = Ordonnance.user WHERE login = 'admin';");
		for ($i=0; $i<pg_numrows($stmt0); $i++) 
		{
        	$ligne= pg_fetch_array($stmt0, $i);
        	echo 'Ordonnance N°'.$ligne['id'].' : <br />';
        	$stmt2 = pg_exec($bdd,"SELECT * FROM medicamentOrdonnance JOIN Medicament ON medicamentOrdonnance.Medicament=Medicament.id WHERE medicamentOrdonnance.Ordonnance='".$ligne['id']."'");
        	for ($j=0; $j<pg_numrows($stmt2); $j++)
        	{
        		$ligne2 = pg_fetch_array($stmt2, $j);
        		$nom = $ligne2['nom'];
        		$qtt = $ligne2['nbMed'];
        		echo '&nbsp &nbsp &nbsp &nbsp Medicament : '.$nom.' <br /> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Quantité : '.$qtt.'<br />';
        	}
    	}
	}
	else
	{
		echo "vous n'êtes pas connectés";
	}
?>
</div>