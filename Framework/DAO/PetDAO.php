<?php
namespace DAO;

use \Exception as Exception;
use DAO\IPetDAO as IPetDAO;
use Models\Pet as Pet;    
use Models\Owner as Owner;  
use DAO\Connection as Connection;

class PetDAO implements IPetDAO
{
    private $connection;

    public function Add(Owner $owner,Pet $pet)
    {
        try
        {
            $query = "INSERT INTO Pets ( name, raza, planVacuna, foto, video, idPetsType, idOwner) 
            VALUES (:name, :breed, :healthBook, :photo, :video, :idTypePets, :idOwner);";

            $parameters["name"] = $pet->getName();
            $parameters["breed"] = $pet->getBreed();
            $parameters["healthBook"] = $pet->gethealthBook();       
            $parameters["photo"] = $pet->getPhoto();
            $parameters["video"] = $pet->getVideo(); 
            $parameters["idTypePets"] = $pet->getIdTypePets();
            $parameters["idOwner"] = $pet->getIdOwner();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetOwnerbyId($idUser)
    {
        try
        {

            $query = "SELECT o.idOwner, o.name, o.surname, o.idUser FROM user u inner join owner o on u.idUser = o.idUser
            where o.idUser = :idUser";

            $parameters['idUser'] = $idUser;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            $user = null;
            if(!empty($resultSet)){
                foreach($resultSet as $row){
                    $user = new Owner();
                    $user->setIdOwner($row["idOwner"]);
                    $user->setFirstName($row["name"]);
                    $user->setLastName($row["surname"]);
                    $user->setIdUser($row["idUser"]);
                }
            }
            return $user;
            
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetAll($idOwner)
    {
        try
        {
            $petsList = array();

            $query = "SELECT * FROM pets where idOwner = :idOwner";

            $parameters['idOwner'] = $idOwner;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);
            
            foreach ($resultSet as $row)
            {                
                $pet = new Pet();
                $pet->setIdPets($row["idPets"]);
                $pet->setName($row["name"]);
                $pet->setBreed($row["raza"]);
                $pet->setHealthBook($row["planVacuna"]);    
                $pet->setPhoto($row["foto"]);
                $pet->setVideo($row["video"]);
                $pet->setIdTypePets($row["idPetsType"]);
                $pet->setIdOwner($row["idOwner"]);

                array_push($petsList, $pet);
            }

            return $petsList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    public function GetPetById($idPets)
    {
        try
        {

            $query = "select * from pets
            where idPets = :idPets";

            $parameters['idPets'] = $idPets;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query, $parameters);

            return $resultSet;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    // public function removePet($idOwner){
    //     try
    //     {
    //         $query = "DELETE FROM `pethero`.`pets` WHERE (`idPets` = '12');";

    //     }
    // }
}
?>