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
                $query = "INSERT INTO User (userName,password, email,tipoUsuario) VALUES (
                :user, :password, :email,1);";

                $parameters["userName"] = $owner->getUser();
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
                $query = "INSERT INTO user (userName,password, email,tipoUsuario) VALUES (
                :userName, :password, :email,2);";

                $parameters["userName"] = $keeper->getUser();
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

                $query = "SELECT idUser, userName, email, password, tipoUsuario FROM user where email = :email";

                $parameters['email'] = $email;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                $user = null;
                if(!empty($resultSet)){
                    foreach($resultSet as $row){
                        $user = new User();
                        $user->setId($row["idUser"]);
                        $user->setUser($row["userName"]);
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
        
        public function GetUserNameAll()
        {
            try
            {
                $userList = array();

                $query = "SELECT userName, tipoUsuario FROM user";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                                
                    $user = new User();
                    $user->setUser($row["userName"]);
                    $user->setTypeUser($row["tipoUsuario"]);
                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    }
?>