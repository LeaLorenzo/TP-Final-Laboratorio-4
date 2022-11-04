<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ingresar Usuario</h2>
               <form action="<?php echo FRONT_ROOT ?>User/Login" method="post" class="bg-light-alpha p-5">
                    <div class="row">    
                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">email</label>
                                   <input type="text" name="firstName" value="" class="form-control" placeholder="email">
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
                                   <label for="">user</label>
                                   <input type="text" name="user" value="" class="form-control" placeholder="user">
                              </div>
                         </div>
                     
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Entrar</button>
               </form>
          </div>
     </section>
</main>