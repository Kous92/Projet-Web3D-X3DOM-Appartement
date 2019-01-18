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
        $("#invalid_password").css("display", "none").html("");
        $("#psw").css("border", "2px solid #01DFD7");

        return true;
    }
    else
    {
        if (password === "")
        {
            $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
            $("#psw").css("border", "2px solid #FE2300");
        }
        else
        {
            $("#invalid_password").css("display", "block").html("Le format du mot de passe est invalide");
            $("#psw").css("border", "2px solid #FE2300");
        }

        return false;
    }
}

function verfierFormatEmail(email)
{
    // Caractères autorisés et format valide
    var emailCharacters = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

    if (email.match(emailCharacters))
    {
        $("#invalid_email").css("display", "none").html("");
        $("#usrname").css("border", "2px solid #01DFD7");

        return true;
    }
    else
    {
        if (email === "")
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");;
            $("#usrname").css("border", "2px solid #FE2300");
        }
        else
        {
            $("#invalid_email").css("display", "block").html("L'adresse e-mail est invalide");
            $("#usrname").css("border", "2px solid #FE2300");
        }

        return false;
    }
}

function verfierFormatMotDePasseConfirmation(password, password_confirm)
{
    if (verfierFormatMotDePasse(password) && (password === password_confirm))
    {
        $("#invalid_password_confirm").css("display", "none").html("");
        $("#psw_confirm").css("border", "2px solid #01DFD7");

        return true;
    }
    else
    {
        if (password_confirm === "")
        {
            $("#invalid_password_confirm").css("display", "block").html("Ce champ est obligatoire");
            $("#psw_confirm").css("border", "2px solid #FE2300");
        }
        else
        {
            $("#invalid_password_confirm").css("display", "block").html("Les 2 mots de passe sont différents");
            $("#psw_confirm").css("border", "2px solid #FE2300");
        }

        return false;
    }
}

$(document).ready(function() {
    console.log('OK, formulaire activé.');
    $("#invalid_email").css("display", "none").html("");
    $("#invalid_password").css("display", "none").html("");
    $("#invalid_password_confirm").css("display", "none").html("");
    $("#usrname").css("border", "2px solid #01DFD7");
    $("#psw").css("border", "2px solid #01DFD7");
    $("#psw_confirm").css("border", "2px solid #01DFD7");

    // Listener au clic sur le bouton de connexion (submit)
    $("#register").on('click', function(e){
        e.preventDefault();

        var email = $("#usrname").val();
        console.log("Email saisi: " + $("#usrname").val());

        var password = $("#psw").val();
        console.log("Mot de passe saisi: " + $("#psw").val());

        var password_confirm = $("#psw_confirm").val();
        console.log("Mot de passe de confirmation saisi: " + $("#psw_confirm").val());

        var email_valide = verfierFormatEmail(email);
        var mdp_valide = verfierFormatMotDePasseConfirmation(password, password_confirm);

        // Vérification du formulaire
        if ((mdp_valide === true) && (email_valide === true))
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_password").css("display", "none").html("");
            $("#invalid_password_confirm").css("display", "none").html("");
            $("#usrname").css("border", "2px solid #01DFD7");
            $("#psw").css("border", "2px solid #01DFD7");
            $("#psw_confirm").css("border", "2px solid #01DFD7");

            $.post('registration.php', {
                email_ajax: email,
                password_ajax: password,
                password_confirm_ajax: password_confirm
            }, function(data) {
                if (data === 'Success')
                {
                    $("#psw").css("display", "none");
                    $("#psw_confirm").css("display", "none");
                    $("#usrname").css("display", "none");
                    $(".user_email").css("display", "none");
                    $(".user_password").css("display", "none");
                    $(".user_password_confirm").css("display", "none");
                    $("#register").css("display", "none");
                    $("#response").css("font-size", "25px").html("Votre compte a été créé avec succès.");
                }
                else if (data === "UserExists")
                {
                    $("#response").html("Erreur, un compte existe déjà avec cette adresse e-mail.");
                }
                else
                {
                    $("#response").html("L'inscription a échoué.");
                }
            }, 'text');
        }
        else
        {
            $("#response").html("Erreur dans le formulaire.");
        }
    })
});