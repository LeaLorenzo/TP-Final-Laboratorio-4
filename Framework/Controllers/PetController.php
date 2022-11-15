<?php
namespace Controllers;

use Models\User as User;
use Models\Pet as Pet;
use Models\Owner as Owner;
use DAO\PetDAO as PetDAO;


class PetController
{
    private $petDAO;

    public function __construct()
    {
        $this->petDAO = new PetDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH."addPet.php");
    }

    public function ShowView($message = "Mascota Cargada") {
        
        require_once(VIEWS_PATH."home.php");

    }

    public function ShowAllPets()
    {
        require_once(VIEWS_PATH . "pets-list.php");
    }

    public function AddPet($name, $breed, $healthBook, $photo, $video, $idTypePets)
    {
        $userOwner = new Owner();

        $userOwner = $this->petDAO->GetOwnerbyId($_SESSION["loggedUser"]->getId());
        
        $pet = new Pet();
        $pet->setName($name);
        $pet->setBreed($breed);
        $pet->setHealthBook($healthBook);    
        $pet->setPhoto($photo);
        $pet->setVideo($video);
        $pet->setIdTypePets($idTypePets);
        $pet->setIdOwner($userOwner->getIdOwner());
        
        $this->petDAO->Add($userOwner, $pet);
        
        $this->ShowView();
    }
}

?>