$(document).ready(function () {
    var flag = 0;

    $("#reviewclick").click(function () {
        if (flag == 0) {
            $(".reviewblock").show("slow");
            flag = 1;
        }
        else {
            $(".reviewblock").hide();
            flag = 0;
        }

    });

    $("#review-submit").click(function () {
        var hiddenid = $("#hiddenid").val();
        var rtext = $.trim($("#reviewtext").val());
        var rating = $("#rating").val();

        if (rtext == '') {
            rtext = 'No review';
        }

        $.post('/profile/newreview', { id: hiddenid, retext: rtext, rate: rating }, function (data) {

            $("#wholereviewbox").prepend(data);
            $("#submittedalert").show('slow');

        });
        $(".reviewblock").hide("slow");


    });

    $(".rsvptf").click(function () {
        var rsvpval = $(".rsvptf").val();
        var hiddenid = $("#hiddenid").val();
        if (rsvpval == 'RSVP-ed') {

            $.post('/profile/cancel', { id: hiddenid }, function (data) {
                $(".rsvptf").val('RSVP');
            });
        }
        else {
            $.post('/profile/plan', { id: hiddenid }, function (data) {
                $(".rsvptf").val('RSVP-ed');
            });

        }



    });

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

        var ctime = $.trim($("#eventtime").val());
        var cbandid = $.trim($("#bandid").val());
        var cvenid = $.trim($("#venueid").val());
        var cticket = $.trim($("#ticketprice").val());
        var curl = $.trim($("#conurl").val());
        var ctimearr = ctime.split('T');
        ctime = ctimearr[0] + ' ' + ctimearr[1] + ':00';
        $.post('/profile/newconcert', 
        { eventtime: ctime, bandid: cbandid, venueid: cvenid, rate: cticket, conurl: curl }, 
        function (data) {
             window.location.href = "/profile/concerts";
        });

    });


});

    