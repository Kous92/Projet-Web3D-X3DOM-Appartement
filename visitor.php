<?php
    session_start();
    date_default_timezone_set("Europe/Paris");

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="stylesheet" type="text/css" href="./CSS/agency.css">
    <script type="text/javascript" src="./JS/navigation.js"></script>
    <script type="text/javascript" src="./JS/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="./JS/date_heure.js"></script>
    <script type='text/javascript' src='./JS/x3dom.js'></script>
    <script type="text/javascript" src="./JS/visitor.js"></script>
    <link rel='stylesheet' type='text/css' href='./CSS/x3dom.css'/>
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
        <a href="logout.php">Déconnexion</a>
        <a href="about.php">À propos</a>
        <a href="account.php">Gestion du compte</a>
    </div>

</div>

<!-- Use any element to open/show the overlay navigation menu -->
<span id="open" class="open" onclick="openNav()">&#9776;</span>
<span class="logo"><img src="./CSS/kcr_estate_agency_logo.png" class="logo" height="150" width="100"></span>
<h1 id="title">Visite virtuelle</h1>

<!--
<div style="margin-left: 550px">
    <input type="button" id="button_Inside" value="Inside view" onclick="View(1)"/>
    <input type="button" id="button_Outside" value="Outside view" onclick="View(0)"/>
</div>
!-->

<div class="container">
    <h1 id="sub_title">Début de la visite: <?php echo date("d/m/Y") . " à " . date("H:i:s") ?> </h1>

    <div class="about">
        <span id="date_heure"></span>
        <script type="text/javascript">window.onload = date_heure('date_heure');</script><p>Projet Web & 3D, copyright Team KCR, Janvier 2019, tous droits réservés.</p>
    </div>
</div>

<x3d id="x3d_building">
    <ul id="x3d_buttons">
        <li><input type="button" id="button_Inside" value="Vue sur l'appartement" onclick="View(1)"/></li>
        <li><input type="button" id="button_Outside" value="Vue sur le bâtiment" onclick="View(0)"/></li>
    </ul>
    <scene>
        <Switch whichChoice="0" id="building">
            <inline url="Model.x3d"></inline> <!-- L'appartement -->
            <inline url="flat.x3d"></inline> <!-- Le bâtiment -->
        </Switch>
    </scene>
</x3d>

</body>
</html>
