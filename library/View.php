<?php
    class View{

        public function loadView($controller, $filename){
            $this->controller = $controller;
            $view = "views/".$controller."/".$filename.".php";
            if(!file_exists($view)) {
                echo "File not exist";
                return;
            } 
            else 
            {
                require_once "views/".$controller."/".$filename.".php";
            }
        }
    }
?>


