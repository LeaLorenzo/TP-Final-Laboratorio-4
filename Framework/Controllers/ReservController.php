<?php
namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use DAO\KeeperDAO as KeeperDAO;
use Controllers\EmailController as EmailController;
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
    
    public function setEstado($idReserv){

        $this->reservDAO->setReservEstado($idReserv);
        $keeperDAO = new KeeperDAO();

        $keeper = $keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        
        $this->emailController->enviarUrl($keeper->getEmail(), "confirmada");
        require_once( VIEWS_PATH ."keeper/homeKeeper.php");

    }
    public function setEstadoPagado($idReserv, $paga){

        //$this->reservDAO->setReservEstadoPagado($idReserv);

        $this->emailController->enviarMail($_SESSION["loggedUser"]->getEmail(), "pago","Paga realizada muchas gracias");
        require_once( VIEWS_PATH ."owner/homeOwner.php");

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








