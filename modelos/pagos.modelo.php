<?php

require_once 'conexion.php';


class ModeloPagos
{
    static public function mdlMostrarPagos($item, $valor)
    {
        // Si se pasa un elemento a buscar
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC) ? [$stmt->fetch(PDO::FETCH_ASSOC)] : [];
            } catch (Exception $e) {
                // Retorna un array vacío en caso de error y muestra el mensaje
                echo 'Error: ' . $e->getMessage();
                return [];
            }
        } else {
            // Si no hay filtros, obtener todos los pagos
            try {
                $stmt = Conexion::conectar()->prepare("SELECT 
                    p.fecha_pago, 
                    p.monto, 
                    p.metodo_pago, 
                    p.estado,
                    c.nombre as nombre_cliente,
                    c.apellido,
                    c.dni,
                    plan.nombre as nombre_plan
                    
                    FROM pagos p  
                    INNER JOIN clientes c ON p.id_cliente = c.id_cliente
                    INNER JOIN planes plan ON plan.id_plan = c.id_plan"
                );

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
            } catch (Exception $e) {
                // Retorna un array vacío en caso de error y muestra el mensaje
                echo 'Error: ' . $e->getMessage();
                return [];
            }
        }
    }


    static public function mdlAgregarPago($tabla, $datos)
    {

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, fecha_pago, monto, metodo_pago, id_plan, estado)VALUES(:id_cliente, :fecha_pago, :monto, :metodo_pago, :id_plan, :estado)");

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

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
}