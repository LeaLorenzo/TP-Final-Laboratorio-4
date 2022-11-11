<?php
namespace Models;
class Pet
{
    private $idPets;
     // TODO averiguar qué hacer con las fotos de las mascotas
    private $name;
    private $photo;
    private $breed;
    private $idTypePets; // existe size en la clase Keeper, creo que le corresponde a Pet
    private $healthBook; // TP pide imagen
    private $video;
    private $idOwner;


    public function getIdPets()
    {
        return $this->idPets;
    } 

    public function setIdPets($idPets)
    {
        $this->idPets = $idPets;
    }

    public function getIdOwner()
    {
        return $this->idOwner;
    } 

    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;
    }

    public function getPhoto()
    {
        return $this->photo;
    } 

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBreed()
    {
        return $this->breed;
    }

    public function setBreed($breed)
    {
        $this->breed = $breed;
    }

    public function getIdTypePets()
    {
        return $this->idTypePets;
    }

    public function setIdTypePets($idTypePets)
    {
        $this->idTypePets = $idTypePets;
    }

    public function getHealthBook()
    {
        return $this->healthBook;
    }

    public function setHealthBook($healthBook)
    {
        $this->healthBook = $healthBook;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;
    }
}
?>