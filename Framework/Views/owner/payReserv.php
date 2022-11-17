<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "owner/navOwner.php");
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use Models\User as User;
     use Models\Reserv as Reserv;
     use DAO\KeeperDAO as KeeperDAO;
     use DAO\OwnerDAO as OwnerDAO;


?>
<main class="py-5">
    <section id="listado" class="mb-5">
          <div class="container-sm">
          <table class="table table-sm bg-light text-center">
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

                    $ownerDAO = new OwnerDAO();
                    $owner = $ownerDAO->GetOwnerById($_SESSION["loggedUser"]->getId());


                    $reservList = $ownerDAO->GetReservPay($owner->getIdOwner());

                    foreach($reservList as $reserv){
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
        <form action="<?php echo FRONT_ROOT ?>Reserv/setEstadoPagado" method="post" class="bg-light-alpha p-5">
            <div class="col-lg-4">
                <div class="form-group">
                        <label for="">id Reserva</label>
                        <input type="number" name="idReserva" value="$" class="form-control">
                </div>
                <div class="form-group">
                        <label for="">Pagar lo que falta</label>
                        <input type="number" name="pagar" value="$" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-dark ml-auto d-block">Pagar</button>     
        </form>
     </section>
</main>