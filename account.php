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
    <link rel="stylesheet" type="text/css" href="./CSS/login.css">
    <script type="text/javascript" src="./JS/navigation.js"></script>
    <script type="text/javascript" src="./JS/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('OK, formulaire activé.');

            $("#invalid_email").css("display", "none").html("");
            $("#invalid_password").css("display", "none").html("");

            // Listener au clic sur le bouton de connexion (submit)
            $("#login").on('click', function(e){
                e.preventDefault();

                var email = $("#usrname").val();
                console.log("Email saisi: " + $("#usrname").val());

                var password = $("#psw").val();
                console.log("Mot de passe saisi: " + $("#psw").val());

                if ((email === "") && (password === ""))
                {
                    $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
                    $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
                }
                else if (password === "")
                {
                    $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
                }
                else if (email === "")
                {
                    $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
                }
                else
                {
                    $("#invalid_email").css("display", "none").html("");
                    $("#invalid_password").css("display", "none").html("");

                    $.post('authentication.php', {
                        email_ajax: email,
                        password_ajax: password
                    }, function(data) {
                        if (data === 'Success')
                        {
                            // On redirige l'utilisateur
                            $("#response").html("Connexion réussie.");
                            window.location = "index.php";
                        }
                        else if (data === "NoUserExists")
                        {
                            $("#response").html("L'utilisateur n'existe pas.");
                        }
                        else if (data === "IncorrectPassword")
                        {
                            $("#response").html("Mot de passe incorrect.");
                        }
                        else
                        {
                            $("#response").html("La connexion a échoué.");
                        }
                    }, 'text');
                }
            })

            /*
            $('#submit').click(function () {
                var username = $('#uname').val();
                var password = $('#psw').val();
            })
            */
        })
    </script>
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
        <a href="#">Visiter l'appartement</a>
    </div>

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span id="open" class="open" onclick="openNav()">&#9776;</span>
<span class="logo"><img src="./CSS/kcr_estate_agency_logo.png" class="logo" height="150" width="100"></span>

<h1>Gestion de votre compte</h1>

<div class="container">
    <form action="" method="post">
        <label for="user_email" class="user_email">Adresse e-mail</label>
        <input type="text" id="user_email" name="user_email">
        <p id="invalid_email"></p>

        <label for="nom" class="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        <p id="invalid_nom"></p>

        <label for="prenom" class="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">
        <p id="invalid_prenom"></p>

        <input type="submit" name="save" id="save" value="Sauvegarder">
        <p id="response"></p>
    </form>
</div>

<div id="message">
    <h3>Le mot de passe doit contenir au moins une fois les éléments suivants:</h3>
    <p id="letter" class="invalid">Une lettre <b>minuscule</b>.</p>
    <p id="capital" class="invalid">Une lettre <b>majuscule</b>.</p>
    <p id="number" class="invalid">Un <b>chiffre</b>.</p>
    <p id="length" class="invalid"><b>8 caractères</b> minimum.</p>
</div>
</body>
<script type="text/javascript" src="./JS/form_login.js"></script>
</html>