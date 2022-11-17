<?php

require_once(VIEWS_PATH . "validate-session.php");
require_once(VIEWS_PATH . "keeper/navKeeper.php");

use DAO\KeeperDAO as KeeperDAO;
use Controllers\UserController;
use Models\User as User;
use Models\Keeper as Keeper;

?>
<main class="py-5">
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4">Lista de Keepers</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Keeper id</th>
                    <th>User id</th>
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
                                <td><?php echo $keeper->getIdUser() ?></td> 
                                <td><?php echo $keeper->getUser() ?></td>
                            </tr>
                              
                    <?php 
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </section>
    

    <!-- <section id="eliminar" class="mb-5">
        <form action="<?php echo FRONT_ROOT . "Pet/Remove" ?>" method="post">
            <div class="container">
                <h3 class="mb-3">Eliminar Mascota</h3>
                <div class="bg-light p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="id">Id</label>
                            <input type="number" name="id" id="id" class="form-control form-control-ml" required>
                        </div>
                        <div class="col-lg-3">
                            <span>&nbsp;</span>
                            <button type="submit" name="btn" class="btn btn-danger ml-auto d-block">Eliminar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section> HAY Q TERMINARLO-->
</main>

<?php

require_once(VIEWS_PATH."footer.php");
?>