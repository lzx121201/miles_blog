$(document).ready(function ()
{
    $("#comment_button").click(function ()
    {
        var comment = $("#comment").val();
        var userID = $("#UID").val();
        var postID = $("#PID").val();
//alert(comment+"\n"+postID+"\n"+userID);
        var isValid = true;

       
        if (isValid)
        {
            $.ajax({
                url: "addComment.php",
                type: "post",
                data: {
                    'comment': comment,
                    'UID':userID,
                    'PID':postID
                },
                success: function (data) {
                    $("#comment_area").html(data);
                },
                error: function () {}
            });
        }
    });

});

