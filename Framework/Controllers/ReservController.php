<?php
namespace Controllers;

use DAO\KeeperDAO as KeeperDAO;
use Models\Keeper as Keeper;
use Models\Reserv as Reserv;
use Models\DiaDisponible as DiaDisponible;

class ReservController
{


    public function ShowReservCreate()
    {
        require_once(VIEWS_PATH."reserva/createReserv.php");
    }

    public function ShowAllKeeper()
    {
        require_once(VIEWS_PATH."keeper/keeper-list.php");
    }
    public function ShowViewReservKeeper($fechaDesde, $fechaHasta)
    {
        require_once(VIEWS_PATH."reserva/createReservKeeper.php");
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








