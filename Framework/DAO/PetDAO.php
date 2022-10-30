<?php
namespace DAO;

use \Exception as Exception;
use DAO\IPetDAO as IPetDAO;
use Models\Pet as Pet;    
use DAO\Connection as Connection;

class PetDAO implements IPetDAO
{
    private $connection;
    private $tableName = "pet";

    public function Add(Pet $pet)
    {
        try
        {
            $query = "INSERT INTO ".$this->tableName." (photo, name, breed, size, healthBook, observation) 
            VALUES (:photo, :name, :breed, :size, :healthBook, :observation);";

            $parameters["photo"] = $pet->getPhoto();
            $parameters["name"] = $pet->getName();
            $parameters["breed"] = $pet->getBreed();
            $parameters["size"] = $pet->getSize();
            $parameters["healthBook"] = $pet->gethealthBook();
            $parameters["observation"] = $pet->getObservation();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try
        {
            $keeperList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $pet = new Pet('photo', 'name', 'breed', 'size', 'healthBook', 'observation');
                $pet->setPhoto($row["photo"]);
                $pet->setName($row["Name"]);
                $pet->setBreed($row["breed"]);
                $pet->setSize($row["size"]);
                $pet->setHealthBook($row["healthBook"]);
                $pet->setObservation($row["observation"]);

                array_push($petList, $pet);
            }

            return $petList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
}
?>