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

    public function DiasDisponibles()
    {
        require_once(VIEWS_PATH."keeper-days.php");
    }

    public function AddDiasDisponibles($fechaDesde,$fechaHasta)
    {
        $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        //TODO COMPROBACION
        $this->keeperDAO->AddDiasDisponibles($fechaDesde,$fechaHasta,$keeper->getIdKeeper());
        require_once( VIEWS_PATH ."home.php");
    }

    public function EstablecerTarifa($valorTarifa)
    {
        $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        //TODO COMPROBACION
        $this->keeperDAO->AddTarifa($valorTarifa,$keeper->getIdKeeper());
        require_once( VIEWS_PATH ."home.php");
    }
}


?>