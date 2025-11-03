  <div class="col-xl-12">
      <div class="card">
          <div class="card-header">
              <h5 class="card-title mb-0">Productos</h5>
              <a class="btn btn-success" href="agregar">Agregar</a>
          </div><!-- end card header -->

  <input type="hidden" id="url" value="<?php echo $url ?>">

          <div class="card-body">
              <div class="table-responsive">
                  <table class="table mb-0">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Categoria</th>
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
                                  <td><?php echo $producto["id_producto"] ?></td>

                                  <td><?php echo $producto["nombre"] ?></td>
                                  <td><?php echo $producto["nombre_categoria"] ?></td>
                                  <td>$ <?php echo number_format($producto["precio"], 2) ?></td>
                                  <td><?php if ($producto["estado"] == 1) {
                                            echo '<span class="badge text-bg-success">Activo</span>';
                                        } else {
                                            echo '<span class="badge text-bg-danger">Inactivo</span>';
                                        } ?></td>
                                  <td>

                                      <a class="btn btn-warning" href="editar_producto/<?php echo $producto["id_producto"] ?>">
                                          <i class="fa-solid fa-pen-to-square"></i>
                                      </a>
                                      <button class="btn btn-danger btnEliminar" producto="<?php echo $producto["id_producto"] ?>" > <i class="fa-solid fa-trash"></i></button>
                                  </td>
                              </tr>
                          <?php }  ?>

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <?php
  $eliminarProducto = new ControladorProductos();
  $eliminarProducto->ctrEliminarProducto();
  ?>