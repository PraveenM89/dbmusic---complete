<?php
    class index extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function init(){
            
            $this->view->loadview(__CLASS__,__FUNCTION__);
            
        }
          
        public function checklogin(){
            
            $rows=$this->model->getlogin($_REQUEST['name'], $_REQUEST['pass']);
           
            if ($rows==1){
                $this->model->logtime($_REQUEST['name']);
                Session::init();
                Session::setKey('uname123',$_REQUEST['name']);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function getlogin(){
            $rows=$this->model->getlogin($_REQUEST['name'],$_REQUEST['pass']);
            if ($rows==1){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        

        public function allband(){
            $data=$this->model->allband();
            
            return $data;
            
        }

        public function register(){
            $this->view->bandarray = $this->allband();
            
            $this->view->loadview(__CLASS__,__FUNCTION__);
        }

         public function success(){
            session_start();
            Session::destroy();
            $this->view->loadview(__CLASS__,__FUNCTION__);
        }
    }

?>


