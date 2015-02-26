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
                                            <!--<li><a href="/search" class="menu">Search</a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="/band" class="menu">Bands</a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li><a href="/concert" class="menu">Concerts</a></li>-->
                    <li><a href="/search" class="menu">Search</a></li>
                    <li><a href="/profile/logout" class="menu">Log Out</a></li>
                </ul>
                <div class="title" style="padding-left: 100px">MusicBook</div>

            </div>
        </div>
        <div class="body">
            <div class="leftpanel">
                <ul>
                    <li><a href="/profile" >News</a></li>
                    <li><a href="/profile/posts">Posts</a></li>
                    <li><a href="/profile/concerts" class="active">Concerts</a></li>
                    <li><a href="/profile/network">Network</a></li>
                    <li><a href="/profile/lists">Lists</a></li>
                    <li><a href="/profile/settings">Settings</a></li>
                </ul>
            </div>
            <div class="content">

                <input id="hiddenid" type="text" value="<?php echo $this->condump1[0][0];?>" style="display: None">
                 <?php
                    
                              echo '
                <div id="concertcontent">
                    <div class="content-title">
                     Concert
                    </div>
                    <div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                        <div style="padding: 10px 10px 10px 20px;">
                            <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                            <div>
                                <div style="float: left; width:300px">
                                    <div class="onebloack" style="margin-left: 15px;">Concert Name :  <a href="/profile/concert/'.$this->condump1[0][0].'"> '.$this->condump1[0][0].'</a></div>
                                    <div class="onebloack" style="margin-left: 15px;">Band Name :  <a href="#">'.$this->condump1[0][1].'</a></div>
                                </div>
                                <div class="onebloack" style="margin-left: 15px;">Venue :  <a href="http://maps.google.com/?q='.$this->condump1[0][3].'">'.$this->condump1[0][3].'</a></div>
                                <div class="onebloack" style="margin-left: 15px;">Event time :  '.$this->condump1[0][9].'</div></br>
                                <div class="onebloack" style="margin-left: 15px;">Created On :  '.$this->condump1[0][5].'</div></br>
                                <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url :  '.$this->condump1[0][6].'
                                </div>

                            </div>

                            <div class="onebloack" style="margin-left: 15px; margin-top: 5px">Ticket Amount :  '.$this->condump1[0][7].'</div>
                            <div class="onebloack" style="margin-left: 15px;">Created by :  '.$this->condump1[0][4].'</div>
                            <div class="onebloack" style="margin-left: 15px;">Approved :  '; if($this->condump1[0][8]=='na')echo 'No'; else echo 'Yes'; if($this->rsvp == 1) echo'<input type="button" style="width: 75px;margin-left: 15px; " value="RSVP-ed" name="rsvpt" class="rsvptf">'; else echo '<input type="button" style="width: 75px;margin-left: 15px;" value="RSVP" name="review-submit" class="rsvptf">';
                            
                            echo '
                            
                            </div>
                            <div id="reviewclick" style="margin-left: 15px;">
                                <a href="#">
 Write a review</a>
                                <span id="submittedalert" style="margin-left: 450px;display: None"> Submitted.</span>
                            </div>

                            <div class="reviewblock" style="display: none">
                                <div class="reviewbox">
                                    <textarea name="reviewtext" id="reviewtext" rows="4" cols="80" style="background-color: #fff;margin-left: 50px;">

                                    </textarea>
                                </div>
                                <div style="margin-left: 50px;">
                                    <label for="rating">Rating</label>
                                       <select id="rating" name="rating">
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                       </select> 
                                </div>
                                <div class="onebloack" style="margin-left: 50px;">
                                    <input type="button" style="width: 75px" value="submit" name="review-submit" id="review-submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                ?>
                <div class="content-title" style="margin-top: 40px;">Reviews
                </div>
                <div id="wholereviewbox">
                 <?php 
                   foreach($this->condump as $val){
                        echo '
                <div style="margin: 5px 0px 10px 0px; background-color: #b4bece;">
                    <div class="oneconcert" style="display: inline-block">
                        <img src="/media/images/icon.png" height="25" width="25" alt="concertimage" style="float: left; margin: 15px 40px 15px 15px;" />

                        <div style="width: 750px;margin-top:16px;">

                            <div class="onebloack" style="margin-left: 15px; border:1px;">'.$val[14].'</div></br>
                        </div>
                        
                    </div>
                    <div style=" width:750px">
                        <div class="oneblock" style="margin-left: 15px;">Created by:  '.$val[11].'</div>
                        <div class="oneblock" style="margin-left: 15px;">Posted on :  '.$val[13].'</div>
                        <div class="oneblock" style="margin-left: 15px;">Rating :  '.$val[12].'</div>
                    </div>
                </div>'
                ;}
                ?>
                    </div>
            </div>



        </div>

        </div>
        </div>
        <div class="footer"></div>


    </body>
</html>