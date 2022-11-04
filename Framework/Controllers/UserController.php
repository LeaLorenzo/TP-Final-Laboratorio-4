<?php

namespace Controllers;

use Models\User as User;
use Utils\Session as Session;

class UserController
{
    public function Login($email, $password)
    {
        echo "hola".$email.$password;
        $this->user = new User();
        $this->user->setEmail($email);
        $this->user->setPassword($password);
        var_dump($this->user);

        if ($email === "email"  && $password === "1234" ) {
            
            $_SESSION["loggedUser"] = $this->user;
            
            header("Location: " . FRONT_ROOT . "Views/home.php");
        } else {
            echo "contraseña incorrecta";
            // $_SESSION["error"] = "Contraseña o email incorrectos";
            // header("Location: " . FRONT_ROOT . "Home/Index");
        }
    }

    public function Logout()
    {
        Session::VerifySession();
        Session::DeleteSession();
        header("Location: ". FRONT_ROOT . "Home/Index");
    }
}

?>

?>