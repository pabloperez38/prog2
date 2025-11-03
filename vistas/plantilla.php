<?php
session_start();
$url = Plantilla::url(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Starter | Kadso - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $url; ?>vistas/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo $url; ?>vistas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="<?php echo $url; ?>vistas/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       <script src="<?php echo $url; ?>vistas/assets/js/scripts.js"></script>

</head>

<!-- body start -->

<body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">

        <?php include 'modulos/header.php'; ?>
        <?php include 'modulos/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-xxl">

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Sistema de administración web</h4>
                        </div>
                       
                    </div>

                    <?php
                    if (isset($_GET["pagina"])) {

                        $pagina = explode("/", $_GET["pagina"]);
                       // print_r($pagina[0]);
                        if (
                        $pagina[0] == "productos" ||
                        $pagina[0] == "editar_producto" ||
                        $pagina[0] == "inicio" ||
                        $pagina[0] == "agregar" ||
                        $pagina[0] == "categorias") 
                        {
                            include "vistas/modulos/" . $pagina[0] . ".php";
                        } else {
                            include "vistas/modulos/error404.php";
                        }
                    } else {
                        include "vistas/modulos/inicio.php";
                    }
                    ?>

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <?php include 'modulos/footer.php'; ?>

        </div>

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="<?php echo $url; ?>vistas/assets/js/app.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/js/eliminar.js"></script>

</body>

</html>