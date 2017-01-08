
<br />
  Choisir type de Service : <br />
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
  <br /><br />
    Si autre :
  <br />
    <input type="text" name="autre" size="50">
  <br /><br />
    Description : 
  <br />
    <textarea cols="110" rows="25" name="description" ></textarea>
<br /><br /><br />
  <input type="submit" value="Créer">
</form>
<br />