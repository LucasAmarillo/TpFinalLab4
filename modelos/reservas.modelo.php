<?php

// use PSpell\Config;

require_once 'conexion.php';

class ModeloReservas
{

    static public function mdlMostrarReserva($item, $valor)
    {
        if ($item != null) {
            try {
                // $stmt = Conexion::conectar()->prepare("SELECT r.*, h.* 
                //                                        FROM reservas 
                //                                        INNER JOIN huespedes h
                //                                        ON r.id_huesped = h.id_huesped
                //                                        WHERE r.dni = :$item");
                $stmt = Conexion::conectar()->prepare("SELECT u.nombre as nombre, u.apellido as apellido, h.dni, r.fecha_checkIn, r.fecha_checkOut, r.total_cobrar, r.deposito, ha.numero as numero, th.cantidad_pax FROM reservas r
                                                        INNER JOIN huespedes h
                                                        ON h.id_cliente = r.id_cliente
                                                        INNER JOIN usuarios u 
                                                        ON u.id_usuario = h.id_usuario
                                                        INNER JOIN habitaciones ha
                                                        ON ha.id_habitaciones = r.id_habitacion
                                                        INNER JOIN tipo_habitaciones th
                                                        ON ha.id_tipoHabitacion = th.id_tipoHab
                                                        WHERE h.dni = :$item");
                // $stmt = Conexion::conectar()->prepare("SELECT u.*, r.*,  FROM reservas r
                //                                        INNER JOIN huespedes h
                //                                        ON h.id_cliente = r.id_cliente
                //                                        INNER JOIN usuarios u 
                //                                        ON u.id_usuario = h.id_usuario
                //                                        WHERE h.dni = :$item");

                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $reservas = Conexion::conectar()->prepare("SELECT * FROM reservas r
                                                            INNER JOIN usuarios u
                                                            ON u.id_usuario = r.id_cliente
                                                            ORDER BY r.fecha_checkIn ASC");
                $reservas->execute();
                return $reservas->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
}


// SELECT h. FROM reservas r
// INNER JOIN huespedes h
// ON h.id_cliente = r.id_cliente
// WHERE h.dni = 43113264
