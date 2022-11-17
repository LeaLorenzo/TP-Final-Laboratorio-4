<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IReservDAO as IReservDAO;
    use Models\Reserv as Reserv;    
    use DAO\Connection as Connection;

    class ReservDAO implements IReservDAO
    {
        private $connection;

        public function Add(Reserv $reserv)
        {
            try
            {
                $query = "INSERT INTO reserva (`fechaDesde`, `fechaHasta`, `importexReserva`, `valorTotal`, `idKeeper`, `idPets`) 
                VALUES (:fechaDesde, :fechaHasta, :importeXreserva, :valorTotal, :idKeeper, :idPets);";


                $parameters["fechaDesde"] = $reserv->getFechaDesde();
                $parameters["fechaHasta"] = $reserv->getFechaHasta();
                $parameters["importeXreserva"] = $reserv->getImporteXreserva();
                $parameters["valorTotal"] = $reserv->getValorTotal();
                $parameters["idKeeper"] = $reserv->getIdKeeper();
                $parameters["idPets"] = $reserv->getIdPets();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetReservById($idKeeper)
        {
            try
            {
                $reservList = array();

                $query = "SELECT * FROM reserva
                where idKeeper = :idKeeper";

                $parameters['idKeeper'] = $idKeeper;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {                                
                    $reserv = new Reserv();
                    $reserv->setIdReserv($row["idReserva"]);
                    $reserv->setFechaDesde($row["fechaDesde"]);
                    $reserv->setFechaHasta($row["fechaHasta"]);
                    $reserv->setImporteXreserva($row["importexReserva"]);
                    $reserv->setValorTotal($row["valorTotal"]);
                    $reserv->setIdKeeper($row["idKeeper"]);
                    $reserv->setIdPets($row["idPets"]);
                    $reserv->setEstado($row["estado"]);

                    array_push($reservList, $reserv);
                }
                return $reservList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function setReservEstado($idReserv){
        
            try
            {
                $query = "UPDATE reserva SET estado = '1' WHERE idReserva = :idReserv";

                $parameters["idReserv"] = $idReserv;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            }     
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>