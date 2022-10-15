<?php
namespace Models; 
class Owner extends User
{
    function __construct($firstName,$lastName,$dni,$email,$phone)
    {
        $this->firstName = $firstName;
        $this->lastname = $lastName;
        $this->dni = $dni;
        $this->email = $email;
        $this->phone = $phone;
    }
}
?>