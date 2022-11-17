<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "nav.php");
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use Models\User as User;
     use DAO\KeeperDAO as KeeperDAO;

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-sm">
            <h2 class="mb-4">Lista de Keepers</h2>
            <table class="table table-sm bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Keeper id</th>
                    <th>User Name Keeper</th>
                </thead>
                <tbody>
                <?php

                // echo $fechaDesde;
                // echo $fechaHasta;

                $keeperDAO= new KeeperDAO();

                $diaResult = $keeperDAO->GetRangoFecha($fechaDesde, $fechaHasta);
                foreach($diaResult as $dia)
                {
                        $keeper = $keeperDAO->GetByIdKeeper($dia->getIdKeeper());
                        // $fechaDesde= date("Y") . "-" . date("m") . "-" .date("d");
                        // echo date("Y-m-d",strtotime($fechaDesde."+ 1 days"));
                ?>      
                <tr>
                    <td><?php echo $dia->getFechaDesde() ?></td>
                    <td><?php echo $dia->getFechaHasta() ?></td>
                    <td><?php echo $dia->getIdKeeper() ?></td>
                    <td><?php echo $keeper[0]["userName"] ?></td>
                </tr>                               
                <?php 
                    }
                ?> 
                </tbody>
            </table>
        </div>
        <form action="<?php echo FRONT_ROOT ?>Reserv/ShowViewReservPets" method="post" class="bg-light-alpha p-5">
                    <div class="col-lg-3">
                        <label for="id">IdKeeeper</label>
                        <input type="number" name="idKeeper" class="form-control form-control-ml" required>
                    </div>
                    <?php
                    $_SESSION["fechaDesde"]=$fechaDesde;
                    $_SESSION["fechaHasta"]=$fechaHasta;
                    ?>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Elegir</button>     
        </form>
    </section>
</main>