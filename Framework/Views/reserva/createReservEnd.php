<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "nav.php");
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use Models\User as User;
     use Models\Reserv as Reserv;
     use DAO\KeeperDAO as KeeperDAO;
     $keeperDAO = new KeeperDAO();
    $tarifa=$keeperDAO->GetTarifaKeeper($_SESSION["idKeeper"]);

?>
<main class="py-5">
    <section id="listado" class="mb-5">
            <table class="table table-sm bg-light text-center">

                <thead class="bg-dark text-white">
                    <th>Valor de Tarifa Keeper</th>
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $tarifa[0]["valorDiario"] ?></td>
                    <td><?php echo $_SESSION["fechaDesde"]?></td>
                    <td><?php echo $_SESSION["fechaHasta"]?></td>
                </tr>
                </tbody>


            </<table>
          <div class="container-sm">
          <table class="table table-sm bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Keeper Id</th>
                    <th>User Name</th>
                </thead>
                <tbody>
                    <?php 
                    $keeperDAO = new KeeperDAO();
                    $keeperL = $keeperDAO->GetByIdKeeper($_SESSION["idKeeper"]);
                    //var_dump($keeperL);
                    foreach($keeperL as $keeper){
                    ?>
                    <tr>
                        <td><?php echo $keeper["idKeepers"] ?></td>
                        <td><?php echo $keeper["userName"]?></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
               <thead class="bg-dark text-white">
                    <th>Pet id</th>
                    <th>Name</th>
               </thead>
               <tbody>
                    <?php                                                        
                    $petDAO = new PetDAO();
                    $petL = $petDAO->GetPetbyId($idPet);
                    //var_dump($petL);
                    foreach($petL as $pet){
                    ?>
                        <tr>
                            <td><?php echo $pet["idPets"] ?></td>
                            <td><?php echo $pet["name"]?></td>
                        </tr>
                    <?php 
                        }
                        $reserv = New Reserv();
                        $reserv->setFechaDesde($_SESSION["fechaDesde"]);
                        $reserv->setFechaHasta($_SESSION["fechaHasta"]);
                        $reserv->setValorTotal($tarifa[0]["valorDiario"]);
                        $reserv->setIdKeeper($keeper["idKeepers"]);
                        $reserv->setIdPets($pet["idPets"]);
                        $_SESSION["reserv"]=$reserv;
                    ?>
                </tbody>
          </table>
          </div>
        <form action="<?php echo FRONT_ROOT ?>Reserv/AddReserv" method="post" class="bg-light-alpha p-5">
            <div class="col-lg-4">
                <div class="form-group">
                        <label for="">Importe para reservar</label>
                        <input type="number" name="importeXreserva" value="$" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-dark ml-auto d-block">Reservar</button>     
        </form>
     </section>
</main>