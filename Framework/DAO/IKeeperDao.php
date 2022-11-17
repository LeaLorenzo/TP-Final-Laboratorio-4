<?php
namespace DAO;

use Models\Keeper as Keeper;
use DAO\Connection as Connection;

interface IKeeperDAO
{
    function Add(Keeper $keeper);
    function AddDiasDisponibles($fechaDesde,$fechaHasta,$idKeeper);
    function AddTarifa($valorDiario,$idKeeper);
    function GetKeeperById($idUser);
    function GetByIdKeeper($idKeeper);
    function GetAllKeeper();                        
    function GetAllDiasDisponible();
    function GetRangoFecha($fechaDesde, $fechaHasta);
    

}
?>