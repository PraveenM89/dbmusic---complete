<?php
    
    class Bootloader{
        public $url = array();
        
        public function __construct(){
            $this->url = $this->spliturl();
            
            

            $default = "init";
            
            switch(count($this->url)){
                
                case 1:
                    
                    if(file_exists('controllers/'.$this->url[0].'.php')){
                        
                        require_once 'controllers/'.$this->url[0].'.php';
                        $cont = new $this->url[0]();
                        $cont->loadModel($this->url[0]); 
                        $cont->$default();
                    }
                    else{
                        require_once 'controllers/index.php';
                        $defcont = new index();
                        $defcont->loadModel('index'); 
                        $defcont->$default();
                    }
                    break;
                        

                case 2:
                    
                
                    if(file_exists('controllers/'.$this->url[0].'.php')){
                        require_once 'controllers/'.$this->url[0].'.php';
                        $cont = new $this->url[0]();
                        if(method_exists($this->url[0],$this->url[1])){
                            $func = $this->url[1];
                            $cont->loadModel($this->url[0]); 
                            $cont->$func();
                        }
                        else{
                        require_once 'controllers/index.php';
                        $defcont = new index();
                        $defcont->loadModel('index'); 
                        $defcont->$default();
                    }
                    
                        
                 }
                 else{
                        require_once 'controllers/index.php';
                        $defcont = new index();
                        $defcont->loadModel('index'); 
                        $defcont->$default();
                    }
                    break;

                case 3:
                    
                    
                    if(file_exists('controllers/'.$this->url[0].'.php')){
                        
                        require 'controllers/'.$this->url[0].'.php';
                        $cont = new $this->url[0]();
                        if(method_exists($this->url[0],$this->url[1])){
                            $func = $this->url[1];
                            $cont->loadModel($this->url[0]); 
                            $cont->$func($this->url[2]);
                        }
                        else{
                       
                        require 'controllers/index.php';
                        $defcont = new index();
                        $defcont->loadModel('index'); 
                        $defcont->$default();
                    }
                    
                        
                 }
                 else{
                        
                        require_once 'controllers/index.php';
                        $defcont = new index();
                        $defcont->loadModel('index'); 
                        $defcont->$default();
                    }
                    break;

                
            
            }
        }


        private function spliturl(){
           
            $tmp_url = NULL;
            $temp = array();
            if(!isset($_REQUEST['url']))
                $temp = 'index';
            else{
                $tmp_url = trim($_REQUEST['url'], "/# ");
                
                $temp = explode("/",$tmp_url);
                
            }
            
            return $temp;
        }



    }
?>

