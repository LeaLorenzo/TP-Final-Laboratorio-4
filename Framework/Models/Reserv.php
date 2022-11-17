<?php 

    namespace Models;

    class Reserv
    {
        private $idReserv;
        private $fechaDesde;
        private $fechaHasta;
        private $importeXreserva;
        private $valorTotal;
        private $idKeeper;
        private $idPets;
        private $estado;

        public function getIdReserv()
        {
            return $this->idReserv;
        }

        public function setIdReserv($idReserv)
        {
            $this->idReserv = $idReserv;
        }

        public function getFechaDesde()
        {
            return $this->fechaDesde;
        }

        public function setFechaDesde($fechaDesde)
        {
            $this->fechaDesde = $fechaDesde;
        }

        public function getFechaHasta()
        {
            return $this->fechaHasta;
        }

        public function setFechaHasta($fechaHasta)
        {
            $this->fechaHasta = $fechaHasta;
        }

        public function getImporteXreserva()
        {
            return $this->importeXreserva;
        }

        public function setImporteXreserva($importeXreserva)
        {
            $this->importeXreserva = $importeXreserva;
        }

        public function getValorTotal()
        {
            return $this->valorTotal;
        }

        public function setValorTotal($valorTotal)
        {
            $this->valorTotal = $valorTotal;
        }

        public function getIdKeeper()
        {
            return $this->idKeeper;
        }

        public function setIdKeeper($idKeeper)
        {
            $this->idKeeper= $idKeeper;
        }

        public function getIdPets()
        {
            return $this->idPets;
        }

        public function setIdPets($idPets)
        {
            $this->idPets = $idPets;
        }
        
        public function getEstado()
        {
            return $this->estado;
        }

        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
    }
?>

