<?php

class ControladorEspecialidades
{
    // *** MOSTRAR Especialidades ***

    static public function ctrMostrarEspecialidades($item, $valor)
    {
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($item, $valor);
        return $respuesta;
    }
}
