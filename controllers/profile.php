<?php
    class profile extends Controller{
            public function __construct(){
                parent::__construct();
            }
    
           public function init(){
                    session_start();
                    $dump_arr = $this->model->concertsfeed($_SESSION['uname123']);
            
                    $this->view->dumpval = $dump_arr;
                    $this->view->dumpval2=$this->model->postfollow($_SESSION['uname123']);
                    $this->view->loadView(__CLASS__,__FUNCTION__);
           
           
        }
    
            public function newuser(){
                var_dump($_REQUEST);
                $this->model->insertuser($_REQUEST['rname'],$_REQUEST['runame'],$_REQUEST['dob'],$_REQUEST['remail'],$_REQUEST['password'],                   $_REQUEST['rcity']);
                if (isset($_REQUEST['usertype'])){
    
                 $this->model->insertartist($_REQUEST['runame'],$_REQUEST['band'],$_REQUEST['rurl']);
                }
                $this->model->logreg($_REQUEST['runame']);
                header("Location: /index/success");
    
            }
    
            public function concerts(){
                session_start();
    
                $this->view->bandarr1 = $this->model->getband();
                $this->view->venuearr1 = $this->model->getvenue();
                $dump_arr = $this->model->userconcerts($_SESSION['uname123']);
                $dump_arr2 = $this->model->userplanconcerts($_SESSION['uname123']);
                $this->view->dumpval = $dump_arr;
                $this->view->dumpval2 = $dump_arr2;
                $this->view->loadView(__CLASS__,__FUNCTION__);
            }
    
            public function concert($concertid){
                session_start();
                $this->view->condump1=$this->model->concon($concertid);
                $this->view->condump=$this->model->conreview($concertid);
                $this->view->rsvp = $this->model->checkrsvp($_SESSION['uname123'],$concertid);
                $this->view->loadView(__CLASS__,__FUNCTION__);            
            }
    
            public function newreview(){
                session_start();
                $concid = $_REQUEST['id'];
                $reviewtext = $_REQUEST['retext'];
                $rating = $_REQUEST['rate'];
    
                $new_arr = $this->model->insertandgetreview($_SESSION['uname123'],$concid,$rating,$reviewtext);
                $fin_arr = $new_arr[0]; 
                echo '
                    <div style="margin: 5px 0px 10px 0px; background-color: #b4bece;">
                        <div class="oneconcert" style="display: inline-block">
                            <img src="/media/images/icon.png" height="25" width="25" alt="concertimage" style="float: left; margin: 15px 40px 15px 15px;" />
    
                            <div style="width: 750px;margin-top:16px;">
    
                                <div class="onebloack" style="margin-left: 15px; border:1px;">'.$fin_arr[3].'</div></br>
                            </div>
    
                        </div>
                        <div style=" width:750px">
                            <div class="oneblock" style="margin-left: 15px;">Created by:  '.$fin_arr[0].'</div>
                            <div class="oneblock" style="margin-left: 15px;">Posted on :  '.$fin_arr[2].'</div>
                            <div class="oneblock" style="margin-left: 15px;">Rating :  '.$fin_arr[1].'</div>
                        </div>
                    </div>';
    
            }
    
            public function logout(){
                session_start();
                $this->model->outtime($_SESSION['uname123']);
                Session::destroy();
                header("Location: /index");
            }
    
            public function plan(){
                session_start();
                $concid = $_REQUEST['id'];
                $this->model->bookrsvp($_SESSION['uname123'],$concid);
                echo 'true';
            }
    
            public function cancel(){
                session_start();
                $concid = $_REQUEST['id'];
                $this->model->cancelrsvp($_SESSION['uname123'],$concid);
                echo 'truec';
            }
    
            public function newconcert(){
    
                session_start();
    
                $this->model->newconcert($_SESSION['uname123'],$_REQUEST['bandid'],$_REQUEST['venueid'],$_REQUEST['conurl'],$_REQUEST['rate'],$_REQUEST['eventtime']);
    
    
            }
    
            public function posts(){
            session_start();
            $dump_arr = $this->model->userposts($_SESSION['uname123']);
    
            $this->view->dumpval = $dump_arr;
            $this->view->loadView(__CLASS__,__FUNCTION__);
        }
    
        public function network(){
            session_start();
            $this->view->foval=$this->model->following($_SESSION['uname123']);
            $this->view->follval=$this->model->followers($_SESSION['uname123']);
            $this->view->fanval=$this->model->fanof($_SESSION['uname123']);
            $this->view->loadview(__CLASS__,__FUNCTION__);
        }
    
        public function lists(){
            session_start();
    
            $this->view->val1=$this->model->userlist($_SESSION['uname123']);
            //$this->view->bandarr1=$this->model->getconcerts();
            $this->view->loadview(__CLASS__,__FUNCTION__);
        }
    
        public function slist($listid){
            session_start();
            $this->view->condump=$listid;
             $this->view->bandarr1=$this->model->getconcerts();
            $this->view->val=$this->model->inlist($listid);
            $this->view->loadview(__CLASS__,__FUNCTION__);
    
        }

    
        public function unfollow($unfoid){
            session_start();
            
            
            $this->model->removefollower($_SESSION['uname123'],$unfoid);
            header("Location: /profile/network");
        }
    
        public function unfan($aid){
            session_start();
    
            echo $_SESSION['uname123'];
            $this->model->deletefan($_SESSION['uname123'],$aid);
          header("Location: /profile/network");
        }
    
        public function newpost(){
            session_start();
            $this->model->insertpost($_SESSION['uname123'],$_REQUEST['raccess'],$_REQUEST['rtext']);
            header("Location: /profile/posts");
        }
    
         public function settings(){
            session_start();
            $this->view->allsubarr = $this->model->getsubcategory();
            $this->view->catarr3 = $this->model->getusercategories($_SESSION['uname123']);
            $this->view->loadview(__CLASS__,__FUNCTION__);
            
        }

        public function changepassword(){
            $newpass = $_REQUEST['pass'];
            session_start();
            $this->model->changepassword($_SESSION['uname123'], $newpass);
            
        }

        public function removecategory($catid){
            
            session_start();
            $this->model->removeuserlikes($_SESSION['uname123'], $catid);
            header("Location:/profile/settings");

            
        }

        public function adduserlikes($catid){
            
            session_start();
            $this->model->adduserlikes($_SESSION['uname123'], $catid);
            header("Location:/profile/settings");

            
        }

        public function insertlist(){
            session_start();
            $this->model->newlist($_SESSION['uname123'],$_REQUEST['rtext']);
            header("Location: /profile/lists");
        }
 
        public function addcontoplaylist(){
           
            $this->model->contolist($_REQUEST['listid'],$_REQUEST['rtext']);
            
            
        }



    }
?>


