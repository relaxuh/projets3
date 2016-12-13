
<? php
class User{
	public bdd;
	public utilisateur;


	public function __construct()
     {
          $this->bdd = new PDO('mysql:host=localhost;dbname=phpm3104;charset=utf8','root','');
     }

}
?>
