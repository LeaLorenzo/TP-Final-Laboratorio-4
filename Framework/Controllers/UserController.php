<?php

namespace Controllers;

use Models\User as User;
use DAO\UserDAO as UserDAO;
use Models\Keeper;
use Models\Owner;

class UserController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Login($email, $password)
    {

        
        $userDB = $this->userDAO->GetByEmail($email);
        if(!empty($userDB)){
            if ($email === $userDB->getEmail()  && $password === $userDB->getPassword() ) {
                //Crea la session y redirige home
            $_SESSION["loggedUser"] = $userDB;
            require_once(VIEWS_PATH."home.php");

             } else {
                //Crea un mensaje get y redirige login
                $_GET["errorLogueo"] = "Contraseña incorrecta";
                require_once(VIEWS_PATH."login.php");
            }
        }else {
            //Crea un mensaje get y redirige login
            $_GET["errorLogueo"] = "Email incorrecto";
            require_once(VIEWS_PATH."login.php");
        }
    }

    public function SignUp($firstName,$user,$email,$password,$lastName)
    {
        $userDB = null;
        if(isset($firstName)){
            $userDB = new Owner();
            $userDB->setUser($user);
            $userDB->setEmail($email);
            $userDB->setPassword($password);
            $userDB->setFirstName($firstName);
            $userDB->setLastName($lastName);
            $this->userDAO->AddOwner($userDB);
        }
        else{
            $userDB = new Keeper();
            $userDB->setUser($user);
            $userDB->setEmail($email);
            $userDB->setPassword($password);
            $this->userDAO->AddKeeper($userDB);
        }
        $_SESSION["loggedUser"] = $userDB;
        require_once(VIEWS_PATH."home.php");
    }

    public function SignUpMenu()
    {
        require_once(VIEWS_PATH."signInMenu.php");
    }

    public function SignInOwner()
    {
        $_SESSION["signInType"] = 1;
        require_once(VIEWS_PATH."signIn.php");
    }

    public function SignInKeeper()
    {
        $_SESSION["signInType"] = 2;
        require_once(VIEWS_PATH."signIn.php");
    }

    public function Logout()
    {
        //Borra la session actual
        session_destroy();
        require_once(VIEWS_PATH . "login.php");
    }
}

?>