
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
        <script src="/views/profile/js/concert.js"></script>

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
                    <li><a href="/profile/concerts" class="active">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>




                </ul>
            </div>


            <div class="content">

                <a href="#" id="concert-click">Click to create a concert</a>


                <div id="addconcert" style="display:none;background-color: #68a7d4;padding: 20px 20px 20px 20px;">
                   
                    <form id="newconcertform" action="/profile">

                        <div class="mytabs">
                            <label for="eventtime" style="margin-left: 20px;margin-right: 20px;text-align: right;width: 100px;display: block; float:left">Event time</label>
                            <input type="datetime-local" name="eventtime" id="eventtime">
                        </div>
                        <div class="mytabs">
                            <label for="bandid" style="margin-left: 20px;margin-right: 20px;width: 100px;display: block; float:left;text-align: right;">Band </label>
                            <select name="bandid" id="bandid">
                                <?php
                                     foreach ($this->bandarr1 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div class="mytabs">
                            <label for="venueid" style="margin-left: 20px;margin-right: 20px;text-align: right;width: 100px;display: block; float:left">Venue</label>
                            <select name="venueid" id="venueid">
                                <?php
                                     foreach ($this->venuearr1 as $value) {
                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>'; 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div class="mytabs">
                            <label for="ticketprice" style="margin-left: 20px; width:200px;margin-right: 20px;text-align: right;width: 100px;display: block; float:left">Ticket Price</label>
                            <input type="text" name="ticketprice" id="ticketprice">
                        </div>
                        <div class="mytabs">
                            <label for="conurl" style="margin-left: 20px;margin-right: 20px;text-align: right;width: 100px;display: block; float:left">Url </label>
                            <input type="text" name="conurl" id="conurl">
                        </div>
                        <input type="submit" style="margin-left: 50px;margin-top: 5px;" value="Submit" id="concertnewsubmit" />
                    </form>

                </div>
                <div id="concertcontent" style="margin-top: 20px;">
                    <div class="content-title">
                     Concerts
                    </div>
                    <?php
                        foreach($this->dumpval as $val){
                                           echo '
                                           <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                                               <div style="padding: 10px 10px 10px 20px;">
                                                   <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                                                   <div>
                                                       <div style="float: left; width:300px">
                                                           <div class="onebloack" style="margin-left: 15px;">Concert Name :  <a href="/profile/concert/'.$val[0].'"> '.$val[0].'</a></div>
                                                           <div class="onebloack" style="margin-left: 15px;">Band Name :  <a href="#">'.$val[1].'</a></div>
                                                       </div>
                        
                                                       <div class="onebloack" style="margin-left: 15px;">Venue :  <a href="http://maps.google.com/?q='.$val[2].'">'.$val[2].'</a></div>
                                                       <div class="onebloack" style="margin-left: 15px;">Event time :  '.$val[6].'</div></br>
                        
                                                       <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url : '.$val[4].'
                                                       </div>
                        
                                                   </div>
                        
                                                   <div class="onebloack" style="margin-left: 35px; margin-top: 5px">Ticket Amount :  $ '.$val[5].'</div>
                        
                                                   <div class="onebloack" style="margin-left: 15px;">Approved : '; if($val[7]=='na')echo 'No'; else echo 'Yes'; echo'</div>
                                               </div>
                                           </div>
                                          ';}
                    ?>

                </div>
                <div id="concertcontent">
                    <div class="content-title">
                     Concerts RSVP-ed:
                    </div>



                    <?php
                        foreach($this->dumpval2 as $val){
                                           echo '
                                           <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                                               <div style="padding: 10px 10px 10px 20px;">
                                                   <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                                                   <div>
                                                       <div style="float: left; width:300px">
                                                           <div class="onebloack" style="margin-left: 15px;">Concert Name :  <a href="/profile/concert/'.$val[0].'"> '.$val[0].'</a></div>
                                                           <div class="onebloack" style="margin-left: 15px;">Band Name :  <a href="#">'.$val[1].'</a></div>
                                                       </div>
                        
                                                       <div class="onebloack" style="margin-left: 15px;">Venue :  <a href="http://maps.google.com/?q='.$val[2].'">'.$val[2].'</a></div>
                                                       <div class="onebloack" style="margin-left: 15px;">Event time :  '.$val[6].'</div></br>
                        
                                                       <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url : '.$val[4].'
                                                       </div>
                        
                                                   </div>
                        
                                                   <div class="onebloack" style="margin-left: 35px; margin-top: 5px">Ticket Amount :  $ '.$val[5].'</div>
                        
                                                   <div class="onebloack" style="margin-left: 15px;">Approved : '; if($val[7]=='na')echo 'No'; else echo 'Yes'; echo'</div>
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