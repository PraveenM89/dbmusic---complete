<?php
    class search extends Controller{
    
        public function init(){
            $this->view->bandarr2 = $this->model->getband();
            $this->view->venuearr2 = $this->model->getvenue();
            $this->view->catarr2 = $this->model->getsubcategory();
            $this->view->loadView(__CLASS__,__FUNCTION__);
        }
    
    
        public function searchconcert(){
    
            $searchconarr = $this->model->searchconcert($_REQUEST['bandid'], $_REQUEST['venueid'], $_REQUEST['ticket'], $_REQUEST['filter']);
            $total_content = '';
            foreach($searchconarr as $val){
                if($val[8]=='na') $temp = 'No'; else $temp = 'Yes';
                $total_content_temp = '<div class="userdata"><div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                        <div style="padding: 10px 10px 10px 20px;">
                            <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                            <div>
                                <div style="float: left; width:300px">
                                    <div class="onebloack" style="margin-left: 15px;">Concert Name :  <a href="/profile/concert/'.$val[0].'"> '.$val[0].'</a></div>
                                     <div class="onebloack" style="margin-left: 15px;">Band Name :  <a href="#">'.$val[2].'</a></div>
                                 </div>
                                 <div class="onebloack" style="margin-left: 15px;">Venue :  <a href="http://maps.google.com/?q='.$val[3].'">'.$val[3].'</a></div>
                                 <div class="onebloack" style="margin-left: 15px;">Event time :  '.$val[7].'</div></br>
                                 <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url : '.$val[5].'</div>
                             </div>
                             <div class="onebloack" style="margin-left: 35px; margin-top: 5px">Ticket Amount :  $ '.$val[6].'</div>
                             <div class="onebloack" style="margin-left: 15px;">Approved : '.$temp.'</div>
                        </div>
                        </div>
                    </div>';
                    $total_content = $total_content . $total_content_temp;
    
            }
            echo $total_content;
    
        }
    
        public function searchartist(){
            $temparr = $this->model->searchartist($_REQUEST['bandid'], $_REQUEST['artistname']);
            $total_content = '';
            session_start();
            foreach($temparr as $val){
                $tempval = $val[0];
    
                $fan_status = $this->model->checkuserfan($_SESSION['uname123'], $val[0]);
    
                if ( $fan_status == 1 ) $status = "  Un-fan  "; else $status = "  Fan  ";
                $total_content_temp = '<div class="userdata"><div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                        <div style="padding: 10px 10px 10px 20px;">
                            <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                            <div>
                                <div style="float: left; width:300px">
                                    <div class="onebloack" style="margin-left: 15px;">Artist Name : <a href="#">'.$val[1].' </a></div>
                                    <div class="onebloack" style="margin-left: 15px;">Band Name :  '.$val[2].'</div>
                                </div>
                                <div class="onebloack" style="margin-left: 15px;">City :  <a href="http://maps.google.com/?q='.$val[5].'">'.$val[5].'</a></div>
    
    
                                <div class="onebloack" style="margin-left: 15px;margin-bottom: 1px;">Url :  '.$val[3].'
                                </div>
                                <div class="onebloack" style="margin-left: 15px;margin-top: 20px;">
                                <input type="button" value="'.$status.'" onClick = "btn_click(this)" data-id="'.$tempval.'">
                                </div>
    
                            </div>
                        </div>
                        </div>
                    </div>';
                    $total_content = $total_content . $total_content_temp;
                    }
            echo $total_content;
    
    
        }
    
        public function searchuser(){
            $temparr = $this->model->searchuser($_REQUEST['username'], $_REQUEST['catid']);
            $total_content = '';
            session_start();
            
            foreach($temparr as $val){
                $total_content_temp ='';
                $tempval = $val[0];
    
                $fan_status = $this->model->checkuserfollow($_SESSION['uname123'], $val[0]);
    
                if ( $fan_status == 1 ) $status = "  Unfollow  "; else $status = "  Follow  ";
                $total_content_temp = '<div class="userdata"><div class="oneconcert" style="margin: 5px 0px 10px 0px;background-color: #b4bece;">
                        <div style="padding: 10px 10px 10px 20px;">
                            <img src="/media/images/icon.png" height="42" width="42" alt="concertimage" style="float: left; margin: 15px 50px 15px 15px;" />
                            <div>
                                <div style="float: left; width:300px">
                                    <div class="onebloack" style="margin-left: 15px;">User Name : <a href="#">'.$val[1].'</a></div>
                                    <div class="onebloack" style="margin-left: 15px;">Email Id :  '.$val[3].'</div>
                                </div>
                                <div class="onebloack" style="margin-left: 15px;">City :  <a href="http://maps.google.com/?q='.$val[3].'">'.$val[3].'</a></div>
                                </div>
                                <div class="onebloack" style="margin-left: 15px;margin-top: 20px;">
                                <input type="button" value="'.$status.'" onClick = "btnf_click(this)" data-id="'.$tempval.'">
                                </div>
    
                            </div>
                        </div>
                        </div>
                    </div>';
                    $total_content = $total_content . $total_content_temp;
                    }
            echo $total_content;
    
    
        }
    
        public function followartist(){
            session_start();
            $this->model->insertfan($_SESSION['uname123'], $_REQUEST['aid']);
            echo 1;
        }
    
        public function unfollowartist(){
            session_start();
            $this->model->deletefan($_SESSION['uname123'], $_REQUEST['aid']);
            echo 1;
        }
    
    
        public function followuser(){
    
            session_start();
            $this->model->addfollower($_SESSION['uname123'],$_REQUEST['uid']);
            echo 1;
        }
    
        public function unfollowuser(){
    
            session_start();
            $this->model->removefollower($_SESSION['uname123'],$_REQUEST['uid']);
            echo 1;
        }
    
    
    }
?>

