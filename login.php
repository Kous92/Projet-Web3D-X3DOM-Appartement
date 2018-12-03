<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="./CSS/login.css">
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

	<h1>Connexion</h1>

	<div class="container">
	  <form action="#" method="post">
	    <label for="usrname" class="user_email">Adresse e-mail</label>
	    <input type="text" id="usrname" name="usrname" required>

	    <label for="psw" class="user_password">Mot de passe</label>
	    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
	    
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

	var myInput = document.getElementById("psw");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");

	

	// When the user clicks on the password field, show the message box
	myInput.onfocus = function() {
	    document.getElementById("message").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInput.onblur = function() {
	    document.getElementById("message").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
	  // Validate lowercase letters
	  var lowerCaseLetters = /[a-z]/g;
	  if(myInput.value.match(lowerCaseLetters)) {  
	    letter.classList.remove("invalid");
	    letter.classList.add("valid");
	  } else {
	    letter.classList.remove("valid");
	    letter.classList.add("invalid");
	  }
	  
	  // Validate capital letters
	  var upperCaseLetters = /[A-Z]/g;
	  if(myInput.value.match(upperCaseLetters)) {  
	    capital.classList.remove("invalid");
	    capital.classList.add("valid");
	  } else {
	    capital.classList.remove("valid");
	    capital.classList.add("invalid");
	  }

	  // Validate numbers
	  var numbers = /[0-9]/g;
	  if(myInput.value.match(numbers)) {  
	    number.classList.remove("invalid");
	    number.classList.add("valid");
	  } else {
	    number.classList.remove("valid");
	    number.classList.add("invalid");
	  }
	  
	  // Validate length
	  if(myInput.value.length >= 8) {
	    length.classList.remove("invalid");
	    length.classList.add("valid");
	  } else {
	    length.classList.remove("valid");
	    length.classList.add("invalid");
	  }
	}
</script>
</html>