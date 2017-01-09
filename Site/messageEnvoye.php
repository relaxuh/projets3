<?php
	$login = $_SESSION['login'];
	$stmt0 = pg_exec($bdd,"SELECT * FROM Compte JOIN Message ON Message.expediteur = Compte.login WHERE Compte.Login ='".$login."'");
	for ($i=0; $i<pg_numrows($stmt0); $i++) 
	{
   	$ligne= pg_fetch_array($stmt0, $i);
    $expediteur = $ligne['expediteur'];
    $destinataire = $ligne['destinataire'];
    $objet = $ligne['objet'];
    $message = $ligne['contenu'];
    $stmt1 = pg_exec($bdd,"SELECT email FROM Compte JOIN Message ON Message.expediteur = Compte.login WHERE Compte.login='".$expediteur."' GROUP BY email;");
    $ligne1 = pg_fetch_array($stmt1, 0);
    $email = $ligne1['email'];
    if ($ligne['lu']=='f')
    {
      $lu = "Non lu ";
    }
    else
    {
      $lu = "Lu ";
    }
    echo "Expediteur : ".$email." (".$expediteur."), Objet : ".$objet."<br />&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href='index.php?param=unMessage.php&msg=".$ligne['id']."'>voir (".$lu." par ".$destinataire.")</a><br /><br /><br />";
  }
?>