<?php

// use PSpell\Config;

require_once 'conexion.php';

class ModeloClientes
{

    static public function mdlMostrarClientes($item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE $item = :$item");

                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $clientes = Conexion::conectar()->prepare("SELECT c.*, p.nombre as plan FROM clientes c INNER JOIN planes p ON c.id_plan = p.id_plan");
                $clientes->execute();

                return $clientes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlAgregarCliente($tabla, $datos)
    {

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, dni, fecha_nacimiento, direccion, telefono, email, fecha_inscripcion, id_plan, estado)VALUES(:nombre, :apellido, :dni, :fecha_nacimiento, :direccion, :telefono, :email, :fecha_inscripcion, :id_plan, :estado)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
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
    static public function mdlEditarCliente($tabla, $datos)
    {
        $stmt = null;
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, dni = :dni, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, telefono = :telefono, email = :email, fecha_inscripcion = :fecha_inscripcion, id_plan = :id_plan, estado = :estado WHERE id_cliente = :id_cliente");
            // $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, dni = :dni, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, telefono = :telefono, email = :email, id_plan = :id_plan, fecha_inscripcion = :fecha_inscripcion, estado = :estado WHERE id_cliente = :id_cliente");

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            // echo "<pre>";
            // print_r($datos);
            // echo "</pre>";
            // return;

            $stmt->execute();
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            if ($stmt) {
                echo "Error en la consulta: " . $stmt->queryString . "<br>Error: " . $e->getMessage();
            } else {
                echo "Error al preparar la consulta: " . $e->getMessage();
            }
            return "error";
            // return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarCliente($tabla, $dato)
    {
        try {
            $cliente = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");

            $cliente->bindParam(":id_cliente", $dato, PDO::PARAM_INT);

            if ($cliente->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
