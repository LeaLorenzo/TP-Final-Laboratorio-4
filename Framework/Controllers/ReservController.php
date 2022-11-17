<?php
namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use Controllers\EmailController as EmailController;
use DAO\KeeperDAO;
use Models\Reserv as Reserv;

class ReservController
{
    private $reservDAO;
    private $keeperDAO;
    private $emailController;

    public function __construct()
    {
        $this->reservDAO = new ReservDAO();
        $this->keeperDAO = new KeeperDAO();
        $this->emailController = new EmailController();
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
    public function ShowViewHomeOwner(){
        require_once( VIEWS_PATH ."owner/homeOwner.php");
    } 
    public function ShowViewHomeKeeper(){

        require_once( VIEWS_PATH ."keeper/homeKeeper.php");
    }  
    
    public function setEstado($idKeeper){

        $this->reservDAO->setReservEstado($idKeeper);
        $this->emailController->enviarUrl("theirsha17@gmail.com", "confirmada");
        require_once( VIEWS_PATH ."keeper/homeKeeper.php");

    }

    public function ShowListReservConfirm()
    {
        $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        $reservList=$this->reservDAO->GetReservConfirmById($keeper->getIdKeeper());
        require_once(VIEWS_PATH."keeper/reserv-list-confirm-keeper.php");
    }

    public function AddReserv($importeXreserva)
    {
        
        $_SESSION["reserv"]->setImporteXreserva($importeXreserva);
       

        $reserv=new Reserv();

        $reserv=$_SESSION["reserv"];

        $this->reservDAO->Add($reserv);

        $this->ShowViewHomeOwner();
    }
}


?>








