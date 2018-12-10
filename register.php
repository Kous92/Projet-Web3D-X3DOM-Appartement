<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="./CSS/login.css">
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

    <div class="container">
        <form action="#" method="post">
            <label for="usrname" class="user_email">Adresse e-mail</label>
            <input type="text" id="usrname" name="usrname" required>

            <label for="psw" class="user_password">Mot de passe</label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <label for="psw_confirm" class="user_password_confirm">Confirmez le mot de passe</label>
            <input type="password" id="psw_confirm" name="psw_confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <input type="submit" value="Connexion">
        </form>
    </div>

    <div id="message">
        <h3>Le mot de passe doit contenir au moins une fois les éléments suivants:</h3>
        <p id="letter" class="invalid">Une lettre <b>minuscule</b>.</p>
        <p id="capital" class="invalid">Une lettre <b>majuscule</b>.</p>
        <p id="number" class="invalid">Un <b>chiffre</b>.</p>
        <p id="length" class="invalid"><b>8 caractères</b> minimum.</p>
    </div>
    <?php
    if (isset($_POST['usrname']) && isset($_POST['psw']))
    {

    }
    ?>
</body>
<script type="text/javascript" src="./JS/form_login.js"></script>
</html>