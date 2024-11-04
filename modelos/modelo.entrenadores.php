<?php

require_once 'conexion.php';

class ModeloEntrenadores
{

    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre as nombre_entrenador, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado, es.id_especialidad, es.nombre as tipo FROM entrenadores e, especialidades as es WHERE e.id_entrenador = :id_entrenador LIMIT 1");
                // $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado FROM entrenadores e WHERE $item = :$item limit 1");
                $stmt->bindParam(":id_entrenador", $valor,  PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            // try {
            //     $entrenadores = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre as nombre_entrenador, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado, es.nombre FROM entrenadores e INNER JOIN especialidades es ON e.id_entrenador = es.id_entrenador");
            //     $entrenadores->execute();

            //     return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            // } catch (Exception $e) {
            //     return "Error: " . $e->getMessage();
            // }
            try {
                // Corrige la unión de tablas
                $entrenadores = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre as nombre_entrenador, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado, es.nombre as tipo FROM entrenadores e INNER JOIN especialidades es ON e.id_especialidad = es.id_especialidad");
                $entrenadores->execute();

                return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, dni = :dni, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, telefono = :telefono, email = :email, id_plan = :id_plan, fecha_inscripcion = :fecha_inscripcion, estado = :estado WHERE id_cliente = :id_cliente");
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

            $stmt->execute();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
