<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<script type="text/javascript" src="./JS/navigation.js"></script>
	<script type="text/javascript" src="./JS/jquery-3.3.1.js"></script>
	<title> Web & 3D</title>
</head>
<body>
	<!-- The overlay -->
	<div id="myNav" class="overlay">

	  <!-- Button to close the overlay navigation -->
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	  <!-- Overlay content -->
	  <div class="overlay-content">
	    <a href="index.php">Accueil</a>
        <?php
          if ((isset($_SESSION)) && (isset($_SESSION['user_id'])))
          {
              echo "<a href=\"logout.php\">Déconnexion</a>
                <a href=\"account.php\">Gestion du compte</a>
                <a href=\"visitor.php\">Visiter l'appartement</a>";
          }
          else
          {
              echo "<a href=\"login.php\">Connexion</a>
              <a href=\"register.php\">Inscription</a>";
          }
        ?>
	    <a href="about.php">À propos</a>
	  </div>

	</div>

	<h1>Projet Web & 3D</h1>
	<span class="logo"><img src="./CSS/kcr_estate_agency_logo.png" class="logo" height="150" width="100"></span>

	<!-- Use any element to open/show the overlay navigation menu -->
	<span id="open" class="open" onclick="openNav()">&#9776;</span>
</body>
</html>