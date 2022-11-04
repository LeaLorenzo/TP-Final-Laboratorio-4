<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;    
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "user";

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
        public function GetByEmail($email)
        {
            try{
                $user = null;

                $query = "SELECT * FROM " . $this->tableName . " WHERE (email = :email)";

                $parameters["email"] = $email;

                $this->connection = Connection::GetInstance();

                $results = $this->connection->Execute($query, $parameters);
                
                var_dump($results);
                /*  foreach ($results as $row) {
                    $user = new User();
                    $user->setId($row["id_user"]);
                    $user->setName($row["name"]);
                    $user->setLastname($row["lastname"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setRol($row["rol"]);
                }
                */
                return $user;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    }
?>