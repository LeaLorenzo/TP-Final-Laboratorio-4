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

        public function AddDiasDisponibles($fechaDesde,$fechaHasta,$idKeeper)
        {
            try
            {
                $query = "INSERT INTO diasdisponibles (`fecha`, `hasta`, `idKeeper`) 
                VALUES (:fechaDesde,:fechaHasta,:idKeeper);";

                $parameters["fechaDesde"] = $fechaDesde;
                $parameters["fechaHasta"] = $fechaHasta;
                $parameters["idKeeper"] = $idKeeper;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function AddTarifa($valorDiario,$idKeeper)
        {
            try
            {
                $query = "INSERT INTO tarifakeeper (`valorDiario`,`idKeeper`) 
                VALUES (:valorDiario,:idKeeper);";

                $parameters["valorDiario"] = $valorDiario;
                $parameters["idKeeper"] = $idKeeper;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetKeeperById($idUser)
        {
            try
            {
                $query = "select idKeepers, idUser 
                from keepers where idUser = :idUser";

                $parameters['idUser'] = $idUser;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query,$parameters);
                foreach ($resultSet as $row)
                {                                
                    $keeper = new Keeper();
                    $keeper->setIdKeeper($row["idKeepers"]);
                    $keeper->setIdUser($row["idUser"]);
                }

                return $keeper;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAllKeeper()
        {
            try
            {
                $keeperList = array();

                $query = "select k.idKeepers, u.idUser, u.userName from keepers k
                inner join user u on k.idUser = u.idUser
                where u.idUser=k.idUser";


                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                                
                    $keeper = new Keeper();
                    $keeper->setIdKeeper($row["idKeepers"]);
                    $keeper->setIdUser($row["idUser"]);
                    $keeper->setUser($row["userName"]);

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