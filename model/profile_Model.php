<?php
        class profile_Model extends Model{
    
            public function insertuser($name,$uname,$dob,$email,$pwd,$city){
                echo $name,$uname,$dob,$email,$pwd,$city;
                $date=new DateTime();
                $ar= $date->format('Y-m-d H:i:s');
                $query=mysql_query("insert into user(uname,password,dob,name,email,city,join_time,trust_rate) values ('$uname','$pwd','$dob','$name','$email','$city','$ar','5')",$this->conn);
                print_r(mysql_error());
            }
    
            public function insertartist($runame,$bname,$rurl){
    
                $bid=mysql_query("select bid from band where bname= '$bname'",$this->conn);
    
                while ($arr= mysql_fetch_array($bid)){
                                $arr1= $arr['bid'];
                }
                $query=mysql_query("insert into artist (uname,bid,url) values ('$runame','$arr1','$rurl')",$this->conn);
             }
    
            public function concertsfeed($runame){
    
                $concerts=mysql_query("select concert_id,source_uname,name,bname,vname,time,url,price,event_time,approval from concerts join user_follow on source_uname=uname join band using(bid) join venue using (vid) join user on source_uname=user.uname where user_follow.follower='$runame'",$this->conn);
                $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($concerts)){
    
                        for($j=0;$j<=10;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
           
            return $ar1;
        }

        public function concon($conid){
            $query=mysql_query("select concert_id,bname,bid,vname,source_uname,time,url,price,approval,event_time from concerts join band using(bid) join venue using(vid) where concert_id = '$conid' order by 'post_time' desc",$this->conn);
            $ar1=array();
            $numfield=mysql_num_fields($query);
                $i=0;
                while($ar= mysql_fetch_array($query)){
                        for($j=0;$j<=$numfield - 1;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
    
            return $ar1;
        }
    
            public function conreview($conid){
            //to populate a single concert
            $query=mysql_query("select concert_id,bname,bid,vname,source_uname,time,url,price,approval,event_time,uname,name,rating,post_time,review_text from concerts join review using(concert_id) join user using(uname) join band using(bid) join venue using(vid) where concert_id = '$conid' order by 'post_time' desc",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($query)){
                        for($j=0;$j<=14;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
    
            return $ar1;
        }
    
    
    
        public function outtime($uname){
                $date=new DateTime();
                $ar= $date->format('Y-m-d H:i:s');
                $query=mysql_query("update user_log set out_time='$ar' where uname='$uname'");
            }
            // public function postsfeed($runame)
    
    
        public function userconcerts($runame){
            $concerts=mysql_query("select concert_id,bname,vname,time,url,price,event_time,approval,bid,vid from concerts join band using(bid) join venue using (vid) join user on source_uname=user.uname where source_uname='$runame'",$this->conn);
                $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($concerts)){
                        for($j=0;$j<=9;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
    
            return $ar1;
        }
    
        public function userplanconcerts($runame){
            $pconcerts=mysql_query("select concert_id,bname,vname,time,url,price,event_time,approval from user_plan join concerts using(concert_id) join band using(bid) join venue using(vid) where user_plan.uname='$runame' and attend_status='plan'",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($pconcerts)){
                        for($j=0;$j<=7;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
    
            return $ar1;
        }
    
        public function logreg($uname){
            $date=new DateTime();
            $ar= $date->format('Y-m-d H:i:s');
            $query=mysql_query("insert into user_log (uname,in_time,out_time) values ('$uname','$ar','0000-00-00 00:00:00')",$this->conn);
        }
    
        public function insertandgetreview($runame,$conid,$rate,$review1text){
            $date=new DateTime();
            $ar= $date->format('Y-m-d H:i:s');
            $rid=rand(1,10000000);
            $query=mysql_query("insert into review (review_id,uname,concert_id,rating,post_time,review_text) values ('$rid','$runame','$conid','$rate','$ar','$review1text')",$this->conn);
            $query1=mysql_query("select name,rating,post_time,review_text from review join user using(uname) where review_id='$rid'",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($query1)){
                        for($j=0;$j<=3;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
            return $ar1;
        }
    
        public function checkrsvp($runame,$conid){
    
            $query=mysql_query("select * from user_plan where uname='$runame' and attend_status='plan' and concert_id='$conid'",$this->conn);
            $rows=mysql_num_rows($query);
            if ($rows==1)
                return 1;
    
            else
                return 0;
        }
    
        public function bookrsvp($runame,$conid){
            $query=mysql_query("insert into user_plan (uname,concert_id,attend_status) values ('$runame','$conid','plan')",$this->conn);
        }
    
        public function cancelrsvp($runame,$conid){
            $query=mysql_query("delete from user_plan where uname='$runame' and attend_status='plan' and concert_id='$conid'",$this->conn);
        }
    
    
        public function getband(){
            $query=mysql_query("select bid,bname from band",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($query)){
                        for($j=0;$j<=1;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
            return $ar1;
        }
    
    
        public function getvenue(){
            $query=mysql_query("select vid,vname from venue",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($query)){
                        for($j=0;$j<=1;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
            return $ar1;
        }
    
    
    
        public function newconcert($sname,$bid,$vid,$url,$price,$etime)
        {
        
        $cid=rand(1,100000);
        $ccid="c".$cid;
        $date=new DateTime();
        $ar= $date->format('Y-m-d H:i:s');
        $query=mysql_query("insert into concerts values('$ccid','$sname','$bid','$vid','$ar','$url','$price','na','$ar')",$this->conn);
    }
    

    public function userposts($uname){
        $query=mysql_query("select post_time,post_text,accessibility from post where uname = '$uname'",$this->conn);
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=2;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }

    public function postfollow($uname){
        $query=mysql_query("select post.uname,post_time,post_text from post join user_follow using(uname) where follower='$uname'",$this->conn);        
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=2;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }

    public function following($uname){
        $query=mysql_query("select name,dob,email,city,fsince,user.uname from user join user_follow using(uname) where user_follow.follower='$uname'",$this->conn);
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=5;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }

    public function followers($uname){
        $query=mysql_query("select name,dob,email,city,fsince from user join user_follow on user.uname=user_follow.follower where user_follow.uname='$uname'",$this->conn);
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=4;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }

    public function userlist($uname){
        $query=mysql_query("select listname,last_update,listid from user_playlist where uname='$uname'",$this->conn);
       
        
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=2;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }

    public function inlist($liid){
        $query=mysql_query("select concert_id from playlist where listid='$liid'",$this->conn);
        $ar1=array();
            $i=0;
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=0;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }


    public function deletefan($uid,$aid){
        $query=mysql_query("delete from artist_fan where uname='$uid' and artist='$aid'",$this->conn);

    }
    

    public function fanof($uid){
        $query=mysql_query("select name,bname,url,dob,city,fsince,artist.uname from artist_fan join user on artist_fan.artist=user.uname join artist on artist_fan.artist = artist.uname join band using(bid) where artist_fan.uname='$uid'",$this->conn);
        $ar1=array();
            $i=0;
            $numfield=mysql_num_fields($query);
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=$numfield - 1;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }


    public function insertpost($runame,$access,$text){
        $date=new DateTime();
        $ar= $date->format('Y-m-d H:i:s');
        $rid=rand(1,10000000);
        $rid="P".$rid;
        $query=mysql_query("insert into post values ('$rid','$runame','$access','$ar','$text')",$this->conn);
      }

    public function removefollower($uname,$funame){
        $query=mysql_query("delete from user_follow where uname='$funame' and follower='$uname'",$this->conn);
        
    }


    public function changepassword($uname, $upass){
        $query=mysql_query("update user set password='$upass' where uname='$uname'",$this->conn);
    }

    public function getusercategories($uname){
        $query=mysql_query("select subcat_id, subname from subcategory join userlikes using(subcat_id) where uname='$uname'",$this->conn);
            $ar1=array();
                $i=0;
                while($ar= mysql_fetch_array($query)){
                        for($j=0;$j<=1;$j++){
                            $ar1[$i][$j]=$ar[$j];
    
                 }
                 $i=$i+1;
            }
            return $ar1;
        
    }

    public function getsubcategory(){
             $query=mysql_query("select subcat_id,subname from subcategory",$this->conn);
             $ar1=array();
             $i=0;
             $numfield=mysql_num_fields($query);
             while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=$numfield - 1;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }
    
     public function removeuserlikes($uname,$catid){
        $query=mysql_query("delete from userlikes where uname='$uname' and subcat_id ='$catid'",$this->conn);
        
    }

    public function adduserlikes($uname,$catid){
        $query=mysql_query("insert into userlikes values ('$uname','$catid')",$this->conn);
        
    }

    public function newlist($sname,$conid){
        $date=new DateTime();
        $ar= $date->format('Y-m-d H:i:s');
        $rid=rand(1,10000000);
        $rid="L".$rid;
        $query=mysql_query("insert into user_playlist values ('$rid','$conid','$sname','$ar')",$this->conn);
    }
 
    public function contolist($lid,$conid){
        $query=mysql_query("insert into playlist values ('$lid','$conid')",$this->conn);
    }


    public function getconcerts(){
        $query=mysql_query("select concert_id from concerts",$this->conn);
        $ar1=array();
            $i=0;
            $numfield=mysql_num_fields($query);
            while($ar= mysql_fetch_array($query)){
                    for($j=0;$j<=$numfield - 1;$j++){
                        $ar1[$i][$j]=$ar[$j];
    
             }
             $i=$i+1;
        }
        return $ar1;
    }


}
?>

