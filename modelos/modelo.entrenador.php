<?php

require_once 'conexion.php';

class ModeloEntrenadores
{


    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre, p.descripcion, p.duracion, p.cantidad_sesiones, p.estado FROM plan_entrenamiento p WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $productos = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre, p.descripcion, p.duracion, p.cantidad_sesiones, p.estado FROM plan_entrenamiento as p INNER JOIN entrenador as e ON p.id_entrenador = e.id_entrenador");
                $productos->execute();

                return $productos->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, nombre, descripcion, duracion, cantidad_sesiones, estado) VALUES (:codigo, :nombre, :descripcion, :duracion, :cantidad_sesiones, :estado)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_sesiones", $datos["cantidad_sesiones"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            if ($stmt->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, nombre = :nombre, descripcion = :descripcion, duracion = :duracion, cantidad_sesiones = :cantidad_sesiones, estado = :estado WHERE id_plan = :id_plan");

            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
            $stmt->bindParam(":cantidad_sesiones", $datos["cantidad_sesiones"], PDO::PARAM_INT);
            $stmt->bindParam(":estadp", $datos["estadp"], PDO::PARAM_INT);

            if ($stmt->execute()) {

                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    // Eliminar datos entrenador
    static public function mdlEliminarEntrenador($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");

            $stmt->bindParam(":id_entrenador", $dato, PDO::PARAM_INT);

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
