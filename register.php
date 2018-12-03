<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<title> Web & 3D</title>
</head>

<script type="text/javascript">
	function openNav() 
	{
		document.getElementById("myNav").style.height = "100%";
		document.getElementById("open").style.display = "none";
	}

	function closeNav() 
	{
		document.getElementById("myNav").style.height = "0%";
		document.getElementById("open").style.display = "";
	}
</script>
<body>
	<!-- The overlay -->
	<div id="myNav" class="overlay">

	  <!-- Button to close the overlay navigation -->
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	  <!-- Overlay content -->
	  <div class="overlay-content">
	    <a href="index.html">Accueil</a>
	    <a href="login.php">Connexion</a>
	    <a href="register.php">Inscription</a>
	    <a href="about.html">À propos</a>
	    <a href="#">Visiter l'appartement</a>
	  </div>

	</div>

	<!-- Use any element to open/show the overlay navigation menu -->
	<span id="open" class="open" onclick="openNav()">&#9776;</span>

	<h1>Inscription</h1>

	<!--
	<div class="wrapper">
		<div class="nav" id="nav">
			<a href="javascript:void(0)" id="close" class="close">&times;</a>
			<a href="#">Accueil</a>
			<a href="#">About</a>
			<a href="#">Blog</a>
			<a href="#">Contact</a>
		</div>

		<span id="open" class="open">&#9776;</span>

		<h1>Projet Web & 3D</h1>
	</div>
	!-->
</body>
</html>