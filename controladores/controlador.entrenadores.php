<?php


class ControladorEntrenadores
{

    // mostrar Planes
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }
}
