function verfierFormatMotDePasse(password)
{
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    // Validate numbers
    var numbers = /[0-9]/g;

    if ((password.match(lowerCaseLetters)) && (password.match(upperCaseLetters)) && (password.match(numbers)) && (password.length >= 8))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function verfierFormatEmail(email)
{
    // Caractères autorisés et format valide
    var emailCharacters = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

    if (email.match(emailCharacters))
    {
        return true;
    }
    else
    {
        return false;
    }
}

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
        else if ((!verfierFormatEmail(email)) && (!verfierFormatMotDePasse(password)))
        {
            $("#invalid_email").css("display", "block").html("L'adresse email est invalide");
            $("#invalid_password").css("display", "block").html("Le format du mot de passe est invalide");
            $("#usrname").css("border", "2px solid #FE2300");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else if ((!verfierFormatEmail(email)) && (password === ""))
        {
            $("#invalid_email").css("display", "block").html("L'adresse email est invalide");
            $("#invalid_password").css("display", "none").html("Ce champ est obligatoire");
            $("#usrname").css("border", "2px solid #FE23000");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else if ((!verfierFormatMotDePasse(password)) && (email === ""))
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_password").css("display", "block").html("Le format du mot de passe est invalide");
            $("#usrname").css("border", "2px solid #01DFD7");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else
        {
            if ((verfierFormatEmail(email)) && (verfierFormatMotDePasse(password)))
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
            else
            {
                $("#response").html("Erreur dans le formulaire.");
            }
        }
    })
});