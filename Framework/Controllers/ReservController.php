<?php
namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use Models\Keeper as Keeper;
use Models\Reserv as Reserv;
use Models\DiaDisponible as DiaDisponible;

class ReservController
{
    private $reservDAO;

    public function __construct()
    {
        $this->reservDAO = new ReservDAO();
    }

    public function ShowReservCreate()
    {
        require_once(VIEWS_PATH."reserva/createReserv.php");    
    }
    public function ShowViewReservKeeper($fechaDesde, $fechaHasta)
    {
        require_once(VIEWS_PATH."reserva/createReservKeeper.php");
    }
    public function ShowViewReservPets($idKeeper)
    {
        require_once(VIEWS_PATH."reserva/createReservPets.php");    
    }
    public function ShowViewReservEnd($idPet)
    {
        require_once(VIEWS_PATH."reserva/createReservEnd.php");
    }
    public function ShowAllKeeper()
    {
        require_once(VIEWS_PATH."keeper/keeper-list.php");
    }
    public function ShowViewHome(){
        require_once( VIEWS_PATH ."owner/homeOwner.php");
    }   

    public function AddReserv($importeXreserva)
    {
        
        $_SESSION["reserv"]->setImporteXreserva($importeXreserva);

        $reserv=new Reserv();

        $reserv=$_SESSION["reserv"];

        $this->reservDAO->Add($reserv);

        $this->ShowViewHome();
    }
}


?>








