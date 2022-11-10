<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\Owner as Owner;
    use Models\Keeper as Keeper;  
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "user";

        public function AddOwner(Owner $owner)
        {
            try
            {
                $query = "INSERT INTO User (user,password, email,tipoUsuario) VALUES (
                :user, :password, :email,1);";

                $parameters["user"] = $owner->getUser();
                $parameters["password"] = $owner->getPassword();
                $parameters["email"] = $owner->getEmail();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
                $parameters = null;
                $query = null;

                $query = "INSERT INTO Owner (name, surname,idUser) VALUES (
                    :name, :surname, :idUser);";
    
                    $parameters["name"] = $owner->getFirstName();
                    $parameters["surname"] = "apellido";//$owner->getLastName();
                    $parameters["idUser"] = 2; // TODO: GETIDUSER
    
                    $this->connection = Connection::GetInstance();
    
                    $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function AddKeeper(Keeper $keeper)
        {
            try
            {
                $query = "INSERT INTO User (user,password, email,tipoUsuario) VALUES (
                :user, :password, :email,2);";

                $parameters["user"] = $keeper->getUser();
                $parameters["password"] = $keeper->getPassword();
                $parameters["email"] = $keeper->getEmail();
                // TODO: INSERCION TABLA KEEPER

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            try
            {
                $keeperList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $owner = new Owner('$firstName', '$lastName', '$dni', '$email');
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
        
        public function GetAll()
        {
        }

    }
?>