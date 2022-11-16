<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            
            if(isset($_SESSION["loggedUser"])){
                if($_SESSION['loggedUser']->getTypeUser()==1){ 
                    require_once(VIEWS_PATH."owner/homeOwner.php");
                }else{ 
                    require_once(VIEWS_PATH."keeper/homeKeeper.php");
                }
            }else{
                //Si no hay usuario en session muestra el logueo
                require_once(VIEWS_PATH."login.php");
            }
        }              
    }
?>