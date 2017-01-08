<?php
  include_once("session.php");
?>
<!DOCTYPE html>
<html>
  	<head>
    	<title>
    		HANDICAP - Site d'entraide pour malades et handicapés
    	</title>
    	<meta charset="UTF-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
    	<?php 
    		include_once("header.php");
    	?>
  	</head>
  	<body>
      		<?php
        		if(isset($_GET['param']))
        		{
          			include_once($_GET['param']);
        		}
        		else
        		{
          			include_once("accueil.php");
        		}
      		?>
  	</body>
  	<?php
    	include_once("Footer.php");
    ?>
</html>