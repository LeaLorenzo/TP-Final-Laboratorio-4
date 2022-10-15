<?php 

// Este archivo debe borrarse. 
// Se mantiene por posibles conflictos con el Framework //

    namespace Models;

    use Models\User as User;

    class Student extends User
    {
        private $recordId;

        public function getRecordId()
        {
            return $this->recordId;
        }

        public function setRecordId($recordId)
        {
            $this->recordId = $recordId;
        }
    }
?>

