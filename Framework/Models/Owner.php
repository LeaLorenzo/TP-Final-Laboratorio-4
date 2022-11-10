<?php
namespace Models; 
class Owner extends User
{
    function __construct($firstName,$lastName,$dni,$email)
    {
        $this->firstName = $firstName;
        $this->lastname = $lastName;
        $this->dni = $dni;
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getLastName()
    {
        return $this->lastname;
    }
    public function setLastName($lasttName)
    {
        $this->lastName = $lasttName;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
?>