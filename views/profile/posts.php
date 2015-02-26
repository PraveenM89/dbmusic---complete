
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
        <script src="/views/profile/js/posts.js"></script>

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
                    <li><a href="/profile/posts" class="active">Posts</a></li>
                    <li><a href="/profile/concerts">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>
                </ul>
            </div>
            <div class="content">
                <a href="#" id="concert-click">Add Post</a>
                <div id="addconcert" style="display:none;background-color: #68a7d4;padding: 20px 20px 20px 20px;">
                    <form id="newconcertform" action="/profile">
                        <div class="mytabs">
                          <label for="reviewtext">Text</label>
                            <textarea name="reviewtext" id="reviewtext" rows="4" cols="80" style="background-color: #fff;margin-left: auto;">
                                    </textarea>
                        <div style=" width:750px;text-align: center">
                        <div class="oneblock" style="margin-left: 55px;">

                        
                                    <label for="rating">Accessibility</label>
                                       <select id="access" name="access">
                                           <option value="Public">Public</option>
                                           <option value="Followers">Followers</option>
                                           
                                       </select> 
                            </div>
                                </div>
                            </div>
                       
                        <input type="submit" style="margin-left: 50px;margin-top: 5px;" value="  Post  " id="concertnewsubmit" />
                    </form>

                </div>
                <div id="concertcontent" style="margin-top: 20px;">
                    <div class="content-title">
                     Your Posts
                    </div>
                    <?php
                        
                        foreach($this->dumpval as $val){
                                           echo '
                                           
                <div style="margin: 5px 0px 10px 0px; background-color: #b4bece;">
                    <div class="oneconcert" style="display: inline-block">
                        <img src="/media/images/wordpress-post.jpg" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />

                        <div style="width: 750px;">

                            <div class="onebloack" style="margin-left: 15px; border:1px;">POST TEXT : '.$val[1].'</div></br>
                        </div>
                        
                    </div>
                    <div style=" width:750px;text-align: right">
                        <div class="oneblock" style="margin-left: 15px;">Accessibility:  '.$val[2].'</div>
                        <div class="oneblock" style="margin-left: 15px;">Posted on :  '.$val[0].'</div>
                        
                    </div>
                </div>
                
                                          ';}
                    ?>

                </div>
               

                </div>


            



        </div>

        </div>
        </div>
        <div class="footer"></div>


    </body>
</html>?>