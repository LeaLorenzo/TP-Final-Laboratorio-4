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

    public function ListReserv(){
        require_once(VIEWS_PATH."keeper/reserv-list-keeper.php");
    }
    public function AddDiasDisponibles($fechaDesde,$fechaHasta)
    {
        $flag=0;
        
        $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        $keeperList = $this->keeperDAO->GetRangoFecha($fechaDesde, $fechaHasta);
        if(count($keeperList)>= 0){
            foreach($keeperList as $keeperDia){
                if($keeperDia->getIdKeeper()==$keeper->getIdKeeper()){
                    $flag=1;
                }
            }
        }
        if($flag==0){
            $this->keeperDAO->AddDiasDisponibles($fechaDesde,$fechaHasta,$keeper->getIdKeeper());
            echo "Fecha cargada";
        }else{
            echo "Fecha ya cargada";
        }

        require_once( VIEWS_PATH ."keeper/homeKeeper.php");
    }

   
    public function EstablecerTarifa($valorTarifa)
    {
        $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());
        //TODO COMPROBACION
        $this->keeperDAO->AddTarifa($valorTarifa,$keeper->getIdKeeper());
        require_once( VIEWS_PATH ."keeper/homeKeeper.php");
    }
}


?>