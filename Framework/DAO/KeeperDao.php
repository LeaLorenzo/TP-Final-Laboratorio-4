<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IKeeperDAO as IKeeperDAO;
    use Models\Keeper as Keeper;    
    use DAO\Connection as Connection;
    use Models\DiaDisponible as DiaDisponible;


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
                $query = "SELECT k.idKeepers,k.preferencia, u.idUser, u.userName, u.email from user u
                inner join keepers k on k.idUser = u.idUser
                where u.idUser = :idUser";

                $parameters['idUser'] = $idUser;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query,$parameters);
                foreach ($resultSet as $row)
                {                                
                    $keeper = new Keeper();
                    $keeper->setIdKeeper($row["idKeepers"]);
                    $keeper->setIdUser($row["idUser"]);
                    $keeper->setUser($row["userName"]);
                    $keeper->setTipoMascota($row["preferencia"]);
                    $keeper->setEmail($row["email"]);
                }

                return $keeper;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByIdKeeper($idKeeper)
        {
            try
            {

                $query = "SELECT k.idKeepers,k.preferencia, u.idUser, u.userName, u.email FROM keepers k
                inner join user u on k.idUser = u.idUser
                where k.idKeepers = :idKeepers";

                $parameters['idKeepers'] = $idKeeper;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {                                
                    $keeper = new Keeper();
                    $keeper->setIdKeeper($row["idKeepers"]);
                    $keeper->setIdUser($row["idUser"]);
                    $keeper->setUser($row["userName"]);
                    $keeper->setTipoMascota($row["preferencia"]);
                    $keeper->setEmail($row["email"]);
                }
                return $resultSet;
                
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

                $query = "select k.idKeepers,k.preferencia, u.idUser, u.userName from keepers k
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
                    $keeper->setTipoMascota($row["preferencia"]);

                    array_push($keeperList, $keeper);
                }

                return $keeperList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function GetAllDiasDisponible()
        {
            try
            {
                $diasList = array();

                $query = "select * from diasdisponibles;";


                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                                
                    $diaD = new DiaDisponible();
                    $diaD->setIdDiaDisponible($row["idDiasDisponibles"]);
                    $diaD->setFechaDesde($row["fecha"]);
                    $diaD->setFechaHasta($row["hasta"]);
                    $diaD->setIdKeeper($row["idKeeper"]);
                    array_push($diasList, $diaD);
                }

                return $diasList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function GetRangoFecha($fechaDesde, $fechaHasta)
        {
            try
            {
                $diaList = array();
                $query = "select * from diasDisponibles 
                WHERE DATE(fecha) BETWEEN :fechaDesde AND :fechaHasta AND 
                DATE(hasta) BETWEEN :fechaDesde AND :fechaHasta;";

                $parameters['fechaDesde'] = $fechaDesde;
                $parameters['fechaHasta'] = $fechaHasta;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query,$parameters);
                foreach ($resultSet as $row)
                {                                
                    $diaD = new DiaDisponible();
                    $diaD->setIdDiaDisponible($row["idDiasDisponibles"]);
                    $diaD->setFechaDesde($row["fecha"]);
                    $diaD->setFechaHasta($row["hasta"]);
                    $diaD->setIdKeeper($row["idKeeper"]);
                    array_push($diaList, $diaD);
                }

                return $diaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetTarifaKeeper($idKeeper){
            try
            {
                $query = "select * from tarifakeeper
                where idKeeper = :idKeeper";

                $parameters['idKeeper'] = $idKeeper;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query,$parameters);

                return $resultSet;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }