$(document).ready(function ()
{
    $("#filterC_button").click(function ()
    {
        var keyword= $("#kw").val();
        var postID = $("#PID").val();

//alert(keyword+"\n"+fDate+"\n"+tDate);
        var isValid = true;

       
        if (isValid)
        {
            $.ajax({
                url: "filterComment.php",
                type: "post",
                data: {
                    'keyword': keyword,
                    'PID':postID
                },
                success: function (data) {
                    $("#comment_area").html(data);
                    //alert(data);
                },
                error: function () {}
            });
        }
    });

});

