</div>
<footer>
	<div>
		<p>
			<a href="index.php?param=accueil.php">Accueil</a>&nbsp·
			<?php 
			if (isset($_SESSION['login']))
			{
				echo '&nbsp<a href="index.php?param=messages.php">Mes messages</a>&nbsp·&nbsp<a href="index.php?param=ordonnances.php">Mes ordonnances</a>&nbsp·&nbsp<a href="index.php?param=services.php">Mes services</a>&nbsp.';
			}
		?>
			<a href="index.php?param=apropos.php">A propos</a>&nbsp·
			<a href="index.php?param=contact.php">Contact</a>
		</p>
		<p>
			GUEGAIN Edouard - POREZ Kévin - TSOUMBOU Robert - LECERF Valentin - HILBERER Maxime &copy; 2016 - 2017
		</p>
	</div>
</footer>