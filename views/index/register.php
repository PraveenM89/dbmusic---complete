<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Music Store : New User</title>
        <script src="/library/jquery.js"></script>
        <script src="/views/index/js/register.js"></script>
        <link type="text/css" href="/views/index/css/register.css" rel="stylesheet" />


    </head>

    <body>

        <div class="header">
            <div class="wrapper">
                
                <div class="title" style="padding-left: 100px">MusicBook</div>

            </div>
        </div>
        <div id="middle">
            <div id="heading">
                <h3 style="text-align: center;padding-top: 5px;">REGISTRATION FORM</h3>
            </div>
            <div id="reg_main">
                
                <form id="fregister" name="regform" method="post" action="/profile/newuser" >


                    <div id="abc">

                        <div id="namebox" style="margin-top: 5px; ">
                            <label style="float: left; width:300px">Name :</label>
                            <input class="details" type="text" name="rname" id="name"></br>
                        </div>
                        <div id="unamebox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">Username :</label>
                            <input class="details" type="text" name="runame" id="uname"></br>
                        </div>
                        <div id="userexistalert" style="width:85%; display:none; text-align: right; color: #f00">
                                Username not available!!!
                        </div>
                        <div id="dobbox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">Date of Birth :</label>
                            <input class="details" type="date" name="dob" id="dob"></br>
                        </div>
                        <div id="emailbox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">Email :</label>
                            <input type="text" class="details" name="remail" id="email"></br>
                        </div>
                        <div id="pwdbox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">Password :</label>
                            <input type="password" class="details" name="password" id="password">
                        </div>
                        <div id="cpwdbox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">Confirm Password :</label>
                            <input type="password" class="details" name="cpassword" id="cpassword">
                        </div>
                        <div id="pwdmatchalert" style="width:85%; display:none; text-align: right; color: #f00">
                                    Password doesnt match !!!
                        </div>
                        <div id="checkboxx" style="margin: 5px 0 9px 0">
                            <label for="usertype">Are You an Artist?   </label>
                            <input type="checkbox" id="hit" value="y" name="usertype" />Yes
                        </div>
                        <div id="artistbox" style="display: None">
                            <div id="bandbox">
                                <label style="float: left; width:300px">Band :</label>
                                <select name="band" class="details">
                                    <?php
                                         foreach ($this->bandarray as $value) {
                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                            
                            <div id="urlbox" style="margin-top: 5px;">
                                <label style="float: left; width:300px">Url :</label>
                                <input class="details" type="text" name="rurl" id="url" placeholder="Enter the url">
                            </div>
                        </div>
                        <div id="citybox" style="margin-top: 5px;">
                            <label style="float: left; width:300px">City :</label>
                            <input class="details" type="text" name="rcity" id="city">
                        </div>
                        <div id="buttons" style="padding-top: 10px" style="margin-top: 5px;">

                            <input type="submit" name="register" id="register" value="Register">

                            <a href="/index">
                                <input type="button" name="back" id="back" value="Back">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </body>


</html>
