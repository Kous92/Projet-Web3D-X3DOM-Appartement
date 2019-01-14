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
            $("#usrname").css("border", "2px solid #FE2300");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else if (password === "")
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
            $("#usrname").css("border", "2px solid #01DFD7");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else if (email === "")
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_password").css("display", "none").html("");
            $("#usrname").css("border", "2px solid #FE2300");
            $("#psw").css("border", "2px solid #01DFD7");
        }
        else
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_password").css("display", "none").html("");
            $("#usrname").css("border", "2px solid #01DFD7");
            $("#psw").css("border", "2px solid #01DFD7");

            $.post('authentication.php', {
                email_ajax: email,
                password_ajax: password
            }, function(data) {

                console.log(data);

                if (data === 'Success')
                {
                    // On redirige l'utilisateur
                    $("#response").html("Connexion réussie.");
                    window.location = "home.php";
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
});