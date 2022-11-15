<?php
namespace DAO;

use Models\Keeper as Keeper;
use DAO\Connection as Connection;

interface IKeeperDAO
{
    function Add(Keeper $keeper);
    function GetAllKeeper();
}
?>