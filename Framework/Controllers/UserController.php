<?php
namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\Keeper;
use Models\Owner;
use Models\PHPMailer as PHPMailer;
use Models\SMTP as SMTP;
use Models\Exception as Exception;

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
                if($_SESSION['loggedUser']->getTypeUser()==1){ 
                    require_once(VIEWS_PATH."owner/homeOwner.php");
                }else{ 
                    require_once(VIEWS_PATH."keeper/homeKeeper.php");
                }
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

    public function SignIn()
    {
        $userDB = null;
        if(isset($_POST["firstName"])){
            $userDB = new Owner();
            $userDB->setUser($_POST["userName"]);
            $userDB->setEmail($_POST["email"]);
            $userDB->setPassword($_POST["password"]);
            $userDB->setFirstName($_POST["firstName"]);
            $userDB->setLastName($_POST["lastName"]);
            $this->userDAO->AddOwner($userDB);

            $_SESSION["loggedUser"] = $userDB;
            $_REQUEST["errorLogueo"] = "Email incorrecto";
            require_once(VIEWS_PATH."login.php");
        }
        else{
            $userDB = new Keeper();
            $userDB->setUser($_POST["user"]);
            $userDB->setEmail($_POST["email"]);
            $userDB->setPassword($_POST["password"]);
            $this->userDAO->AddKeeper($userDB);

            $_SESSION["loggedUser"] = $userDB;
            $_REQUEST["errorLogueo"] = "Email incorrecto";
            require_once(VIEWS_PATH."login.php");
        }
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

    public function enviarMail($email = "", $encabezado = "", $texto = "", $imagen = null)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = USERNAME_MAIL;                  
            $mail->Password   = PASSWORD_MAIL;                         
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->setFrom(USERNAME_MAIL, 'PetHero');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $encabezado;
            $mail->Body    = $texto;
            $mail->send();
        } catch (Exception $e) {
            echo "Se produjo un error: {$mail->ErrorInfo}";
        }
    }
}

?>