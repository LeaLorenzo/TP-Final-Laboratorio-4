<?php
namespace Models; 
class DiaDisponible
{
    private $idDiaDisponible;
    private $fechaHasta;
    private $fechaDesde;
    private $idKeeper;

    public function getIdDiaDisponible()
    {
        return $this->idDiaDisponible;
    }

    public function setIdDiaDisponible($idDiaDisponible)
    {
        $this->idDiaDisponible = $idDiaDisponible;
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

    public function getIdKeeper()
    {
        return $this->idKeeper;
    }

    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;
    }

  
}
?>