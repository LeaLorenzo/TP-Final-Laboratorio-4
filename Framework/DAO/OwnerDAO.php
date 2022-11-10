<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;    
    use DAO\Connection as Connection;

    class OwnerDAO implements IOwnerDAO
    {
        private $connection;
        private $tableName = "owner";

        public function Add(Owner $owner)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (firstName, lastName, dni, email, phone) VALUES (:firstName, 
                :lastName, :dni, :email, :phone);";

                $parameters["firstName"] = $owner->getFirstName();
                $parameters["lastName"] = $owner->getLastName();
                $parameters["dni"] = $owner->getDni();
                $parameters["email"] = $owner->getEmail();
                

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
                    $owner = new Owner('$firstName', '$lastName', '$dni', '$email', '$phone');
                    $owner->setFirstName($row["firstName"]);
                    $owner->setLastName($row["lastName"]);
                    $owner->setDni($row["dni"]);
                    $owner->setEmail($row["email"]);
                    

                    array_push($ownerList, $owner);
                }

                return $ownerList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>