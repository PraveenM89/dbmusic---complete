<html>
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link href="/common/css/master.css" rel="stylesheet" type="text/css">
        <link href="/common/css/profile.css" rel="stylesheet" type="text/css">
        <link href="/common/css/leftpanel.css" rel="stylesheet" type="text/css">
        <link href="/common/css/news.css" rel="stylesheet" type="text/css">
        <link href="/views/profile/css/prnews.css" rel="stylesheet" type="text/css">

        <link href="/views/settings/css/init.css" rel="stylesheet" type="text/css">

        <script src="/common/js/jquery.js"></script>
        <style type="text/css"></style>
        <script src="/common/js/plugin.js"></script>
        <script src="/common/js/editdiag.js"></script>
        <script src="/common/js/profile.js"></script>
        <script src="/views/profile/js/concert.js"></script>
        <script src="/views/profile/js/settings.js"></script>

        <title>MusicBook :Settings</title>
    </head>
    <body>
        <div class="header">
            <div class="wrapper">
                <ul class="right">

                    <li><a href="/search" class="menu">Search</a></li>
                    <li><a href="/home/logout" class="menu">Log Out</a></li>
                </ul>
                <div class="title" style="padding-left: 100px">MusicBook</div>

            </div>
        </div>
        <div class="body">
            <div class="leftpanel">
                <ul>
                    <li><a href="/profile">News</a></li>
                    <li><a href="/profile/posts">Posts</a></li>
                    <li><a href="/profile/concerts">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings" class="active">Settings</a></li>
                </ul>
            </div>
            <div class="content">



                <div id="concertcontent">
                    <div class="content-title" id="changepasswordclick" style="margin-top: 20px;">
                        <a href="#">==>   Change Password</a>
                    </div>
                    <div class="oneconcert" id="passworddetails" style="display:none;margin: 5px 0px 10px 0px;background-color: #b4bece;">
                        <div style="margin-top: 15px;margin-left: 40px;padding: 10px;">
                            <label for="passwordnewvalue" id="passwordnewvaluelabel">New Password :  </label>
                            <input type="password" name="passwordnewvalue" id="passwordnewvalue">
                        </div>
                        <div style="margin-top: 0px;margin-left: 30px;padding: 0px;">
                            <label for="cpasswordnewvalue" id="cpasswordnewvaluelabel">confirm Password :  </label>
                            <input type="password" name="cpasswordnewvalue" id="cpasswordnewvalue">
                            <span id="alerttext" style="color: #f00;display: none">!!! incorrect values !!!</span>
                        </div>

                        <div class="searchsubmit" style="margin: 15px 0 15px 50px;padding-bottom: 20px;">
                            <input type="button" value="   Change   " id="changepasswordsubmit">

                        </div>
                    </div>
                    <span style="color: #fff">-----------------------------------------------------------------------</span>
                    <div class="content-title" id="changecategoryclick">
                        <a href="#">==>   User Category-likes Settings</a>
                    </div>


                    <div class="oneconcert" id="categorydetails" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">

                        <div style="margin-top: 15px;margin-left: 40px;padding: 10px;">
                            <ul style="padding-top: 15px;">
                                <?php
                                    
                                     foreach ($this->catarr3 as $value) {
                                    echo '<li>'.$value[1].'<a href="/profile/removecategory/'.$value[0].'"> X </a>'.'</li>'; 
                                    }
                                    
                                ?>
                            </ul>
                        </div>
                        <div style="margin-top: 0px;margin-left: 30px;padding: 0px;">
                            <label for="addnewvalue" id="addnewvaluelabel">Select Category :  </label>
                            <select name="addnewvalue" id="newcategory" style="margin-left: 25px;">

                                <?php
                                     foreach ($this->allsubarr as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                            <input type="button" style="margin: 15px 0 15px 50px;" value="   Add   " id="addcategory">
                        </div>





                    </div>

                </div>


            </div>



        </div>

        </div>
        </div>
        <div class="footer"></div>


    </body>
</html>