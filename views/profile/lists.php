
<?php
    session_start();
    if(!Session::auth())
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

        <script src="/common/js/jquery.js"></script>
        <style type="text/css"></style>
        <script src="/common/js/plugin.js"></script>
        <script src="/common/js/editdiag.js"></script>
        <script src="/common/js/profile.js"></script>
        <script src="/views/profile/js/prnews.js"></script>
        <script src="/views/profile/js/lists.js"></script>

        <title>MusicBook :Profile</title>
    </head>
    <body>
        <div class="header">
            <div class="wrapper">
                <ul class="right">
                                           
                    <li><a href="/search" class="menu">Search</a></li>
                    <li><a href="/profile/logout" class="menu">Log Out</a></li>
                </ul>
                <div class="title" style="padding-left: 100px">MusicBook</div>

            </div>
        </div>
        <div class="body">
            <div class="leftpanel">
                <ul>
                    <li><a href="/profile">News</a></li>
                    <li><a href="/profile/posts" >Posts</a></li>
                    <li><a href="/profile/concerts">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists" class="active">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>




                </ul>
            </div>
            <div class="content">
                <a href="#" id="concert-click"> + Create a new playlist</a>
                <div id="addconcert" style="display:none;background-color: #68a7d4;padding: 20px 20px 20px 20px;">
                    <form id="newconcertform" action="/profile">
                        <div class="mytabs">
                            <label for="ticketprice" style="margin-left: 50px; width:200px;margin-right: auto;text-align: right;width: 100px;display: block; float:left">Name : </label>
                            <input type="text" name="ticketprice" id="ticketprice">
                        </div>
                        
                       
                        <input type="submit" style="margin-left: 50px;margin-top: 5px;" value="  Add  " id="concertnewsubmit" />
                    </form>

                </div>
                <div id="concertcontent">
                    <div class="content-title">
                     Your Playlists
                    </div>
                    <?php
                        
                        foreach($this->val1 as $val){
                                           echo '
                                           
                <div style="margin: 5px 0px 10px 0px; background-color: #b4bece;">
                    <div class="oneconcert" style="display: inline-block">
                        <img src="/media/images/playlisticon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />

                        <div style="width: 450px;">

                            <div class="onebloack" style="margin-left: 15px;">List Name :  <a href="/profile/slist/'.$val[2].'"> '.$val[0].'</a>
                        
                    </div>
                    </div>
                    </div>
                    <div style=" width:450px;text-align: right">
                        <div class="oneblock" style="margin-left: 15px;">Last Updated:  '.$val[1].'</div>
                        
                    </div>
                </div>
                
                                          ';}
                    ?>

                </div>
               




            



        </div>

        </div>
        </div>
        <div class="footer"></div>


    </body>
</html>?>