<?php

require_once 'conexion.php';

class ModeloPlanes
{

    static public function mdlMostrarPlanes($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre, p.descripcion, p.duracion, p.cantidad_sesiones, p.id_entrenador, p.estado FROM planes p WHERE $item = :$valor");
                $stmt->bindParam(":" . $item, $valor,  PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $planes = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre nombre_plan, p.descripcion, p.duracion, p.cantidad_sesiones, p.id_entrenador, p.estado, e.nombre, e.apellido FROM planes p INNER JOIN entrenadores e ON p.id_entrenador = e.id_entrenador");
                $planes->execute();

                return $planes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
}
