$(document).ready(function () {

    var flag = 0;
    var flag1 = 0;
    $("#changepasswordsubmit").click(function () {
        var passval = $.trim($("#passwordnewvalue").val());
        var cpassval = $.trim($("#cpasswordnewvalue").val());
        if (passval == '' || cpassval == '' || passval != cpassval)
            $("#alerttext").show('slow');
        else {
            $.post('/profile/changepassword', { pass: passval }, function (data) {
                window.location.href = "/index/success";

            });
        }



    });

    $("#changepasswordclick").click(function () {
        if (flag == 0) {
            $("#passworddetails").show();
            flag = 1;
        }
        else {
            $("#passworddetails").hide();
            flag = 0;
        }

    });

    

    $("#addcategory").click(function () {
        var catid = $("#newcategory").val();
        window.location.href = "/profile/adduserlikes/" + catid;

    });


});