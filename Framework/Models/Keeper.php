<?php
namespace Models; 
class Keeper extends User
{
    private $idKeeper;
    private $idUser;

    /*
    function __construct($firstName,$lastName,$dni,$email,$phone,$petSize,$payment)
    {
        $this->firstName = $firstName;
        $this->lastname = $lastName;
        $this->dni = $dni;
        $this->email = $email;
        $this->phone = $phone;
        $this->petSize = $petSize;
        $this->payment = $payment;
    }
    */

    public function getIdKeeper()
    {
        return $this->idKeeper;
    }

    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
}
?>