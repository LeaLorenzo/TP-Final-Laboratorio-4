<?php
namespace DAO;

use Models\Reserv as Reserv;
use DAO\Connection as Connection;

interface IReservDAO
{
    function Add(Reserv $reserv);
    function GetReservById($idKeeper);
    function setReservEstado($idReserv);
}
?>