<?php
namespace DAO;

use Models\Owner as Owner;
use Models\Keeper as Keeper;
use DAO\Connection as Connection;

interface IUserDAO
{
    function AddOwner(Owner $user);
    function AddKeeper(Keeper $user);
    function GetAll();
    function GetByEmail($email);
}
?>