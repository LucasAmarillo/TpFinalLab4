<?php

require_once 'conexion.php';

class ModeloCategorias{

    static public function mdlMostrarCategorias($tabla)
    {
        try {
            $categorias = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $categorias->execute();
            return $categorias->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return "Error: " .$e ->getMessage();
        }

    }
    
}