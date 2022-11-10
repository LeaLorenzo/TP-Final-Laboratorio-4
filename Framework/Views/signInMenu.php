<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Registrar Usuario</h2>
               <div class="row">    
                    <div class="col-lg-4">
                         <form action="<?php echo FRONT_ROOT ?>User/SignInOwner" method="post" class="bg-light-alpha p-5">
                              <button type="submit" class="btn btn-dark ml-auto d-block">Registrar Owner</button>
                         </form>
                    </div>
                    <div class="col-lg-4">
                         <form action="<?php echo FRONT_ROOT ?>User/SignInKeeper" method="post" class="bg-light-alpha p-5">
                              <button type="submit" class="btn btn-dark ml-auto d-block">Registrar Keeper</button>     
                         </form>
                    </div>
               </div>
          </div>
     </section>
</main>