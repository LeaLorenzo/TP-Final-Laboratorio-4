<?php
namespace Models; 
class Keeper extends User
{
    private $idKeeper;
    private $idUser;
    private $tipoMascota;

    public function getIdKeeper()
    {
        return $this->idKeeper;
    }

    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getTipoMascota()
    {
        return $this->tipoMascota;
    }

    public function setTipoMascota($tipoMascota)
    {
        $this->tipoMascota = $tipoMascota;
    }
}
?>