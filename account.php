<?php
    session_start();

    if (!isset($_SESSION['user_id']))
    {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" type="text/css" href="./CSS/account.css">
    <script type="text/javascript" src="./JS/navigation.js"></script>
    <script type="text/javascript" src="./JS/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./JS/ajax_account.js"></script>
    <title>Web & 3D</title>
</head>
<body>
<!-- The overlay -->
<div id="myNav" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <!-- Overlay content -->
    <div class="overlay-content">
        <a href="index.php">Accueil</a>
        <a href="logout.php">Déconnexion</a>
        <a href="about.php">À propos</a>
        <a href="visitor.php">Visiter l'appartement</a>
    </div>

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span id="open" class="open" onclick="openNav()">&#9776;</span>
<span class="logo"><img src="./CSS/kcr_estate_agency_logo.png" class="logo" height="150" width="100"></span>

<h1>Gestion de votre compte</h1>

<div class="container">
    <form action="" method="post">
        <label for="user_email" class="user_email">Adresse e-mail</label>
        <input type="text" id="user_email" name="user_email" value="<?php echo $_SESSION['user_id'] ?>">
        <p id="invalid_email"></p>

        <label for="nom" class="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        <p id="invalid_nom"></p>

        <label for="prenom" class="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">
        <p id="invalid_prenom"></p>

        <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token'] ?>">

        <input type="submit" name="update" id="update" value="Sauvegarder">
        <p id="response"></p>
    </form>
</div>

<div id="message_email">
    <h3>L'adresse email doit être valide:</h3>
    <p id="email_message" class="invalid">L'adresse email est de la forme nom@serveur.domaine</p>
</div>

<div id="message">
    <h3>Le mot de passe doit contenir au moins une fois les éléments suivants:</h3>
    <p id="letter" class="invalid">Une lettre <b>minuscule</b>.</p>
    <p id="capital" class="invalid">Une lettre <b>majuscule</b>.</p>
    <p id="number" class="invalid">Un <b>chiffre</b>.</p>
    <p id="length" class="invalid"><b>8 caractères</b> minimum.</p>
</div>
</body>
<script type="text/javascript" src="./JS/form_account.js"></script>
</html>