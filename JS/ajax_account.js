$(document).ready(function() {
    console.log('Récupération des données du compte.');

    var email = "";
    var prenom = "";
    var nom = "";
    var token = "";

    $.post('Utilisateur.php', {
        account_ajax: true
    }, function(data) {
        console.log(data);
    }, 'text');

    // Listener au clic sur le bouton de connexion (submit)
    $("#update").on('click', function(e){
        e.preventDefault();

        email = $("#user_email").val();
        console.log("Email saisi: " + $("#user_email").val());

        token = $("#token").val();
        console.log("Token: " + $("#token").val());

        nom = $("#nom").val();
        console.log("Nom: " + $("#nom").val());

        prenom = $("#prenom").val();
        console.log("Prenom: " + $("#prenom").val());

        if ((email === "") && (nom === "") && (prenom === ""))
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_nom").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_prenom").css("display", "block").html("Ce champ est obligatoire");
            $("#user_email").css("border", "2px solid #FE2300");
            $("#nom").css("border", "2px solid #FE2300");
            $("#prenom").css("border", "2px solid #FE2300");
        }
        else if ((email === "") && (nom === ""))
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_nom").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_prenom").css("display", "none").html("");
            $("#user_email").css("border", "2px solid #FE2300");
            $("#nom").css("border", "2px solid #FE2300");
            $("#prenom").css("border", "2px solid #01DFD7");
        }
        else if ((email === "") && (prenom === ""))
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_nom").css("display", "none").html("");
            $("#invalid_prenom").css("display", "block").html("Ce champ est obligatoire");
            $("#user_email").css("border", "2px solid #FE2300");
            $("#nom").css("border", "2px solid #01DFD7");
            $("#prenom").css("border", "2px solid #FE2300");
        }
        else if ((prenom === "") && (nom === ""))
        {
            $("#invalid_email").css("display", "nom").html("");
            $("#invalid_nom").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_prenom").css("display", "block").html("Ce champ est obligatoire");
            $("#user_email").css("border", "2px solid #01DFD7");
            $("#nom").css("border", "2px solid #FE2300");
            $("#prenom").css("border", "2px solid #FE2300");
        }
        else if (nom === "")
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_nom").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_prenom").css("display", "none").html("");
            $("#user_email").css("border", "2px solid #01DFD7");
            $("#nom").css("border", "2px solid #FE2300");
            $("#prenom").css("border", "2px solid #01DFD7");
        }
        else if (prenom === "")
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_nom").css("display", "none").html("");
            $("#invalid_prenom").css("display", "block").html("Ce champ est obligatoire");
            $("#user_email").css("border", "2px solid #01DFD7");
            $("#nom").css("border", "2px solid #01DFD7");
            $("#prenom").css("border", "2px solid #FE2300");
        }
        else if (email === "")
        {
            $("#invalid_email").css("display", "block").html("Ce champ est obligatoire");
            $("#invalid_nom").css("display", "none").html("");
            $("#invalid_prenom").css("display", "none").html("");
            $("#user_email").css("border", "2px solid #FE2300");
            $("#nom").css("border", "2px solid #01DFD7");
            $("#prenom").css("border", "2px solid #01DFD7");
        }
        else
        {
            $("#invalid_email").css("display", "none").html("");
            $("#invalid_nom").css("display", "none").html("");
            $("#invalid_prenom").css("display", "none").html("");
            $("#user_email").css("border", "2px solid #01DFD7");
            $("#nom").css("border", "2px solid #01DFD7");
            $("#prenom").css("border", "2px solid #01DFD7");

            $.post('Utilisateur.php', {
                ajax_account: false,
                ajax_update: true,
                token: token,
                nom: nom,
                prenom: prenom,
                email: email
            }, function(data) {
                console.log(data);
            }, 'text');
        }
    })
});