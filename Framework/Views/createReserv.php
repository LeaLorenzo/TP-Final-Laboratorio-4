<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once('nav.php');
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use DAO\KeeperDAO as KeeperDAO;

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Crear Reserva</h2>
               <form action="<?php echo FRONT_ROOT ?>Pet/AddPet" method="post" class="bg-light-alpha p-5">
               <!-- private $idReserv;
        private $fechaDesde;
        private $fechaHasta;
        private $importeXreserva;
        private $valorTotal;
        private $idKeeper;
        private $idPets; -->
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha Desde</label>
                                   <input type="date" name="fechaDesde" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha Hasta</label>
                                   <input type="date" name="fechaHasta" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Importe para Reservar</label>
                                   <input type="text" name="importeXreserva" value="$" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Valor Total</label>
                                   <input type="text" name="Valor Total" value="$2000" class="form-control">
                              </div>
                         </div>
                    </div>

                         <div class="container-sm">
                              <h2 class="mb-4">Listado de Mascotas</h2>
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
                         <div class="container-sm">
                         <h2 class="mb-4">Lista de Keepers</h2>
                         <table class="table table-sm bg-light text-center">
                              <thead class="bg-dark text-white">
                                   <th>Keeper id</th>
                                   <th>User Name</th>
                              </thead>
                              <tbody>
                                   <?php

                                   $keeperDAO = new KeeperDAO();
                              
                                   $keeperList=$keeperDAO->GetAllKeeper();

                                   foreach ($keeperList as $keeper){                      
                                   ?>      
                                        <tr>
                                             <td><?php echo $keeper->getIdKeeper() ?></td>
                                             <td><?php echo $keeper->getUser() ?></td>
                                        </tr>
                                                  
                                   <?php 
                                        }
                                   ?> 
                              </tbody>
                         </table>
                         </div>

                    <button type="submit" class="btn btn-dark ml-auto d-block">Reservar</button>
               </form>
          </div>
     </section>
</main>
