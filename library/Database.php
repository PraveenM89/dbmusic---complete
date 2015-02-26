<?php
 class Database {
     
     public function __construct() {
        $this->conn = mysql_connect('localhost','root','root');
        $this->db=mysql_select_db('musicdb',$this->conn);
     }
 }
?>
