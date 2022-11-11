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
                $query = "INSERT INTO User (user,password, email,tipoUsuario) VALUES (
                :user, :password, :email,1);";

                $parameters["user"] = $owner->getUser();
                $parameters["password"] = $owner->getPassword();
                $parameters["email"] = $owner->getEmail();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $idDB = $this->GetByEmail($parameters["email"]);
                $parameters = null;
                $query = null;
                if(isset($idDB)){
                    $query = "INSERT INTO Owner (name, surname,idUser) VALUES (
                        :name, :surname, :idUser);";
        
                    $parameters["name"] = $owner->getFirstName();
                    $parameters["surname"] = $owner->getLastName();
                    $parameters["idUser"] = $idDB->getId();
    
                    $this->connection = Connection::GetInstance();
    
                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
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

                $idDB = $this->GetByEmail($parameters["email"]);
                $parameters = null;
                $query = null;
                if(isset($idDB)){
                    $parameters["idUser"] = $idDB->getId();
                    $query = "INSERT INTO keepers (idUser) VALUES (
                        :idUser);";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
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
        
        public function GetAll()
        {
        }

    }
?>