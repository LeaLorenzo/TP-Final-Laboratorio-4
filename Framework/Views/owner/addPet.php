<?php
     require_once(VIEWS_PATH . "validate-session.php");
     use DAO\PetDAO as PetDAO;
     use Controllers\PetController;
     use Models\Pet as Pet;
     use Models\Owner as Owner;
     require_once(VIEWS_PATH . "owner/navOwner.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ingresar una Mascota</h2>
               <form action="<?php echo FRONT_ROOT ?>Pet/AddPet" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Raza</label>
                                   <input type="text" name="breed" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Plan de Vacunacion</label>
                                   <input type="text" name="healthBook" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Foto</label>
                                   <input type="text" name="photo" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Video</label>
                                   <input type="text" name="video" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Tipo de Mascota</label>
                                   <input type="radio" name="typePets" value="1" class="form-control">Pequeño<br>
                                   <input type="radio" name="typePets" value="2" class="form-control">Mediano<br>
                                   <input type="radio" name="typePets" value="3" class="form-control">Grande<br>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>