 <?php
    $producto = ControladorProductos::ctrMostrarProductos("id_producto", $pagina[1]);
    $categorias = ControladorCategorias::ctrMostrarCategorias(null, null);
    //print_r($producto);
    ?>
 <div class="col-xl-12">
     <div class="card">
         <div class="card-header">
             <h5 class="card-title mb-0">Editar</h5>

         </div><!-- end card header -->

         <div class="card-body">
             <form method="POST">
                 <div class="mb-3">
                     <label for="nombre" class="form-label">Nombre producto</label>
                     <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $producto["nombre"] ?>" required>
                 </div>
                 <div class="mb-3">
                     <label for="categorias" class="form-label">Categoría</label>
                     <select id="categoria" name="categoria" class="form-select">
                         <?php foreach ($categorias as $categoria) { ?>
                             <option value="<?php echo $categoria["id_categoria"]; ?>"
                                 <?php
                                 if ($categoria["id_categoria"] === $producto["id_categoria"]) { ?>
                                 selected
                                 <?php } ?>><?php echo $categoria["nombre"] ?>
                             </option>
                         <?php } ?>

                     </select>
                 </div>

                 <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">

                 <div class=" mb-3">
                     <label for="precio" class="form-label">Precio producto</label>
                     <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $producto["precio"] ?>" required>
                 </div>

                 <div class="mb-3">
                     <label for="estado" class="form-label">Estado</label>
                     <select id="estado" name="estado" class="form-select">

                         <option value="1" <?php if ($producto["estado"] == 1) { ?>selected <?php }  ?>>Activo</option>
                         <option value="0" <?php if ($producto["estado"] == 0) { ?>selected <?php }  ?>>Inactivo</option>

                     </select>
                 </div>

                 <?php
                    $editar = new ControladorProductos();
                    $editar->ctrEditarProducto();
                ?>

                 <button class="btn btn-success" type="submit">Guardar</button>
             </form>
         </div>
     </div>
 </div>