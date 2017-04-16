$(document).ready(function ()
{
    $("#login_button").click(function ()
    {
        var username = $("#username").val();
        var password = $("#password").val();
        var isValid = true;
        if (username === "")
        {
            isValid = false;
            $("#username").next().text("This field is requied.");
        } else if (username.length < 6 && username !== "")
        {
            isValid = false;
            $("#username").next().text("Length is less than 6.");
        } else if (validateInput(username) === false && username.length >= 6 && username !== "")
        {
            isValid = false;
            $("#username").next().text("Invalid Input!");
        } else
        {
            $("#username").next().text("");
        }

        if (password === "")
        {
            isValid = false;
            $("#password").next().text("This field is requied.");
        } else if (password.length < 8 && password !== "")
        {
            isValid = false;
            $("#password").next().text("Length is less than 8.");
        } else if (validateInput(password) === false && password.length >= 8 && password !== "")
        {
            isValid = false;
            $("#password").next().text("Invalid Input!");
        } else
        {
            $("#password").next().text("");
        }

        if (isValid)
        {
            $("#login_form").submit();
        }
    });

});

function validateInput(str) {
    var regex = new RegExp("[a-zA-Z0-9]");
    var valid = true;
    var i = 0;
    while (i < str.length && valid === true)
    {
        valid = regex.test(str.charAt(i));
        i++;
    }
    return valid;
}
