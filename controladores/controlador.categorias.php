<?php

class Controladorcategorias
{

    static public function ctrMostrarcategorias()
    {

        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla);
        return $respuesta;
    }
}
