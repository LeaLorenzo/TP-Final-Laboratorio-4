<?php
namespace Models;
class Pet
{
    private $photo; // TODO averiguar qué hacer con las fotos de las mascotas
    private $name;
    private $breed;
    private $size; // existe size en la clase Keeper, creo que le corresponde a Pet
    private $healthBook; // TP pide imagen
    private $observation;

    function __construct($name,$breed,$size,$healthBook,$observation)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->size = $size;
        $this->healthBook = $healthBook;
        $this->observation = $observation;
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

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getHealthBook()
    {
        return $this->healthBook;
    }

    public function setHealthBook($healthBook)
    {
        $this->healthBook = $healthBook;
    }

    public function getObservation()
    {
        return $this->observation;
    }

    public function setObservation($observation)
    {
        $this->observation = $observation;
    }
}
?>