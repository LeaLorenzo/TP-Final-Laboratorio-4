<?php

namespace Controllers;

use Models\User as User;
use DAO\UserDAO as UserDAO;
use Models\Keeper;

class UserController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Login($email, $password)
    {
        $this->user = new User();

        //Prueba llamada dao
        $this->user->setEmail($email);
        $this->user->setPassword($password);

        if ($email === "email"  && $password === "1234" ) {
            //Crea la session y redirige home
            $_SESSION["loggedUser"] = $this->user;
            require_once(VIEWS_PATH."home.php");

        } else {
            //Crea un mensaje get y redirige login
            $_GET["errorLogueo"] = "Usuario incorrecto";
            require_once(VIEWS_PATH."login.php");
        }
    }

    public function SignIn()
    {
        $keeperDB = new Keeper();
        $keeperDB->setUser($_POST["user"]);
        $keeperDB->setEmail($_POST["email"]);
        $keeperDB->setPassword($_POST["password"]);
        $this->userDAO->AddKeeper($keeperDB);
    }

    public function SignInMenu()
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