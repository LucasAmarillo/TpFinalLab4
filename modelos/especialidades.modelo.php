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
}
