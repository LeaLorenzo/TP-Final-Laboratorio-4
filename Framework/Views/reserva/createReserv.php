<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "owner/navOwner.php");
     
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
               <h2 class="mb-4">Consultar Fecha Keeper</h2>
               <form action="<?php echo FRONT_ROOT ?>Reserv/ShowViewReservKeeper" method="post" class="bg-light-alpha p-5">
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
                    <button type="submit" class="btn btn-dark ml-auto d-block">Consultar Fecha</button>
               </form>
          </div>
     </section>
</main>
