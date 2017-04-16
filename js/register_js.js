$(document).ready(function() {

    $("#register_button").click(function ()
    {
        var emailAddress = $("#exampleInputEmail").val();
        var username = $("#exampleInputUsername").val();
        var password1 = $("#password").val();
        var password2 = $("#confirm-password").val();
        var gender = $("#gender").val();
        var errorM = "";
       var isValid = true;
        if (username === "")
        {
            isValid = false;
            errorM += "- Username is required!\n";
            //$("#username").next().text("This field is requied.");
        } else if (username.length < 6 && username !== "")
        {
            isValid = false;
            errorM += "- Username should be longer than 6"
            //$("#username").next().text("Length is less than 6.");
        }
//         else if (validateInput(username) === false && username.length >= 6 && username !== "")
//        {
//            isValid = false;
//            $("#username").next().text("Invalid Input!");
//        } 
        else
        {  
            $("#username").next().text("");
        }


        if (emailAddress === "")
        {
            isValid = false;
            errorM += "- Email address is required!\n";
            //$("#email_address").next().text("This field is requied.");
        } 
        else if (emailAddress !== "" && validateEmail(emailAddress) === false)
        {
            isValid = false;
            errorM += "- Your email address is invalid!\n";

            //$("#email_address").next().text("Invalid input");
        } else
        {
            $("#email_address").next().text("");
        }


        if (password1 === "")
        {
            isValid = false;
            errorM += "- Password is required!\n";

            //$("#password1").next().text("This field is requied.");
        } else if (password1.length < 8 && password1 !== "")
        {
            isValid = false;
            errorM += "- Password length is less than 8!\n";

            //$("#password1").next().text("Length is less than 8.");
        } 
//        else if (validateInput(password1) === false && password1.length >= 8 && password1 !== "")
//        {
//            isValid = false;
//            $("#password1").next().text("Invalid Input!");
//        } 
        else
        {
            $("#password1").next().text("");
        }


        if (password2 === "")
        {
            isValid = false;
            errorM += "- Re-enter your password!\n";

            //$("#password2").next().text("This field is requied.");
        } else if (password2.length < 8 && password2 !== "")
        {
            isValid = false;
                        errorM += "- Password length is less than 8!\n";

            //$("#password2").next().text("Length is less than 8.");
        } 
//        else if (validateInput(password2) === false && password2.length >= 8 && password2 !== "")
//        {
//            isValid = false;
//            $("#password2").next().text("Invalid Input!");
//        } 
        else if (password1 !== password2)
        {
            isValid = false;
                        errorM += "- Passwords didn't match!\n";

//            $("#password2").next().text("Password doesn't match!");
        } else
        {
            $("#password2").next().text("");
        }
        
        if(gender === "")
        {
            isValid = false;
            errorM += "- Gender is required!\n";
        }
        else if((gender !== "MALE" || gender !== "FEMALE") && gender !== "")
        {
            
            isValid = false;
            errorM += "- Please check your gender!\n";
        }
        else
        {
            $("#gender").next().text("");
        }
        
        if (isValid)
        {
            //$("#register-form").submit();
              $.ajax({
                url: "processRegisteration.php",
                type: "post",
                data: {
                    'exampleInputUsername': username,
                    'exampleInputEmail':emailAddress,
                    'password':password1,
                    'confirm-password':password2,
                    'gender':gender
                },
                success: function (data) {
                   alert(data);
                    //window.location.href='adminOrder.php';
                },
                error: function () {}
            });
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
