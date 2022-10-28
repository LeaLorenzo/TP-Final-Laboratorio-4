<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IKeeperDAO as IKeeperDAO;
    use Models\Keeper as Keeper;    
    use DAO\Connection as Connection;

    class KeeperDAO implements IKeeperDAO
    {
        private $connection;
        private $tableName = "keepers";

        public function Add(Keeper $keeper)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (firstName, lastName, dni, email, phone, petSize, payment) VALUES (:firstName, 
                :lastName, :dni, :email, :phone, :petSize, :payment);";

                $parameters["firstName"] = $keeper->getFirstName();
                $parameters["lastName"] = $keeper->getLastName();
                $parameters["dni"] = $keeper->getDni();
                $parameters["email"] = $keeper->getEmail();
                $parameters["phone"] = $keeper->getPhone();
                $parameters["petSize"] = $keeper->getPetSize();
                $parameters["Payment"] = $keeper->getPayment();

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
                    $keeper = new Keeper('$firstName', '$lastName', '$dni', '$email', '$phone', '$petSize', '$payment');
                    $keeper->setFirstName($row["firstName"]);
                    $keeper->setLastName($row["lastName"]);
                    $keeper->setDni($row["dni"]);
                    $keeper->setEmail($row["email"]);
                    $keeper->setPhone($row["phone"]);
                    $keeper->setPetSize($row["petSize"]);
                    $keeper->setPayment($row["payment"]);

                    array_push($keeperList, $keeper);
                }

                return $keeperList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }