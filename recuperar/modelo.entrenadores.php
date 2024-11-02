<?php

require_once 'conexion.php';

class ModeloEntrenadores
{


    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contracion,e.estado FROM entrenadores e WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $productos = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contracion, e.estado FROM entrenadores e INNER JOIN especialidades as es ON e.id_entrenador = es.id_entrenador");
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
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, dni, telefono, email, id_especialidad, fecha_contracion, estado) VALUES (:nombre, :apellido, :dni, :telefono, :email, :id_especialidad, :fecha_contracion, :estado)");

            // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_contracion", $datos["fecha_contracion"], PDO::PARAM_STR);
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
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, dni = :dni, telefono = :telefono, email = :email, id_especialidad = :id_especialidad, fecha_contracion,  estado = :estado WHERE id_entrenador = :id_entrenador");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_contracion", $datos["fecha_contracion"], PDO::PARAM_STR);
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
