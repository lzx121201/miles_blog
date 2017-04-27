$(document).ready(function ()
{
    $("#login_button").click(function ()
    {
        var username = $("#user").val();
        var password = $("#pass").val();
        var isValid = true;
                var errorM = "";

       if (username === "")
        {
            isValid = false;
            errorM += "- Email address is required!\n";
        } 
        else if (username !== "" && validateEmail(username) === false)
        {
            isValid = false;
            errorM += "- Your email address is invalid!\n";
        } else
        {
            $("#user").next().text("");
        }

        if (password === "")
        {
            isValid = false;
            errorM += "- Password is required!\n";
        } else if (password.length < 8 && password !== "")
        {
            isValid = false;
            errorM += "- Password length is less than 8!\n";
        } 
        else
        {
            $("#pass").next().text("");
        }
        
        if (isValid)
        {
            $("#login-form").submit();
        }
        else
        {
            alert(errorM);
            
        }
    });

});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

