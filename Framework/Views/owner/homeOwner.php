<?php 

     require_once(VIEWS_PATH . "nav.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">HOME <?php if($_SESSION['loggedUser']->getTypeUser()==1){ echo "OWNER";} else{ echo "KEEPER";} ?></h2>
               <form action="<?php echo FRONT_ROOT ?>Pet/ShowAddView" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar Mascota</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Pet/ShowAllPets" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Lista de Mascotas</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Reserv/ShowReservCreate" method="post" class="bg-light-alpha p-5">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Reservar Keepers</button>
               </form>
          </div>
     </section>
</main>