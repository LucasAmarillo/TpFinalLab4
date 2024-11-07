<?php

require_once 'conexion.php';

class ModeloEntrenadores
{

    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM entrenadores WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $entrenadores = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre as nombre_entrenador, e.apellido, e.dni, e.telefono, 
		            e.email, e.fecha_contratacion, e.estado, e2.id_especialidad, e2.nombre AS nombre_especialidad
                    FROM entrenadores e
                    LEFT JOIN entrenador_especialidad es ON e.id_entrenador = es.id_entrenador
                    LEFT JOIN especialidades e2 ON es.id_especialidad = e2.id_especialidad
                    GROUP BY e.id_entrenador");
                $entrenadores->execute();

                return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlAgregarEntrenador($tabla, $datos)
    {

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, dni, telefono, email, fecha_contratacion, estado)VALUES(:nombre, :apellido, :dni, :telefono, :email, :fecha_contratacion, :estado)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_contratacion", $datos["fecha_contratacion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            // echo "<pre>";
            // print_r($datos);
            // echo "</pre>";
            // return;
            $stmt->execute();
            return "ok";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, dni = :dni, telefono = :telefono, email = :email, id_plan = :id_plan, fecha_contratacion = :fecha_contratacion, estado = :estado WHERE id_cliente = :id_cliente");

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            $stmt->execute();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarEntrenador($tabla, $dato)
    {
        try {
            $entrenador = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");

            $entrenador->bindParam(":id_entrenador", $dato, PDO::PARAM_INT);

            if ($entrenador->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
