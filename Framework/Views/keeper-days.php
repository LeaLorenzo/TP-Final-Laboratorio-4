<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "keeper/navKeeper.php");

use DAO\KeeperDAO as KeeperDAO;
use Controllers\UserController;
use Models\User as User;
use Models\Keeper as Keeper;

$fecha = date("Y") . "-" . date("m") . "-" .date("d") ;



?>
<main class="py-5">
        <div class="container">
            <h2 class="mb-4">Formulario dias disponibles</h2>
            <form action="<?php echo FRONT_ROOT ?>Keeper/AddDiasDisponibles" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha Desde</label>
                                   <input type="date" name="fechaDesde" min=<?php echo $fecha ?> value=<?php echo $fecha ?> class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha Hasta</label>
                                   <input type="date" name="fechaHasta" min=<?php echo $fecha ?> value=<?php echo $fecha ?> class="form-control">
                              </div>
                         </div>
                    </div>
                    <button 
                        type="submit" 
                        class="btn btn-dark ml-auto d-block">Agregar dias disponibles</button>
               </form>
               <h2 class="mb-4">Formulario Tarifa Keeper</h2>
               <form action="<?php echo FRONT_ROOT ?>Keeper/EstablecerTarifa" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Valor servicio</label>
                                   <input type="number" name="valorTarifa" min="1" value="1000" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button 
                        type="submit" 
                        class="btn btn-dark ml-auto d-block">Establecer Tarifa</button>
               </form>
        </div>
</main>

<?php

require_once(VIEWS_PATH."footer.php");
?>