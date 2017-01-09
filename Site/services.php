<form action="index.php?param=creerService.php" method="post">
	<input type="submit" value="Créer un service">
</form>
<form action="index.php?param=resultatService.php" method="post">
   	<p>
      	Choisissez une ville : 
        <select name="ville">
        <?php
          $stmt1 = pg_exec($bdd,"SELECT nom FROM Ville GROUP BY nom;");
            for ($i=0; $i<pg_numrows($stmt1); $i++)
            {
              $ligne = pg_fetch_array($stmt1, $i);
              $ville = $ligne['nom'];
              echo '<option name="'.$ville.'">'.$ville."</option>";
            }
            echo '<option name="rien"></option>';
          ?>
      </select>
    </p>
    <p>
    	Choisissez un type de service : 
    	<select name="typeService">
	  		<?php
	  			$stmt2 = pg_exec($bdd,"SELECT type FROM Service GROUP BY type;");
       			for ($j=0; $j<pg_numrows($stmt2); $j++)
       			{
       				$ligne = pg_fetch_array($stmt2, $j);
       				$type = $ligne['type'];
       				echo '<option name="'.$type.'">'.$type."</option>";
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