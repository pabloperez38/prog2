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
    <link rel="shortcut icon" href="vistas/assets/images/favicon.ico">

    <!-- App css -->
    <link href="vistas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="vistas/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

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
                            <h4 class="fs-18 fw-semibold m-0">Starter</h4>
                        </div>

                        <div class="text-end">
                            <ol class="breadcrumb m-0 py-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Starter</li>
                            </ol>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET["pagina"])) {
                        $pagina = $_GET["pagina"];
                        if (
                        $pagina == "productos" ||
                        $pagina == "inicio" ||
                        $pagina == "categorias") 
                        {
                            include "vistas/modulos/" . $pagina . ".php";
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
    <script src="vistas/assets/libs/jquery/jquery.min.js"></script>
    <script src="vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vistas/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="vistas/assets/libs/node-waves/waves.min.js"></script>
    <script src="vistas/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="vistas/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="vistas/assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="vistas/assets/js/app.js"></script>

</body>

</html>