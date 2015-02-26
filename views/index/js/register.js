$(document).ready(function () {
    var perror = 0;
    var uerror = 0;
    $("#hit").click(function () {

        if ($("#hit:checked").length > 0) {
            $("#artistbox").show();
        } else {
            $("#artistbox").hide();
        }
    });

    $("#cpassword").blur(function () {
        perror = 0;
        var password1 = $.trim($("#password").val());
        var cpassword1 = $.trim($("#cpassword").val());
        if (password1 == cpassword1)
            $("#pwdmatchalert").hide();
        else {
            $("#pwdmatchalert").show('slow');
            perror = 1;
        }

    });

    $("#uname").blur(function () {
        uerror = 0;
        var uname1 = $.trim($("#uname").val());
        if (uname1 != '') {
            $.post('/index/getlogin', { name: uname1, pass: '' }, function (data) {

                if (data == 1) {
                    $("#userexistalert").show("slow");
                    uerror = 1;
                }
                else {
                    $("#userexistalert").hide();
                }
            });
        }

    });


    $("#fregister").submit(function (event) {


        var name1 = $.trim($("#name").val());
        var uname1 = $.trim($("#uname").val());
        var dob1 = $.trim($("#dob").val());
        var email1 = $.trim($("#email").val());
        var password1 = $.trim($("#password").val());
        var cpassword = $.trim($("#cpassword").val());
        var city1 = $.trim($("#city").val());
        if (name1 == '' || email1 == '' || password1 == '' || cpassword == '' || uname1 == '' || dob1 == '' || city1 == '') {
            event.preventDefault();

            alert("Fill all the fields marked with '*'");

        } else if ((password1.length) < 8) {
            event.preventDefault();

            alert("Password should atleast 8 character in length...!!!!!!");
        }
        else if(perror != 0 || uerror != 0){
            event.preventDefault();
        }
    });
});