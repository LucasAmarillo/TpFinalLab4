<?php

class ControladorClientes
{
    // *** MOSTRAR CLIENTES ***

    static public function ctrMostrarClientes($item, $valor)
    {
        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    }

    static public function ctrEliminarCliente()
    {
        if (isset($_POST["id_cliente"])) {
            $clienteId = $_POST["id_cliente"];
            $respuesta = ModeloClientes::mdlEliminarCliente("clientes", $clienteId);
            echo $respuesta;
        }
    }
}
