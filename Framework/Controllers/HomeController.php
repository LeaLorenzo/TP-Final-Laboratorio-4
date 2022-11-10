<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            
            if(isset($_SESSION["loggedUser"])){
                //var_dump($_SESSION);
                //Si existe usuario en session pasa el logueo
                require_once(VIEWS_PATH."home.php");

            }else{
                //Si no hay usuario en session muestra el logueo
                require_once(VIEWS_PATH."login.php");
            }
        }              
    }
?>