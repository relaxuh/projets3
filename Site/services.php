<div>
	<form action="index.php?param=creerService.php" method="post">
		<input type="submit" value="Créer un service">
	</form>
	<form action="index.php?param=resultatService.php" method="post">
      	<p>
      		Choisissez une ville : 
      		<input type="text" name="ville" />
      	</p>
	    <p>
	    	Choisissez un type de service : 
	    	<select name="typeService">
		  		<?php
		  			$stmt = pg_exec($bdd,"SELECT type FROM Service GROUP BY type;");
        			for ($i=0; $i<pg_numrows($stmt); $i++)
        			{
        				$ligne = pg_fetch_array($stmt, $i);
        				$type = $ligne['type'];
        				echo '<option name="'.$type.'"">'.$type."</option>";
        			}
        		?>
		  	</select>
		</p>
	    <p>
	    	<div id="ValiderButton">
	    		<input type="submit" value="Valider">
	    	</div>
	    </p>
	</form>
</div>	