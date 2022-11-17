<?php 
     require_once(VIEWS_PATH . "keeper/navKeeper.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">HOME KEEPER</h2>
               <form action="<?php echo FRONT_ROOT ?>Pet/ShowAddView" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Ver Reviews</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Keeper/ShowAllKeeper" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Lista de Keepers</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Keeper/ListReserv" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Lista de Reservas</button>
               </form>
          </div>
     </section>
</main>