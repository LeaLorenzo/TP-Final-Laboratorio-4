<?php
namespace Models; 
class Keeper extends User
{
    private $petSize;
    private $payment;

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

    public function getPetSize()
    {
        return $this->petSize;
    }

    public function setPetSize($petSize)
    {
        $this->petSize = $petSize;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function setPayment($payment)
    {
        $this->payment = $payment;
    }
}
?>