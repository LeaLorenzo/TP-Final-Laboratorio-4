<?php
    namespace Models;

    class User
    {
        private $id;
        private $email;
        private $password;
        private $typeUser;
        private $user;

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
            return $this->user;
        }
        
        public function setUser($user)
        {
            $this->user = $user;
        }
    }
?>
