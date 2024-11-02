<?php

class ControladorClientes
{
    // *** MOSTRAR CLIENTES ***

    static public function ctrMostrarClientes($item, $valor)
    {
        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    }
}
