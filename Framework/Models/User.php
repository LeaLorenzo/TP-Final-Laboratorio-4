<?php
    namespace Models;

    class User
    {
        private $id;
        private $email;
        private $password;
        private $typeUser;
        private $userName;

        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }

        public function getEmail()
        {
            return $this->email;
        }
        
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }
        
        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getTypeUser()
        {
            return $this->typeUser;
        }
        
        public function setTypeUser($typeUser)
        {
            $this->typeUser = $typeUser;
        }

        public function getUser()
        {
            return $this->userName;
        }
        
        public function setUser($userName)
        {
            $this->userName = $userName;
        }
    }
?>
