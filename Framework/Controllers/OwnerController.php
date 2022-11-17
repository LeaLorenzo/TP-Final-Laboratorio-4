<?php
namespace Controllers;

use DAO\OwnerDAO as OwnerDAO;
use Models\Owner as Owner;

class OwnerController
{
    private $ownerDAO;

    public function __construct()
    {
        $this->ownerDAO = new ownerDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH."owner-add.php");
    }

    public function ShowListView()
    {
        $studentList = $this->ownerDAO->GetAll();

        require_once(VIEWS_PATH."owner-list.php");
    }

    public function ShowToPayReserv()
    {
        require_once(VIEWS_PATH."owner/payReserv.php");
    }
    


    public function Add($firstName, $lastName,$dni,$email,$phone)
    {
        $owner = new Owner($firstName, $lastName,$dni,$email,$phone);
        $owner->setFirstName($firstName);
        $owner->setLastName($lastName);
        $owner->setDni($dni);
        $owner->setEmail($email);
        $owner->setPhone($phone);

        $this->ownerDAO->Add($owner);

        $this->ShowAddView();
    }
}


?>