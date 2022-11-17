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
    


    public function Add($firstName, $lastName,$email)
    {
        $owner = new Owner($firstName, $lastName,$email);
        $owner->setFirstName($firstName);
        $owner->setLastName($lastName);
        $owner->setEmail($email);
        $this->ownerDAO->Add($owner);

        $this->ShowAddView();
    }
}


?>