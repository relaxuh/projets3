<?php
    $createur = $_SESSION['login'];
    $type = strip_tags($_POST['type']);
    $autre = strip_tags($_POST['autre']);
    $description = strip_tags($_POST['description']);
    $bdd = pg_connect('host=51.254.205.0 port=5432 dbname=ProjetPHP-Mitrail user=mitrail password=mitrail');
    $stmt0 = pg_exec("SELECT * FROM Service;");//Affiche tous les services
    $id = pg_numrows($stmt0)+1; //Compte le nombre de service pour trouver l'id (on choisit de commencer à 1)
    if ($type=='Autre') //Si l'utilisateur à choisi Autre dans la comboBox
    {
        $typeannonce=$autre; //Création d'un service en prenant le texte entré par l'utilisateur en nom
    }
    else
    {
        $typeannonce=$type; //Création d'un service en prenant la comboBox choisie par l'utilisateur en nom
    }
    $stmt = pg_exec("INSERT INTO Service(id,type,description) VALUES ('$id','$typeannonce','$description');");//Création du service
    $stmt2 = pg_exec("INSERT INTO ServiceUtilisateur VALUES ('$id','$createur');"); //Liaison du service à l'utilisateur courant
    echo "Félicitations, vous avez créé le service suivant : <br />Créateur de l'annonce : ".$createur."<br />Nom de l'annonce : ".$typeannonce."<br />Description de l'annonce : ".$description."<br /><br /><br />";
 ?>