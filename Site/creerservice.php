<br />
  Créer un service
<br />
<br />
  Choisir type de Service : 
<form action="index.php?param=creationService.php" method="post">
  <select name="type">
    <?php 
      $stmt = pg_exec($bdd,"SELECT type FROM Service GROUP BY type;");
      for ($i=0; $i<pg_numrows($stmt); $i++)
      {
        $ligne = pg_fetch_array($stmt, $i);
        $type = $ligne['type'];
        echo '<option name="'.$type.'">'.$type."</option>";
      }
    ?>
    <option name="Autre">Autre</option>
  </select>
  <br />
    Si autre :
  <br />
    <input type="text" name="autre">
  <br />
    Description : 
  <br />
    <input type="text" name="description">
<br /><br /><br />
  <input type="submit" value="Créer">
</form>
<br />