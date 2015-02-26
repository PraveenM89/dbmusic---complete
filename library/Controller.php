<?php
    class Controller{

        public function __construct(){
            $this->view = new View();
            

        }

        public function loadModel($controller){
            
            $file = "model/".$controller."_model.php";
            $class = $controller."_Model";
            
            if(file_exists($file)){
                require $file;
                
                $this->model = new $class();
            }

        }
    }    
    
?>


