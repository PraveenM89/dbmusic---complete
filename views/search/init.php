
<?php
    session_start();
    if(!Session::auth('uname123'))
         header("Location: /index");
    
    
    
?>

<html>
    <head>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link href="/common/css/master.css" rel="stylesheet" type="text/css">
        <link href="/common/css/profile.css" rel="stylesheet" type="text/css">
        <link href="/common/css/leftpanel.css" rel="stylesheet" type="text/css">
        <link href="/common/css/news.css" rel="stylesheet" type="text/css">
        <link href="/views/profile/css/prnews.css" rel="stylesheet" type="text/css">
        <link href="/views/search/css/init.css" rel="stylesheet" type="text/css">


        <script src="/common/js/jquery.js"></script>
        <style type="text/css"></style>
        <script src="/common/js/plugin.js"></script>
        <script src="/common/js/editdiag.js"></script>
        <script src="/common/js/profile.js"></script>
        <script src="/views/search/js/init.js"></script>

        <title>MusicBook :Search</title>
    </head>
    <body>
        <div class="header">
            <div class="wrapper">
                <ul class="right">
                    <li><a href="/search" class="menu" style="background-color: #1a076b">Search</a></li>
                    <li><a href="/home/logout" class="menu">Log Out</a></li>
                </ul>
                <div class="title" style="padding-left: 100px">MusicBook</div>
            </div>
        </div>
        <!--------------------------------------------header--------------------------------------------------------------->
        <div class="body">
            <div class="leftpanel">
                <ul>
                    <li><a href="/profile">News</a></li>
                    <li><a href="/profile/posts">Posts</a></li>
                    <li><a href="/profile/concerts">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>
                </ul>
            </div>
            <!--------------------------------------------left panel--------------------------------------------------------------->
            <div class="content">
                <div id="searchbox">
                    <label for="searchchoice" id="searchlabel">Select an option :  </label>
                    <select name="searchchoice" id="searchchoice">
                        <option value=" "></option>
                        <option value="concert">Concert</option>
                        <option value="artist">Artist</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <!--------------------------------------------search box--------------------------------------------------------------->
                <div id="concertsearch">
                    <div class="content-title">
                    Concert Search Filter
                    </div>
                    <div id="searchconcertfilter">
                        <div id="bandfilter" class="entity">
                            <label for="concertbandchoice" id="concetbandchoicelabel">Select a Band :  </label>
                            <select name="bandchoice" id="concertbandchoice">
                                <option value=" "></option>
                                <?php
                                     foreach ($this->bandarr2 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div id="venuefilter" class="entity">
                            <label for="concertvenuechoice" id="concetvenuechoicelabel">Select a Venue :  </label>
                            <select name="venuechoice" id="concertvenuechoice">
                                <option value=" "></option>
                                <?php
                                     foreach ($this->venuearr2 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div id="amountfilter" class="entity">
                            <label for="concertticketchoice" id="concetticketchoicelabel">Enter ticket amount :  </label>
                            <input type="text" name="amountchoice" id="concertamountchoice">
                            <span style="margin-left: 20px; font-size: 13px;">
                                <input type="radio" name="moneyradiofilter" class="moneyradiofilter" value="less"/>Less than
                                <input type="radio" name="moneyradiofilter" class="moneyradiofilter" value="more"/>Greater than
                                <input type="radio" name="moneyradiofilter" class="moneyradiofilter" value="equal"/>Equal to
                                <input type="radio" name="moneyradiofilter" class="moneyradiofilter" value="none" checked="checked"/>All
                            </span>
                        </div>
                        <div class="searchsubmit">
                            <input type="button" value="   search   " id="concertsearchsubmit">

                        </div>
                    </div>
                </div>

                <!--search php populates the concertcontent-->
                <div id="concertcontent" style="display: none;">
                    <div class="content-title">
                     Concerts
                    </div>
                    
                </div>



                <!--------------------------------------------concert search box------------------------------------------------------------>
                <div id="artistsearch">
                    <div class="content-title">
                    Artist Search Filter
                    </div>

                    <div id="searchartistfilter">
                        <div id="bandfilter" class="entity">
                            <label for="artistbandchoice" id="artistbandchoicelabel">Select a Band :  </label>
                            <select name="artistbandchoice" id="artistbandchoice">
                                <option value=" "></option>
                                <?php
                                     foreach ($this->bandarr2 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div id="namefilter" class="entity">
                            <label for="artistnamefilter" id="artistnamefilterlabel">Enter name :  </label>
                            <input type="text" name="artistnamefilter" id="artistnamefilter">
                        </div>
                        <div class="searchsubmit">
                            <input type="button" value="   search   " id="artistsearchsubmit">

                        </div>
                    </div>
                </div>

                <div id="artistcontent" style="display: none">
                    <div class="content-title">
                     Artists
                    </div>
                   
                </div>



                <!--------------------------------------------Artist search box--------------------------------------------------------------->

                <div id="usersearch">
                    <div class="content-title">
                    User Search Filter
                    </div>

                    <div id="usersearchfilter">
                        <div id="userfilter" class="entity">
                            <label for="usercategorychoice" id="usercategorychoicelabel">Select a Category :  </label>
                            <select name="usercategorychoice" id="usercategorychoice">
                                <option value=" "></option>
                                <?php
                                     foreach ($this->catarr2 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div id="unamefilter" class="entity">
                            <label for="usernamefilter" id="usernamefilterlabel">Enter name :  </label>
                            <input type="text" name="usernamefilter" id="usernamefilter">
                        </div>
                        <div class="searchsubmit">
                            <input type="button" value="   search   " id="usersearchsubmit">

                        </div>
                    </div>
                </div>

                <div id="usercontent" style="display: none">
                    <div class="content-title">
                     Users
                    </div>
                   
                </div>
                <!--------------------------------------------User search box--------------------------------------------------------------->


            </div>
        </div>
        <!--------------------------------------------------body----------------------------------------------------------->
    </body>
</html>