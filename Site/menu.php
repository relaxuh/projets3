<nav>
	<ul class="nav">
		<li><a href="index.php?param=accueil.php">Accueil</a></li>
		<?php 
			if (isset($_SESSION['login']))
			{
				echo '<li><a href="index.php?param=messages.php">Mes messages</a></li><li><a href="index.php?param=ordonnances.php">Mes ordonnances</a></li>
		<li><a href="index.php?param=services.php">Mes services</a></li>';
			}
		?>
		<li><a href="index.php?param=faq.php">FAQ</a></li>
		<li><a href="index.php?param=apropos.php">A propos</a></li>
		<li><a href="index.php?param=contact.php">Contact</a></li>
	</ul>
</nav>
