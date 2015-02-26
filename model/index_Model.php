<?php
class index_Model extends Model{
       
    public function getlogin($user,$pwd){
        if ($pwd == ''){
            $query=mysql_query("select * from user where uname='$user'",$this->conn);
            $rows=mysql_num_rows($query);
            return $rows;
        }
        else{
        $query=mysql_query("select * from user where uname='$user' and password='$pwd'",$this->conn);
        $rows=mysql_num_rows($query);
        return $rows;
        }
    }
    
    public function allband(){
        $query=mysql_query("select bname from band",$this->conn);
        while ($arr= mysql_fetch_array($query)){
            $arr1[]=$arr['bname'];
           
         }
        
        return $arr1;
    }

    public function logtime($uname){
        $date=new DateTime();
        $ar= $date->format('Y-m-d H:i:s');
        $query=mysql_query("update user_log set in_time='$ar' where uname='$uname'");
    }

    
}
?>
