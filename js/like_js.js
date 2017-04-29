$(document).ready(function ()
{
    $("#like_button").click(function ()
    {
        var no_like = $("#No_like").val();
        var userID = $("#UID").val();
        var postID = $("#PID").val();
        var loggedIn = $("#loggedIn").val();;
//alert(no_like+"\n"+postID+"\n"+userID+"\n"+loggedIn);

       
        if (loggedIn === "1")
        {
            //alert("here");
            $.ajax({
                url: "rating_like.php",
                type: "post",
                data: {
                    'no_like': no_like,
                    'UID':userID,
                    'PID':postID
                },
                success: function (data) {
                    $("#like_button").html(data);
                    //alert(data);
                },
                error: function () {
                    alert("fail");
                }
            });
        }
    });

});
