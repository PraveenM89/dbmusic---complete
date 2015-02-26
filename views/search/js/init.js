$(document).ready(function () {

    $('#searchchoice').on('change', function () {
        $("#usercontent").hide();
        $("#concertcontent").hide();
        $("#artistcontent").hide();
        $(".userdata").empty();

        $("#artistsearch").hide();
        $("#usersearch").hide();
        $("#concertsearch").hide();

        if ($("#searchchoice").val() == ' ') {
            $("#artistsearch").hide();
            $("#usersearch").hide();
            $("#concertsearch").hide();
        }
        else if ($("#searchchoice").val() == 'concert') {
            $("#artistsearch").hide();
            $("#usersearch").hide();
            $("#concertsearch").show('slow');
        }
        else if ($("#searchchoice").val() == 'artist') {
            $("#artistsearch").show('slow');
            $("#usersearch").hide();
            $("#concertsearch").hide();
        }

        else if ($("#searchchoice").val() == 'user') {
            $("#artistsearch").hide();
            $("#usersearch").show('slow');
            $("#concertsearch").hide();
        }
    });

    $("#concertsearchsubmit").click(function () {
        $(".userdata").empty();
        var bid;
        var vid;
        var amount;
        var filterval;
        if ($("#concertbandchoice").val() == ' ')
            bid = 'IS NOT NULL';
        else
            bid = "= " + "'" + $("#concertbandchoice").val() + "'";

        if ($("#concertvenuechoice").val() == ' ')
            vid = 'IS NOT NULL';
        else
            vid = "= " + "'" + $("#concertvenuechoice").val() + "'";

        if ($.trim($("#concertamountchoice").val()) == '')
            amount = ' ';
        else
            amount = $.trim($("#concertamountchoice").val());

        filterval = $('input:radio[name=moneyradiofilter]:checked').val();

        $.post('/search/searchconcert', { bandid: bid, venueid: vid, ticket: amount, filter: filterval }, function (data) {

            $("#concertcontent").show('slow');
            $("#concertcontent").append(data);
            alert('done');
        });

    });



    $("#artistsearchsubmit").click(function () {
        $(".userdata").empty();
        var bid = $("#artistbandchoice").val();
        if (bid == ' ')
            bid = 'IS NOT NULL';
        else
            bid = "= " + "'" + bid + "'";

        var aname = $.trim($("#artistnamefilter").val());
        if (aname == '') aname = ' ';


        $.post('/search/searchartist', { bandid: bid, artistname: aname }, function (data) {

            $("#artistcontent").show('slow');
            $("#artistcontent").append(data);

        });

    });

    $("#usersearchsubmit").click(function () {
        $(".userdata").empty();
        var cid = $("#usercategorychoice").val();
        if (cid == ' ')
            cid = 'IS NOT NULL';
        else
            cid = "= " + "'" + cid + "'";

        var uname = $.trim($("#usernamefilter").val());
        if (uname == '') uname = ' ';


        $.post('/search/searchuser', { catid: cid, username: uname }, function (data) {

            $("#usercontent").show('slow');
            $("#usercontent").append(data);

        });

    });

});

function btn_click(e) {
    id = $(e).data("id");
    
    
    if ($(e).val() == '  Fan  ') {
        $.post('/search/followartist', { aid: id }, function (data) {
            
            if (data == 1) {
                $(e).val(' Un-fan ');
            }

        });
    }

    if ($(e).val() == '  Un-fan  ') {
        $.post('/search/unfollowartist', { aid: id }, function (data) {

            if (data == 1) {
                $(e).val('  Fan  ');
            }

        });
    }

    
}

function btnf_click(e) {
    id = $(e).data("id");
    
    
    if ($(e).val() == '  Follow  ') {
        $.post('/search/followuser', { uid: id }, function (data) {
            
            if (data == 1) {
                $(e).val(' Unfollow ');
            }

        });
    }

    if ($(e).val() == '  Unfollow  ') {
        
        $.post('/search/unfollowuser', { uid: id }, function (data) {
            console.log(data);
            if (data == 1) {
                $(e).val('  Follow  ');
            }

        });
    }

    
}