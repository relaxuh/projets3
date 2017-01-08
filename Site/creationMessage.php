<?php
    $expediteur = $_SESSION['login'];
    $destinataire = strip_tags($_POST['destinataire']);
    $objet = strip_tags($_POST['objet']);
    $message = strip_tags($_POST['message']);
    $bdd = pg_connect('host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail');
    $stmt0 = pg_exec($bdd,"SELECT * FROM Message;");
    $id = pg_numrows($stmt0)+1; //Compte le nombre de service pour trouver l'id (on choisit de commencer à 1)
    try
    {
        $stmt = pg_exec($bdd,"INSERT INTO Message(id,expediteur,destinataire,objet,contenu,lu) VALUES ('$id','$expediteur','$destinataire','$objet','$message','FALSE');");
    }
    catch (Exception $e)
    {
        echo $e;
    }
    $stmt1 = pg_exec($bdd,"SELECT email FROM Compte JOIN Message ON Message.expediteur = Compte.login WHERE Compte.login='".$expediteur."' GROUP BY email;");
    $ligne1 = pg_fetch_array($stmt1,0);
    echo "Félicitations, vous avez envoyé le message suivant : <br />Expediteur : ".$ligne1['email']." (".$expediteur.")<br />Objet : ".$objet."<br />Message : <br /><br />".$message."<br /><br /><br />";
 ?>