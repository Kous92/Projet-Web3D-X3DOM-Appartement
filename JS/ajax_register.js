$(document).ready(function() {
    console.log('OK, formulaire activé.');

    // Listener au clic sur le bouton de connexion (submit)
    $("#register").on('click', function(e){
        e.preventDefault();

        $("#invalid_email").css("display", "none").html("");
        $("#invalid_password").css("display", "none").html("");
        $("#invalid_password_confirm").css("display", "none").html("");

        var email = $("#usrname").val();
        console.log("Email saisi: " + $("#usrname").val());

        var password = $("#psw").val();
        console.log("Mot de passe saisi: " + $("#psw").val());

        var password_confirm = $("#psw_confirm").val();
        console.log("Mot de passe de confirmation saisi: " + $("#psw_confirm").val());

        if ((email === "") && (password === "") && (password_confirm === ""))
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_password_confirm").css("display", "block").html("Ce champ est obligatoire");
        }
        else if (password === "")
        {
            $("#invalid_password").css("display", "block").html("Ce champ est obligatoire");
        }
        else if (password_confirm === "")
        {
            $("#invalid_password_confirm").css("display", "block").html("Ce champ est obligatoire");
        }
        else if (password !== password_confirm)
        {
            $("#invalid_password_confirm").css("display", "block").html("Erreur: les 2 mots de passe sont différents");
        }
        else
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_password").css("display", "none").html("");
            $("#invalid_password_confirm").css("display", "none").html("");


            $.post('registration.php', {
                email_ajax: email,
                password_ajax: password,
                password_confirm_ajax: password_confirm
            }, function(data) {
                if (data === 'Success')
                {
                    $("#response").html("Votre compte a été créé avec succès.");
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
    })
});