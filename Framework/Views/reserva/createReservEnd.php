                    <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Importe para Reservar</label>
                                   <input type="number" name="importeXreserva" value="$" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Valor Total</label>
                                   <input type="number" name="Valor Total" value="$2000" class="form-control">
                              </div>
                         </div>
                    </div>

                         <div class="container-sm">
                              <h2 class="mb-4">Listado de Mascotas</h2>
                              <table class="table table-sm bg-light text-center">
                                   <thead class="bg-dark text-white">
                                        <th>Pet id</th>
                                        <th>Name</th>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $petDAO = new PetDAO();

                                        $userOwner = $petDAO->GetOwnerbyId($_SESSION["loggedUser"]->getId());
                                        $petList=$petDAO->GetAll($userOwner->getIdOwner());
                                        foreach ($petList as $pet) {
                                        ?>
                                             <tr>
                                                  <td><?php echo $pet->getIdPets() ?></td>
                                                  <td><?php echo $pet->getName() ?></td>
                                             </tr>
                                        <?php
                                        }
                                        ?>
                                   </tbody>
                              </table>
                         </div>