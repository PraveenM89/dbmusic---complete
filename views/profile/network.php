
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
                    <li><a href="/profile/posts">Posts</a></li>
                    <li><a href="/profile/concerts" >Concerts</a></li>
                    <li><a href="/profile/network" class="active">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>
                    


                </ul>
            </div>
            <div class="content">
                <div id="concertcontent">
                    <div class="content-title">
                     Your Following
                    </div>
                    <?php
                        
                        foreach($this->foval as $val){
                                           echo '
                                           <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                                               <div style="padding: 10px 10px 10px 20px;">
                                                   <img src="/media/images/propic.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                                                   <div>
                                                       <div style="float: left; width:300px">
                                                           <div class="onebloack" style="margin-left: 15px;">Name :  <a href="#"> '.$val[0].'</a></div>
                                                           <div class="onebloack" style="margin-left: 15px;">Date of Birth :  '.$val[1].'</div>
                                                       </div>
                                                        <div>
                                                       <div class="onebloack" style="margin-left: 15px;">City : <a href="http://maps.google.com/?q='.$val[3].'">'.$val[3].'</a></div></br>
                                                       <div class="onebloack" style="margin-left: 15px;">Since : '.$val[4].'</div></br>
                                                         </div>
                                                       <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Email id : '.$val[5].'
                                                       </div></br>
                                                       <a href="/profile/unfollow/'.$val[5].'">
                                                       <input type="button" style="width: 75px;margin-left: 15px; " value="Unfollow" name="unfollow" class="unfol"> </a>
                        
                                                   </div>
                        
                                    
                                               </div>
                                           </div>
                                          ';}
                    ?>

                    <div class="content-title" style="margin-top: 40px;">Followers
                </div>
                    <?php                 foreach($this->follval as $val){
                                           echo '
                                           <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                                               <div style="padding: 10px 10px 10px 20px;">
                                                   <img src="/media/images/propic.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                                                   <div>
                                                       <div style="float: left; width:300px">
                                                           <div class="onebloack" style="margin-left: 15px;">Name :  <a href="#"> '.$val[0].'</a></div>
                                                           <div class="onebloack" style="margin-left: 15px;">Date of Birth :  '.$val[1].'</div>
                                                       </div>
                                                        <div>
                                                       <div class="onebloack" style="margin-left: 15px;">City : <a href="http://maps.google.com/?q='.$val[3].'">'.$val[3].'</a></div></br>
                                                       <div class="onebloack" style="margin-left: 15px;">Since : '.$val[4].'</div></br>
                                                         </div>
                                                       <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Email id : '.$val[2].'
                                                       </div></br>
                                                                              
                                                   </div>
                        
                                    
                                               </div>
                                           </div>
                                          ';}

                                          ?>

                     <div class="content-title" style="margin-top: 40px;">Fan of
                </div>
                    <?php                 foreach($this->fanval as $val){
                                           echo '
                                           <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                                               <div style="padding: 10px 10px 10px 20px;">
                                                   <img src="/media/images/aimage.jpg" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                                                   <div>
                                                       <div style="float: left; width:300px">
                                                           <div class="onebloack" style="margin-left: 15px;">Name :  <a href="/profile/concert/'.$val[0].'"> '.$val[0].'</a></div>
                                                           <div class="onebloack" style="margin-left: 15px;">Band :  '.$val[1].'></div>
                                                       </div>
                                                        <div>
                                                       <div class="onebloack" style="margin-left: 15px;">Date Of Birth : '.$val[3].'</div></br>
                                                       <div class="onebloack" style="margin-left: 15px;">City : <a href="http://maps.google.com/?q='.$val[4].'">'.$val[4].'</a></div></br>
                                                         </div>
                                                       <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url : '.$val[2].'
                                                       </div></br>
                                                                              
                                                   </div>
                                                <div style=" width:650px;text-align: right">
                        <div class="oneblock" style="margin-left: 15px;">Since:  '.$val[5].'</div></div>
                                <a href="/profile/unfan/'.$val[6].'">
                                                       <input type="button" style="width: 65px;margin-left: 15px; " value="Un-Fan" name="Unfan" class="unfol"> </a>                        
                    
                                    
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