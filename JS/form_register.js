var myInput = document.getElementById("psw");
var confirm = document.getElementById("psw_confirm");
var letter = document.getElementById("letter");
var letter2 = document.getElementById("letter2");
var capital = document.getElementById("capital");
var capital2 = document.getElementById("capital2");
var number = document.getElementById("number");
var number2 = document.getElementById("number2");
var length = document.getElementById("length");
var length2 = document.getElementById("length2");
var same = document.getElementById("same");

// When the user clicks on the password field, show the message box
myInput.onfocus = function()
{
    document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function()
{
    document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
myInput.onkeyup = function()
{
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;

    if (myInput.value.match(lowerCaseLetters))
    {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    }
    else
    {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    if (myInput.value.match(upperCaseLetters))
    {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    }
    else
    {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;

    if (myInput.value.match(numbers))
    {
        number.classList.remove("invalid");
        number.classList.add("valid");
    }
    else
    {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8)
    {
        length.classList.remove("invalid");
        length.classList.add("valid");
    }
    else
    {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
};

// When the user clicks on the password field, show the message box
confirm.onfocus = function()
{
    document.getElementById("message2").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
confirm.onblur = function()
{
    document.getElementById("message2").style.display = "none";
};

// When the user starts to type something inside the password field
confirm.onkeyup = function()
{
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;

    if (confirm.value.match(lowerCaseLetters))
    {
        letter2.classList.remove("invalid");
        letter2.classList.add("valid");
    }
    else
    {
        letter2.classList.remove("valid");
        letter2.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;

    if (confirm.value.match(upperCaseLetters))
    {
        capital2.classList.remove("invalid");
        capital2.classList.add("valid");
    }
    else
    {
        capital2.classList.remove("valid");
        capital2.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;

    if (confirm.value.match(numbers))
    {
        number2.classList.remove("invalid");
        number2.classList.add("valid");
    }
    else
    {
        number2.classList.remove("valid");
        number2.classList.add("invalid");
    }

    // Validate length
    if (confirm.value.length >= 8)
    {
        length2.classList.remove("invalid");
        length2.classList.add("valid");
    }
    else
    {
        length2.classList.remove("valid");
        length2.classList.add("invalid");
    }

    if (confirm.value === myInput.value)
    {
        same.classList.remove("invalid");
        same.classList.add("valid");
    }
    else
    {
        same.classList.remove("valid");
        same.classList.add("invalid");
    }
};