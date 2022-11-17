<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "owner/navOwner.php");
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use Models\User as User;
     use DAO\KeeperDAO as KeeperDAO;

     $_SESSION["idKeeper"]=$idKeeper;
?>
<main class="py-5">
    <section id="listado" class="mb-5">
          <div class="container-sm">
          <h2 class="mb-4">Listado de tus Mascotas</h2>
          <table class="table table-sm bg-light text-center">
               <thead class="bg-dark text-white">
                    <th>Pet id</th>
                    <th>Name</th>
               </thead>
               <tbody>
                    <?php
                    $petDAO = new PetDAO();

                    $userOwner = $petDAO->GetOwnerbyId($_SESSION["loggedUser"]->getId());
                    $petList=$petDAO->GetAll($userOwner->getIdOwner());
                    foreach ($petList as $pet) {
                    ?>
                         <tr>
                              <td><?php echo $pet->getIdPets() ?></td>
                              <td><?php echo $pet->getName() ?></td>
                         </tr>
                    <?php
                    }
                    ?>
               </tbody>
          </table>
          </div>
          <form action="<?php echo FRONT_ROOT ?>Reserv/ShowViewReservEnd" method="post" class="bg-light-alpha p-5">
                    <div class="col-lg-3">
                        <label for="id">IdPets</label>
                        <input type="number" name="idPet" class="form-control form-control-ml" required>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Elegir Mascota</button>     
        </form>
     </section>
</main>