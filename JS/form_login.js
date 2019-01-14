var myInput = document.getElementById('psw');
var emailInput = document.getElementById('usrname');
var letter = document.getElementById('letter');
var capital = document.getElementById('capital');
var number = document.getElementById('number');
var length = document.getElementById('length');
var email = document.getElementById('email_message');

// When the user clicks on the password field, show the message box
myInput.onfocus = function ()
{
    document.getElementById('message').style.display = 'block';
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function ()
{
    document.getElementById('message').style.display = 'none';
};

// When the user starts to type something inside the password field
myInput.onkeyup = function ()
{
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;

    if (myInput.value.match(lowerCaseLetters))
    {
        letter.classList.remove('invalid');
        letter.classList.add('valid');
    }
    else
    {
      letter.classList.remove('valid');
      letter.classList.add('invalid');
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    if (myInput.value.match(upperCaseLetters))
    {
      capital.classList.remove('invalid');
      capital.classList.add('valid');
    }
    else
    {
      capital.classList.remove('valid');
      capital.classList.add('invalid');
    }

    // Validate numbers
    var numbers = /[0-9]/g;

    if (myInput.value.match(numbers))
    {
        number.classList.remove('invalid');
        number.classList.add('valid');
    }
    else
    {
        number.classList.remove('valid');
        number.classList.add('invalid');
    }

    // Validate length
    if (myInput.value.length >= 8)
    {
        length.classList.remove('invalid');
        length.classList.add('valid');
    }
    else
    {
        length.classList.remove('valid');
        length.classList.add('invalid');
    }
};

// When the user clicks on the email field, show the message box
emailInput.onfocus = function ()
{
    document.getElementById('message_email').style.display = 'block';
};

// When the user clicks outside of the password field, hide the message box
emailInput.onblur = function ()
{
    document.getElementById('message_email').style.display = 'none';
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