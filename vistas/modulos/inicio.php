<div class="row">
   
<?php
$cantidad =  ControladorProductos::ctrContarProductos(); ?>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="text-muted mb-3 fw-semibold">Productos</h4>
                        <h3 class="m-0 mb-3 fs-18"><?php echo $cantidad["total"] ?></h3>
                       
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>