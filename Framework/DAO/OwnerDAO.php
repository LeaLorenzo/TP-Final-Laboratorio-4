<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;    
    use DAO\Connection as Connection;

    class OwnerDAO implements IOwnerDAO
    {
        private $connection;
        private $tableName = "owners";

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
                $parameters["phone"] = $owner->getPhone();

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
                    $keeper = new Owner('$firstName', '$lastName', '$dni', '$email', '$phone');
                    $keeper->setFirstName($row["firstName"]);
                    $keeper->setLastName($row["lastName"]);
                    $keeper->setDni($row["dni"]);
                    $keeper->setEmail($row["email"]);
                    $keeper->setPhone($row["phone"]);

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