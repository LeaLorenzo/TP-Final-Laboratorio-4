<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;  
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
                $query = "INSERT INTO ".$this->tableName." (firstName, lastName, dni, email) VALUES (:firstName, 
                :lastName, :dni, :email);";

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

        public function AddKeeper(Keeper $keeper)
        {
            try
            {
                $query = "INSERT INTO User (user,password, email,tipoUsuario) VALUES (
                :user, :password, :email,2);";

                $parameters["user"] = $keeper->getUser();
                $parameters["password"] = $keeper->getPassword();
                $parameters["email"] = $keeper->getEmail();

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

                $query = "SELECT idUser, user, email, password, tipoUsuario FROM user where email = :email";

                $parameters['email'] = $email;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                $user = null;
                if(!empty($resultSet)){
                    foreach($resultSet as $row){
                        $user = new User();
                        $user->setId($row["idUser"]);
                        $user->setUser($row["user"]);
                        $user->setEmail($row["email"]);
                        $user->setPassword($row["password"]);
                        $user->setTypeUser($row["tipoUsuario"]);
                    }
                }
                return $user;
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        /*
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
                return $user;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        */
        public function GetAll()
        {
        }

    }
?>