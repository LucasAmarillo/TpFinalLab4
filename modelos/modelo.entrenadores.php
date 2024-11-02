<?php

require_once 'conexion.php';

class ModeloEntrenadores
{

    static public function mdlMostrarEntrenadores($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado FROM entrenadores e WHERE $item = :$valor");
                $stmt->bindParam(":" . $item, $valor,  PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $entrenadores = Conexion::conectar()->prepare("SELECT e.id_entrenador, e.nombre as nombre_entrenador, e.apellido, e.dni, e.telefono, e.email, e.id_especialidad, e.fecha_contratacion, e.estado, es.nombre FROM entrenadores e INNER JOIN especialidades es ON e.id_entrenador = es.id_entrenador");
                $entrenadores->execute();

                return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
}
