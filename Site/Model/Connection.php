
<? php
	public function __construct()
     {
          $this->bdd = new PDO('mysql:host=51.254.205.0:5432;dbname=phpm3104;charset=utf8','root','');
     }


		 if(isset($_POST['btn_valider'])){
		 	$uname = strip_tags($_POST['ID']);
		 	$upren = strip_tags($_POST['password']);

		 	if($uname=="")	{$error[] = "Nom invalide";}
		 	else if(!filter_var($upren, FILTER_VALIDATE_EMAIL))	{$error[] = 'Prénom invalide';}
		 	else if($uage =="")	{$error[] = "Erreur age";}

		 	if(isset($erreur)){echo $erreur;}
		 	else{

		 		try{
		 		 $bdd->exec("INSERT INTO Comptes(ID, Nom, Prenom, Age)
		 									VALUES(NULL, '$valeurs->nom', '$valeurs->prenom', '$valeurs->age');")
		 				 or die(print_r($bdd->errorInfo(), true));


						 $user = new User($bdd, $ID);

		 		}
		 		catch(Exception $e){echo 'Erreur';}
		 	}

?>
