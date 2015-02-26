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

        var rtext = $.trim($("#reviewtext").val());
        var raccess = $.trim($("#access").val());
        
        $.post('/profile/newpost', 
        { rtext:rtext, raccess: raccess}, 
        function (data) {
             window.location.href = "/profile/posts";
        });

    });

});