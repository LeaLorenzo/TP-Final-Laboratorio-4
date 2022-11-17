<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "nav.php");

use DAO\KeeperDAO as KeeperDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;
use Models\Reserv as Reserv;
use DAO\ReservDAO as ReservDAO;

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
                </thead>
                <tbody>
                    <?php
                    $reserv = new Reserv();
                    $reservDAO = new ReservDAO();
                    $keeperDAO = new KeeperDAO();

                    $keeper = $this->keeperDAO->GetKeeperById($_SESSION["loggedUser"]->getId());

                    $reservList=$reservDAO->GetReservById($keeper->getIdKeeper());

                    foreach ($reservList as $reserv) {
                        if($reserv->getEstado()==0){
                    ?>
                            <tr>
                                <td><?php echo $reserv->getIdReserv() ?></td>
                                <td><?php echo $reserv->getFechaDesde() ?></td>
                                <td><?php echo $reserv->getFechaHasta() ?></td>
                                <td><?php echo $reserv->getImporteXreserva() ?></td>
                                <td><?php echo $reserv->getValorTotal() ?></td>
                                <td><?php echo $reserv->getIdKeeper() ?></td>
                                <td><?php echo $reserv->getIdPets() ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <form action="<?php echo FRONT_ROOT ?>Reserv/setEstado" method="post" class="bg-light-alpha p-5">
            <div class="col-lg-3">
                <label for="id">idReserv</label>
                <input type="number" name="idKeeper" class="form-control form-control-ml" required>
            </div>
            <button type="submit" class="btn btn-dark ml-auto d-block">Elegir Para Confirmar</button>     
        </form>
    </section>
</main>

<?php
    require_once(VIEWS_PATH."footer.php");
?>