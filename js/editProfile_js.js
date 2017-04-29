$(document).ready(function() {

    $("#edit_button").click(function ()
    {
        var username = $("#exampleInputUsername").val();
        var password1 = $("#password").val();
        var password2 = $("#confirm-password").val();
        var desc = $("#about-you").val();
        var oPass = $("#original-password").val();
        var UID =  $("#UID").val();
        var errorM = "";
       var isValid = true;
        if (username === "")
        {
            isValid = false;
            errorM += "- Username is required!\n";
        } else if (username.length < 6 && username !== "")
        {
            isValid = false;
            errorM += "- Username should be longer than 6"
        }

        else
        {  
            $("#username").next().text("");
        }


//        if (password1 === "")
//        {
//            isValid = false;
//            errorM += "- Password is required!\n";
//        } else if (password1.length < 8 && password1 !== "")
//        {
//            isValid = false;
//            errorM += "- Password length is less than 8!\n";
//
//        } 
//        else
//        {
//            $("#password1").next().text("");
//        }
//
//
//        if (password2 === "")
//        {
//            isValid = false;
//            errorM += "- Re-enter your password!\n";
//        } else if (password2.length < 8 && password2 !== "")
//        {
//            isValid = false;
//                        errorM += "- Password length is less than 8!\n";
//        } 
//        else if (password1 !== password2)
//        {
//            isValid = false;
//                        errorM += "- Passwords didn't match!\n";
//
//        } else
//        {
//            $("#password2").next().text("");
//        }
        
        
        if (isValid)
        {
            $("#edit-form").submit();
//              $.ajax({
//                url: "processRegisteration.php",
//                type: "post",
//                data: {
//                    'exampleInputUsername': username,
//                    'exampleInputEmail':emailAddress,
//                    'password':password1,
//                    'confirm-password':password2,
//                    'gender':gender
//                },
//                success: function (data) {
////                    if(!data.inclues("html"))
////                    {alert(data);}
//                    alert(data);
//                    //else{
//                    //window.location.href='test.php';
//                //}
//                },
//                error: function () {}
//            });
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
