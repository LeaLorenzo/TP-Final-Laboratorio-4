<?php
namespace Controllers;

use DAO\KeeperDAO as KeeperDAO;
use Models\Keeper as Keeper;

class KeeperController
{
    private $keeperDAO;

    public function __construct()
    {
        $this->keeperDAO = new KeeperDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH."keeper/keeper-add.php");
    }

    public function ShowAllKeeper()
    {
        require_once(VIEWS_PATH."keeper/keeper-list.php");
    }

    public function Add($firstName, $lastName,$dni,$email,$phone,$petSize,$payment)
    {
        $keeper = new Keeper($firstName, $lastName,$dni,$email,$phone,$petSize,$payment);
        $keeper->setFirstName($firstName);
        $keeper->setLastName($lastName);
        $keeper->setDni($dni);
        $keeper->setEmail($email);
        $keeper->setPhone($phone);
        $keeper->setPetSize($petSize);
        $keeper->setPayment($payment);

        $this->keeperDAO->Add($keeper);

        $this->ShowAddView();
    }
}


?>