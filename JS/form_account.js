var emailInput = document.getElementById("user_email");
var email = document.getElementById('email_message');

// When the user clicks on the password field, show the message box
emailInput.onfocus = function()
{
    document.getElementById("message_email").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
emailInput.onblur = function()
{
    document.getElementById("message_email").style.display = "none";
};

// When the user starts to type something inside the password field
emailInput.onkeyup = function ()
{
    // REGEX ultra complet pour l'email
    var emailCharacters = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

    if (emailInput.value.match(emailCharacters))
    {
        email.classList.remove('invalid');
        email.classList.add('valid')
    }
    else
    {
        email.classList.remove('valid');
        email.classList.add('invalid');
    }
};