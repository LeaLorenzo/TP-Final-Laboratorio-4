<?php
namespace DAO;

interface IKeeperDateDAO
{
    function Add($inicio,$fin,$idKeeper);
    function GetByIdKeeper($idKeeper);
    function GetByIdFechaDisponible($idFecha);
    function GetByDiaFiltro($diaFiltro);
    function GetAll();
}
?>