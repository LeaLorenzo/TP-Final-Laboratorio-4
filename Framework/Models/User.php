<?php
    namespace Models;

    abstract class User
    {
        private $id;
        private $firstName;
        private $lastName;
        private $dni;
        private $email;
        private $phone;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getFirstName()
        {
            return $this->firstName;
        }

        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        public function getDni()
        {
            return $this->dni;
        }

        public function setDni($dni)
        {
            $this->dni = $dni;
        }

        public function getEmail()
        {
            return $this->email;
        }
        
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPhone()
        {
            return $this->phone;
        }

        public function setPhone($phone)
        {
            $this->phone = $phone;
        }
    }
?>