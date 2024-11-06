<?php

require_once 'conexion.php';

class ModeloEspecialidades
{

    static public function mdlMostrarEspecialidades($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM especialidades WHERE $item = :$item");

                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $especialidades = Conexion::conectar()->prepare("SELECT * FROM especialidades");
                $especialidades->execute();

                return $especialidades->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlEliminarespecialidad($tabla, $dato)
    {
        try {
            $especialidad = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_especialidad = :id_especialidad");

            $especialidad->bindParam(":id_especialidad", $dato, PDO::PARAM_INT);

            if ($especialidad->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
