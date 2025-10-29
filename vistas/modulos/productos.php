  <div class="col-xl-12">
      <div class="card">
          <div class="card-header">
              <h5 class="card-title mb-0">Productos</h5>
          </div><!-- end card header -->

          <div class="card-body">
              <div class="table-responsive">
                  <table class="table mb-0">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Acciones</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                            $productos = ControladorProductos::ctrMostrarProductos(null, null);

                            foreach ($productos as $producto) {

                            ?>

                              <tr>
                                  <th><?php echo $producto["id_producto"] ?></th>
                                  <td><?php echo $producto["nombre"] ?></td>
                                  <td>$ <?php echo number_format($producto["precio"], 2) ?></td>
                                  <td><?php if ($producto["estado"] == 1) {
                                            echo '<span class="badge text-bg-success">Activo</span>';
                                        } else {
                                            echo '<span class="badge text-bg-danger">Inactivo</span>';
                                        } ?></td>
                                  <td>Editar - Eliminar</td>
                              </tr>
                          <?php }  ?>

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>