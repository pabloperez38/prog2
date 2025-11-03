<?php

include_once 'conexion.php';

class ModeloProductos
{

    /*=============================================
MOSTRAR DATOS
=============================================*/
    static public function mdlMostrarProductos($tabla, $tabla2, $item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT p.id_producto, p.nombre, p.precio, p.estado, c.nombre as nombre_categoria FROM $tabla AS p
                INNER JOIN $tabla2 AS c
                ON p.id_categoria = c.id_categoria;");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        }
    }


    /*=============================================
AGREGAR DATOS
=============================================*/
    static public function mdlAgregarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio, estado, id_categoria) VALUES (:nombre, :precio, :estado, :id_categoria)");
            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_categoria", $datos["categoria"], PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    /*=============================================
EDITAR DATOS
=============================================*/
    static public function mdlEditarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio, estado = :estado, id_categoria = :id_categoria WHERE id_producto = :id_producto");
            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_categoria", $datos["categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*=============================================
ELIMINAR DATO
=============================================*/
    static public function mdlEliminarProducto($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");
            $stmt->bindParam(":id_producto", $dato, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
