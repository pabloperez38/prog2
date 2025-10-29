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
                window.location = "'.$url.'";
                </script>';
            }
        }
    }
}
