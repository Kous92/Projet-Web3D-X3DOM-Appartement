<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="./CSS/about.css">
	<script type="text/javascript" src="./JS/navigation.js"></script>
	<script type="text/javascript" src="./JS/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="./JS/date_heure.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                <a href=\"account.php\">Gestion du compte</a>";
            }
            else
            {
                echo "<a href=\"login.php\">Connexion</a>";
            }
        ?>
	    <a href="register.php">Inscription</a>
	    <a href="visitor.php">Visiter l'appartement</a>
	  </div>

	</div>

	<!-- Use any element to open/show the overlay navigation menu -->
	<span id="open" class="open" onclick="openNav()">&#9776;</span>
	<span class="logo"><img src="./CSS/kcr_estate_agency_logo.png" class="logo" height="150" width="100"></span>
	<h1 id="title">À propos</h1>

	<div class="container">
		<h1 id="sub_title">Projet Web & 3D: site Internet de navigation et de consultation d’un bâtiment</h1>

		<div class="authors">
			<h1 id="author_title">Projet:</h1>
			<ul>
				<li>Module Web & 3D</li>
				<li>M2 EFREI Paris Promo 2019</li>
				<li>18 janvier 2019</li>
				<li>Thématique: site Internet de navigation et de consultation d'un bâtiment en 3D.</li>
				<li>Titre: KCR Estate Agency, KCR étant les initiales des prénoms des auteurs.</li>
			</ul>

			<h1 id="author_title">Auteurs du projet, Team KCR:</h1>
			<ul>
				<li>Koussaïla BEN MAMAR, M2, majeure Software Engineering (Ingénierie Logicielle).</li>
				<li>Camille MELO, M2, majeure Imagerie & Réalité Virtuelle.</li>
				<li>Rayanne ASSOUANE, M2, majeure Business Intelligence.</li>
			</ul>

			<h1 id="author_title">Langages de programmation et technologies utilisées:</h1>
			<ul>
				<li>X3DOM: Objets 3D (Polyfill en XML)</li>
				<li>PHP: Partie serveur.</li>
				<li>MySQL: Base de données.</li>
				<li>JavaScript + JQuery: interactions avec l'interface.</li>
				<li>HTML 5 + CSS3: structure et visuels du site.</li>
			</ul>

			<h1 id="author_title">Logiciels et services utilisés:</h1>
			<ul>
				<li>PhpStorm (de JetBrains): IDE pour le développement du site.</li>
				<li>NGINX: Serveur web (en local).</li>
				<li>Blender: Édition et retouche d'objets 3D.</li>
				<li>GitHub: Management du code source.</li>
				<li>Google Drive: archivage complet du projet.</li>
			</ul>

			<h1 id="author_title">En résumé:</h1>
			<p>Ce projet aura eu pour but d'éveiller notre créativité en exploitant une technologie nous permettant d'utiliser des objets 3D dans un site web, il s'agit de X3DOM.</p>
			<p>X3DOM est un framework open-source qui a pour but de manipuler des objets au format X3D dans une page web avec HTML, c'est un donc un polyfill qu'on intègre en incluant la bibliothèque composée
			d'un fichier JavaScript et d'un fichier CSS.</p>
			<p>Nous avons donc ainsi combiné nos savoirs-faire respectifs dans ce projet pour y associer une vue d'objets 3D, donc d'un bâtiment vu de l'extérieur et d'un appartement vu de l'intérieur,
			le tout avec une structure serveur pour authentifier l'utilisateur et enregistrer sa visite, et avec une interface, comme dans une agence immobilière en ligne.</p>
		</div>

		<div class="logo_zone">
			<h1 id="networks">Liens vers les réseaux:</h1>
			<ul>
				<li><a href="https://www.linkedin.com/in/koussaïla-ben-mamar-a39235137/"><i class="fab fa-linkedin"></i></a></li>
				<li>Profil LinkedIn de Koussaïla BEN MAMAR</li>
			</ul>

			<ul>
				<li><a href="https://www.linkedin.com/in/camille-melo-97107814a/"><i class="fab fa-linkedin"></i></a></li>
				<li>Profil LinkedIn de Camille MELO</li>
			</ul>

			<ul>
				<li><a href="https://www.linkedin.com/in/rayanne-assouane-554b70144/"><i class="fab fa-linkedin"></i></a></li>
				<li>Profil LinkedIn de Rayanne ASSOUANE</li>
			</ul>

			<ul>
				<li><a href="https://github.com/Kous92/Projet-Web3D-X3DOM-Appartement"><i class="fab fa-github"></i></a></li>
				<li>Répertoire GitHub du projet</li>
			</ul>

			<ul>
				<li><a href="https://drive.google.com/drive/folders/1FVuHAXKIoUpLzD0m7jPP1tdNydqQUnTt"><i class="fab fa-google-drive"></i></a></li>
				<li>Répertoire Google Drive du projet</li>
			</ul>
		</div>

		<div class="about">
			<span id="date_heure"></span>
			<script type="text/javascript">window.onload = date_heure('date_heure');</script><p>Projet Web & 3D, copyright Team KCR, Janvier 2019, tous droits réservés.</p>
		</div>
	</div>
</body>
</html>