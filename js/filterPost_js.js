$(document).ready(function ()
{
    $("#filterP_button").click(function ()
    {
        var keyword= $("#keyword").val();
        var fDate = $("#fDate").val();
        var tDate = $("#tDate").val();
//alert(keyword+"\n"+fDate+"\n"+tDate);
        var isValid = true;

       
        if (isValid)
        {
            $.ajax({
                url: "filterPost.php",
                type: "post",
                data: {
                    'keyword': keyword,
                    'fDate':fDate,
                    'tDate':tDate
                },
                success: function (data) {
                    //$("#apc").html(data);
                    alert(data);
                },
                error: function () {}
            });
        }
    });

});

