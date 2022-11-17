<?php
namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\Keeper;
use Models\Owner;
use Models\PHPMailer as PHPMailer;
use Models\SMTP as SMTP;
use Models\Exception as Exception;

class EmailController
{

    public function enviarMail($email = "", $encabezado = "", $texto = "")
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

    public function enviarUrl($email = "", $encabezado = "")
    {
        $url = "localhost".FRONT_ROOT;
        //echo $url;

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

            $cuerpo = '<html>
            </head>
            <title>Validacion de cuenta</title>
            </head>
            <body>
            <p>Hola que tal, Se confirmo tu reserva.</p>
            <br>
            <p>Por favor terminar de pagar la reserva.</p>
            <br>
            <a href="'.$url.'">Ir a la pagina</a>
            <br>
            </body>
            </html>';
            $mail->Body = $cuerpo;

            //$mail->Body    =  '<a href="'.$url.'">Validar cuenta</a>';
            $mail->send();
        } catch (Exception $e) {
            echo "Se produjo un error: {$mail->ErrorInfo}";
        }
    }

}

?>