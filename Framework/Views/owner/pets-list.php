<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "owner/navOwner.php");

use DAO\PetDAO as PetDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;

?>
<main class="py-5">
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Mascotas</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Pet id</th>
                    <th>Name</th>
                    <th>Foto</th>
                    <th>Plan de Vacunacion</th>
                    <th>Raza</th>
                    <th>Video</th>
                    <th>id Tipo de Perro</th>
                    <th>Owner id</th>
                </thead>
                <tbody>
                    <?php
                    $userOwner = new Owner();

                    $userOwner = $this->petDAO->GetOwnerbyId($_SESSION["loggedUser"]->getId());

                    $petDAO=new PetDAO();
                    $petList=$petDAO->GetAll($userOwner->getIdOwner());
                    foreach ($petList as $pet) {
                    ?>
                            <tr>
                                <td><?php echo $pet->getIdPets() ?></td>
                                <td><?php echo $pet->getName() ?></td>
                                <td><?php echo $pet->getPhoto() ?></td>
                                <td><?php echo $pet->getHealthBook() ?></td>
                                <td><?php echo $pet->getBreed() ?></td>
                                <td><?php echo $pet->getVideo() ?></td>
                                <td><?php echo $pet->getIdTypePets() ?></td>
                                <td><?php echo $pet->getIdOwner() ?></td>
                            </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    

    <!-- <section id="eliminar" class="mb-5">
        <form action="<?php echo FRONT_ROOT . "Pet/Remove" ?>" method="post">
            <div class="container">
                <h3 class="mb-3">Eliminar Mascota</h3>
                <div class="bg-light p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="id">Id</label>
                            <input type="number" name="id" id="id" class="form-control form-control-ml" required>
                        </div>
                        <div class="col-lg-3">
                            <span>&nbsp;</span>
                            <button type="submit" name="btn" class="btn btn-danger ml-auto d-block">Eliminar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section> HAY Q TERMINARLO-->
</main>

<?php

require_once(VIEWS_PATH."footer.php");
?>