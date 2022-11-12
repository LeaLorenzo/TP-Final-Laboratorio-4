<?php
namespace DAO;

use Models\Pet as Pet;
use DAO\Connection as Connection;
use Models\Owner as Owner;

interface IPetDAO
{
    function Add(Owner $owner,Pet $pet);
    function GetAll($idOwner);
    function GetOwnerbyId($idUser);
    
}
?>