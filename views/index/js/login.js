$(document).ready(function () {
    $("#submit").click(function () {
        event.preventDefault();
        $("#warning").hide();
        $("usernotexist").hide();
        var uname = $("#uname").val().trim();
        var pwd = $("#password").val().trim();
        if (uname == '' || pwd == '') {
            
            $("#warning").show("slow");

        } else {
            $.post('/index/checklogin', { name: uname, pass: pwd }, function (data) {
                if (data == 0) {
                    
                    $("#usernotexist").show("slow");
                }
                else {
                    location.href = "/profile";

                }
            });

        }
    });
});
    

