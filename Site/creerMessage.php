<br />
  Veuillez choisir un destinataire : <br />
<form action="index.php?param=creationMessage.php" method="post">
  <select name="destinataire">
    <?php 
      $stmt = pg_exec($bdd,"SELECT * FROM Compte WHERE login!='".$_SESSION['login']."' GROUP BY login;");
      if (pg_numrows($stmt)==0)
      {
        echo "<option name='rien'>Aucun utilisateur excepté vous d'inscrit</option>";
      }
      else
      {
        for ($i=0; $i<pg_numrows($stmt); $i++)
        {
          $ligne = pg_fetch_array($stmt, $i);
          $destinataire = $ligne['login'];
          echo '<option name="'.$destinataire.'">'.$destinataire."</option>";
        }
      }
    ?>
  </select>
  <br /><br />
    Objet : 
  <br />
    <input type="text" size="50" name="objet">
  <br /><br />
    Message : 
  <br />
    <textarea cols="110" rows="25" name="message" ></textarea>
<br /><br /><br />
  <input type="submit" value="Envoyer">
</form>
<br />