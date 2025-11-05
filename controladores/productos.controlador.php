<?php

class ControladorProductos
{
    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla = "productos";
        $tabla2 = "categorias";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $tabla2, $item, $valor);
        return $respuesta;
    }

    //Agregar

    public function ctrAgregarProducto()
    {
        if (isset($_POST["estado"])) {
            $tabla = "productos"; //nombre de la tabla
            $datos = array(
                "nombre" => $_POST["nombre"],
                "categoria" => $_POST["categoria"],
                "precio" => $_POST["precio"],
                "estado" => $_POST["estado"]
            );

            //print_r($datos);
            // return;
            //podemos volver a la página de datos

            $url = Plantilla::url() . "productos";

            $respuesta = ModeloProductos::mdlAgregarProducto("productos", $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El producto se agregó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }

    public function ctrEditarProducto()
    {
        if (isset($_POST["estado"])) {
            $tabla = "productos"; //nombre de la tabla
            $datos = array(
                "nombre" => $_POST["nombre"],
                "categoria" => $_POST["categoria"],
                "precio" => $_POST["precio"],
                "estado" => $_POST["estado"],
                "id_producto" => $_POST["id_producto"],

            );

            // print_r($datos);
            // return;
            //podemos volver a la página de datos

            $url = Plantilla::url() . "productos";

            $respuesta = ModeloProductos::mdlEditarProducto("productos", $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El producto se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
    /*=============================================
ELIMINAR
=============================================*/
    static public function ctrEliminarProducto()
    {
        $url = Plantilla::url() . "productos";
        if (isset($_GET["id_producto_eliminar"])) {
            $tabla = "productos";
            $datos = $_GET["id_producto_eliminar"];
            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);
            if ($respuesta == "ok") {
                if ($respuesta == "ok") {
                    echo '<script>
 fncSweetAlert("success", "El dato se eliminó correctamente", "' . $url . '");
 </script>';
                }
            }
        }
    }
    static public function ctrContarProductos()
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlContarProductos($tabla);
        return $respuesta;
    }
}
