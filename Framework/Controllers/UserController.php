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
                $_REQUEST["errorLogueo"] = "Contraseña incorrecta";
                require_once(VIEWS_PATH."login.php");
            }
        }else {
            //Crea un mensaje get y redirige login
            $_REQUEST["errorLogueo"] = "Email incorrecto";
            require_once(VIEWS_PATH."login.php");
        }
    }

    public function SignUp($email,$password,$confirmarPassword,$user,$firstName = "",$lastName = "")
    {
        if($password == $confirmarPassword){
            $verificacionEmail = $this->userDAO->GetByEmail($email);
            if(empty($verificacionEmail)){
                $userDB = null;
                if(isset($_POST["tipoAnimal"])){
                    $userDB = new Keeper();
                    $userDB->setUser($user);
                    $userDB->setEmail($email);
                    $userDB->setPassword($password);
                    $userDB->setTipoMascota($_POST["tipoAnimal"]);
                    var_dump($userDB);
                    $this->userDAO->AddKeeper($userDB);
                }
                else
                {
                    $userDB = new Owner();
                    $userDB->setUser($user);
                    $userDB->setEmail($email);
                    $userDB->setPassword($password);
                    $userDB->setFirstName($firstName);
                    $userDB->setLastName($lastName);
                    var_dump($userDB);
                    $this->userDAO->AddOwner($userDB);
                }
            }
            else{
                $_REQUEST["errorLogueo"] = "Email ya registrado";
            }
        }
        else{
            $_REQUEST["errorLogueo"] = "Error en contraseña";
        }
        require_once(VIEWS_PATH."login.php");
    }

    public function SignUpMenu()
    {
        require_once(VIEWS_PATH."signUpMenu.php");
    }

    public function SignUpOwner()
    {
        $_SESSION["signUpType"] = 1;
        require_once(VIEWS_PATH."signUp.php");
    }

    public function SignUpKeeper()
    {
        $_SESSION["signUpType"] = 2;
        require_once(VIEWS_PATH."signUp.php");
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