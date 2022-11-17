<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "nav.php");

use DAO\PetDAO as PetDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;
use Models\Reserv as Reserv;

?>
<main class="py-5">
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Mascotas</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">

                    <th>id Reserv</th>
                    <th>fechaDesde</th>
                    <th>fechaHasta</th>
                    <th>Importe Reserva</th>
                    <th>Valor Total</th>
                    <th>Id Keeper</th>
                    <th>Id Pets</th>
                    <th>Owner id</th>
                </thead>
                <tbody>
                    <?php
                    $reserv = new Reserv();
                    $reservDAO= new ReservDAO();

                    var_dump($_SESSION["loggedUser"]);

                    $reservList=$reservDAO->GetReservById();
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
</main>

<?php
    require_once(VIEWS_PATH."footer.php");
?>