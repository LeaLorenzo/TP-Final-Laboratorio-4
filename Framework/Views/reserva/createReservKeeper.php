<?php
     require_once(VIEWS_PATH . "validate-session.php");   
     require_once(VIEWS_PATH . "nav.php");
     
     use Controllers\PetController;
     use Models\Pet as Pet;
     use DAO\PetDAO as PetDAO;
     use Models\Owner as Owner;
     use Models\Keeper as Keeper;
     use DAO\KeeperDAO as KeeperDAO;

?>
<main class="py-5">
    <section id="listado" class="mb-5">
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
    </section>
</main>