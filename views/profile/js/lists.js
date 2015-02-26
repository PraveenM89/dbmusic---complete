$(document).ready(function () {
    var flag = 0;
    $("#concert-click").click(function () {

        if (flag == 0) {
            $("#addconcert").show('slow');
            flag = 1;
        }
        else {
            $("#addconcert").hide();
            flag = 0;
        }


    });

    $("#concertnewsubmit").click(function () {

        var rtext = $.trim($("#ticketprice").val());
        
        
        $.post('/profile/insertlist', 
        { rtext:rtext}, 
        function (data) {
             window.location.href = "/profile/lists";
        });

    });

});