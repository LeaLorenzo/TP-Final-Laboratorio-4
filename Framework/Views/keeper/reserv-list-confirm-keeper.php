<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "keeper/navKeeper.php");

?>
<main class="py-5">
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Reservas confirmadas</h2>
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
                    foreach ($reservList as $reserv) {
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
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php
    require_once(VIEWS_PATH."footer.php");
?>