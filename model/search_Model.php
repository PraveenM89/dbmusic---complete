<?php
    
        class search_Model extends Model{
    
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
    
            public function searchconcert($bids,$vids,$amts,$filter){
    
            if ($amts == ' ' || $filter='none' ){
                $amts = 'is not null';
            }
            else {
            if ($filter == 'less')
                $amts='<'.$amts;
            elseif ($filter=='more')
                $amts='>'.$amts;
            elseif ($filter=='equal')
                $amts = '='.$amts;}
    
            $query=mysql_query("select concert_id,name,bname,vname,time,url,price,event_time,approval from concerts join band using(bid) join venue using (vid) join user on source_uname=user.uname where bid $bids and vid $vids and price $amts",$this->conn);
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
    
        public function searchartist($bids,$word){
            session_start();
            $vel = $_SESSION['uname123'];
            if ($word == ' '){
                $word = 'is not null';
            }
            else{
                $word="like '%".$word."%'";
            }
            $query=mysql_query("select uname, name,bname,url,dob,city from artist join user using(uname) join band using(bid) where bid $bids and user.name $word and artist.uname != '$vel'",$this->conn);
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
    
        public function checkuserfan($uid,$aid){
            $query=mysql_query("select * from artist_fan where uname='$uid' and artist='$aid'",$this->conn);
            $rows=mysql_num_rows($query);
            if($rows==1){
                return 1;
            }else{
                return 0;
            }
        }
    
        public function insertfan($uid,$aid){
            $date=new DateTime();
            $ar= $date->format('Y-m-d H:i:s');
    
            $query=mysql_query("insert into artist_fan values('$uid','$aid','$ar')",$this->conn);
        }
    
        public function deletefan($uid,$aid){
            $query=mysql_query("delete from artist_fan where uname='$uid' and artist='$aid'",$this->conn);
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


    public function searchuser($uname,$likes){
        
         session_start();
        $vs=$_SESSION['uname123'];
        if ($uname==' '){
            $uname='is not null';
        }
        else{
            $uname="like '%".$uname."%'"; 
        }
        
 
        if ($likes == 'IS NOT NULL'){
            $query=mysql_query("select uname,name,dob,email,city from user where uname $uname and uname!='$vs' and uname not in (select uname from artist) ",$this->conn);
 
        }
        else{
            
        
        $query=mysql_query("select uname,name,dob,email,city from userlikes join user using(uname) where uname $uname and subcat_id $likes and uname!='$vs' and uname not in (select uname from artist)",$this->conn);
        }
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

    public function checkuserfollow($uname,$fname){
        
        $query=mysql_query("select * from user_follow where uname='$fname' and follower='$uname'",$this->conn);
        $rows=mysql_num_rows($query);
        if ($rows==1){
            return 1;
        }
        else {
            return 0;
        }
    }

    
    public function removefollower($uname,$funame){
        $query=mysql_query("delete from user_follow where uname='$funame' and follower='$uname'",$this->conn);
        
    }
 
    public function addfollower($uname,$fname){
        $date=new DateTime();
        $ar= $date->format('Y-m-d H:i:s');
        $query=mysql_query("insert into user_follow values ('$fname','$uname','$ar')",$this->conn);
    }




    
        }
?>



