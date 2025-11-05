<?php
class Usuarios
{
    /*=============================================
INGRESO DE USUARIO
=============================================*/
    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["ingresoEmail"])) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["ingresoEmail"])) {
                $encriptar = crypt(
                    trim($_POST["ingresoPassword"]),
                    '$2a$07$asxxszeghdxrhxdrhyerdxGsystemdev$'
                );
                $tabla = "usuarios";
                $item = "email";
                $valor = trim($_POST["ingresoEmail"]);
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios(
                    $tabla,
                    $item,
                    $valor
                );               
                
                if (is_array($respuesta) && ($respuesta["email"] == $valor && $respuesta["password"] == $encriptar)) {

                    if ($respuesta["estado"] == 1) {

                        echo '<script>
                                fncSweetAlert("loading", "Ingresando..", "")
                                </script>';
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["email"] = $respuesta["email"];

                        echo '<script>
                            window.location = "inicio";
                            </script>';
                    } else {
                        echo '<br>
                                <div class="alert alert-danger">El usuario aún no
                                está activado</div>';
                    }
                } else {
                    echo '<script>
                                fncSweetAlert("error", "Error al intentar acceder, pruebe nuevamente", "' . Plantilla::url() . '")
                                </script>';
                }
            }
        }
    }
}
