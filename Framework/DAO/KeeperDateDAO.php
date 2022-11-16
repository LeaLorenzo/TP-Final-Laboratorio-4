<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IKeeperDateDAO as IKeeperDateDAO; 
    use DAO\Connection as Connection;

    class UserDAO implements IKeeperDateDAO
    {
        private $connection;
        private $tableName = "user";

        public function Add($inicio,$fin,$idKeeper)
        {
            try
            {
                $query = "INSERT INTO diasdisponibles (fecha,hasta, idKeeper) VALUES (
                :fecha, :hasta, :idKeeper);";

                $parameters["fecha"] = $inicio;
                $parameters["hasta"] = $fin;
                $parameters["idKeeper"] = $idKeeper;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
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

                $query = "SELECT idDiasDisponibles, fecha, hasta, idKeeper FROM diasdisponibles where idKeeper = :idKeeper";

                $parameters['idKeeper'] = $idKeeper;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                return $resultSet;
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByIdFechaDisponible($idFecha)
        {
            try
            {

                $query = "SELECT idDiasDisponibles, fecha, hasta, idKeeper FROM diasdisponibles where idDiasDisponibles = :idFecha";

                $parameters['idFecha'] = $idFecha;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                return $resultSet;
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByDiaFiltro($diaFiltro)
        {
            try
            {

                $query = "SELECT idDiasDisponibles, fecha, hasta, idKeeper FROM diasdisponibles"; 
                // Falta el filtro de dias

                //$parameters['idKeeper'] = $idKeeper;

                $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query/*, $parameters*/);
                return $resultSet;
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
        }
    }
?>