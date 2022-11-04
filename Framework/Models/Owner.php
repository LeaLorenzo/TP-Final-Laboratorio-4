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
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setLastName($lasttName)
    {
        $this->lastName = $lasttName;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
?>