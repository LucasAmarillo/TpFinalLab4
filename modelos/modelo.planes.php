<?php

require_once 'conexion.php';

class ModeloPlanes
{

    static public function mdlMostrarPlanes($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre as plan, p.descripcion, p.duracion, p.cantidad_sesiones, p.id_entrenador, p.estado, e.id_entrenador, e.nombre as entrenador_nombre, e.apellido as entrenador_apellido FROM planes p, entrenadores e WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor,  PDO::PARAM_INT); //
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                // $planes = Conexion::conectar()->prepare("SELECT p.id_plan, p.codigo, p.nombre nombre_plan, p.descripcion, p.duracion, p.cantidad_sesiones, p.id_entrenador, p.estado, e.nombre, e.apellido FROM planes p INNER JOIN entrenadores e ON p.id_entrenador = e.id_entrenador");
                $planes = Conexion::conectar()->prepare("SELECT * FROM planes p");

                $planes->execute();

                return $planes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    // Metodo para editar planes
    static public function mdlEditarPlan($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, codigo = :codigo, descripcion = :descripcion, duracion = :duracion, cantidad_sesiones = :cantidad_sesiones estado = :estado WHERE id_plan = :id_plan");
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
            $stmt->bindParam(":duracion_sesiones", $datos["duracion_sesiones"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
