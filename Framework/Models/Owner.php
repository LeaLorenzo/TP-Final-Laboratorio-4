<?php
namespace Models; 
class Owner
{
    private $idOwner;
    private $firstName;
    private $lastName;
    private $idUser;


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
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getIdOwner()
    {
        return $this->idOwner;
    }
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;
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