
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Music book : Login </title>

        <script src="/library/jquery.js"></script>
        <script src="/views/index/js/login.js"></script>
        <link type="text/css" href="/views/index/css/login.css" rel="stylesheet" />
      

    </head>
    <body>
        <div class="header">
            <div class="wrapper">
                
                <div class="title" style="padding-left: 100px">MusicBook</div>

            </div>
        </div>
        <div id="whole">

            <div id="lformouter">

                <div id="lform">
                    <h3> WELCOME TO MUSICBOOK </h3>
                    <h2>Login</h2>
                    <form>

                        <div id="unametext">
                            <input type="text" name="uname" id="uname" placeholder="Username" onclick="this.value = ''">
                            <img id="url_user" src="/media/images/mailicon.png" alt="mail_image">
                        </div>
                        <div id="pwdtext">
                            <input type="password" name="pwd" id="password" placeholder="Password" onclick="this.value = ''">
                            <img id="url_password" src="/media/images/passicon.png" alt="pwd_image">
                        </div>
                        <div id="warning" style="display:none">!!** enter all the fields  **!!</div>
                        <div id="usernotexist" style="display:none">!!** Invalid user name or Password **!!</div>
                        <div id="submit">
                            <input type="submit" id="submit" value="Sign In">
                        </div>
                        <div id="link_right">
                            <a href="/index/register">Not a Member Yet?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
