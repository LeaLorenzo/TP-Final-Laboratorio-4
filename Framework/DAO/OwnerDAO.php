<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IOwnerDAO as IOwnerDAO;
    use Models\Owner as Owner;    
    use DAO\Connection as Connection;
    use Models\Reserv as Reserv;

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
                    $owner = new Owner('$firstName', '$lastName', '$dni', '$email', '$phone');
                    $owner->setFirstName($row["firstName"]);
                    $owner->setLastName($row["lastName"]);
                    $owner->setDni($row["dni"]);
                    $owner->setEmail($row["email"]);
                    $owner->setPhone($row["phone"]);

                    array_push($ownerList, $owner);
                }

                return $ownerList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function GetOwnerById($idUser)
        {
            try
            {
                $query = "select * from owner where idUser = :idUser";

                $parameters['idUser'] = $idUser;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query,$parameters);

                foreach ($resultSet as $row)
                {                           
                    $owner = new Owner();
                    $owner->setIdOwner($row["idOwner"]);
                    $owner->setFirstName($row["name"]);
                    $owner->setLastName($row["surname"]);
                    $owner->setIdUser($row["idUser"]);
                }
                return $owner;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetReservPay($idOwner){
            try{

                $reservList = array();
                $query="select r.idReserva, r.fechaDesde, r.fechaHasta, r.importexReserva, r.valorTotal, r.idKeeper, r.idPets, r.estado from reserva r
                        inner join pets p on p.idPets=r.idPets
                        inner join owner o on o.idOwner=p.idOwner
                        where o.idOwner = :idOwner and estado=1";

                $parameters['idOwner'] = $idOwner;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);

                foreach($resultSet as $row){
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
    }
?>