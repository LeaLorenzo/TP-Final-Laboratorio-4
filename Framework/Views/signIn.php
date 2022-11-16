<?php
   if(isset($_SESSION["signInType"])){
          echo $_SESSION["signInType"];
     }

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ingresar Usuario</h2>
               <form action="<?php echo FRONT_ROOT ?>User/SignUp" method="post" class="bg-light-alpha p-5">
                    <div class="row">    
                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">email</label>
                                   <input type="text" name="email" value="" class="form-control" placeholder="email">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">password</label>
                                   <input type="password" name="password" class="form-control" id="idPass" placeholder="password">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Confirmar password</label>
                                   <input type="password" name="confirmacion" class="form-control" id="idPass" placeholder="confirmacion">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">usuario</label>
                                   <input type="text" name="user" class="form-control" placeholder="usuario">
                              </div>
                         </div>
                    </div>
                    <div class="row">    
                    <?php
                         if($_SESSION["signInType"] == 1){
                              require_once(VIEWS_PATH."signInOwner.php");
                         }
                    ?>

                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Registrar</button>
               </form>
          </div>
     </section>
</main>