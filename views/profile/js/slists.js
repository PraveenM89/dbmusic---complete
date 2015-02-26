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

        var lid = $.trim($("#hiddenid").val());
        var rtext = $.trim($("#bandid").val());

        console.log(lid);
        $.post('/profile/addcontoplaylist',
        { listid : lid,rtext: rtext },
        function (data) {
            window.location.href = "/profile/slist/" + lid;
        });

    });

});