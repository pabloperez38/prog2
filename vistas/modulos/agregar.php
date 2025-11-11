 <?php
    $categorias = ControladorCategorias::ctrMostrarCategorias(null, null);
    //print_r($categorias);
    ?>
 <div class="col-xl-12">
     <div class="card">
         <div class="card-header">
             <h5 class="card-title mb-0">Agregar</h5>

         </div><!-- end card header -->

         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
                 <div class="mb-3">
                     <label for="nombre" class="form-label">Nombre producto</label>
                     <input type="text" id="nombre" name="nombre" class="form-control" required>
                 </div>
                 <div class="mb-3">
                     <label for="categorias" class="form-label">Categoría</label>
                     <select id="categoria" name="categoria" class="form-select">
                         <option selected="">Seleccione una categoría</option>
                         <?php foreach ($categorias as $categoria) { ?>
                             <option value="<?php echo $categoria["id_categoria"] ?>"><?php echo $categoria["nombre"] ?></option>
                         <?php } ?>

                     </select>
                 </div>

                 <input type="hidden" name="estado" value="1">

                  <div class="mb-3">
                    <input type="file" name="foto" id="">
                  </div>

                 <div class="mb-3">
                     <label for="precio" class="form-label">Precio producto</label>
                     <input type="number" id="precio" name="precio" class="form-control" required>
                 </div>

                  <div class="mb-3">
                     <label for="precio" class="form-label">Fecha</label>
                     <input type="date" id="precio" name="fecha" class="form-control" required>
                 </div>

                 <?php 
                 $agregar = new ControladorProductos();
                 $agregar -> ctrAgregarProducto();
                 ?>

                 <button class="btn btn-success" type="submit">Guardar</button>
             </form>
         </div>
     </div>
 </div>