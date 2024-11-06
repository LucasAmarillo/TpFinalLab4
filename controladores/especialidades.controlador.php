<?php

class ControladorEspecialidades
{
    // *** MOSTRAR Especialidades ***

    static public function ctrMostrarEspecialidades($item, $valor)
    {
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($item, $valor);
        return $respuesta;
    }
    static public function ctrEliminarEspecialidad()
    {

        if (isset($_GET["id_especialidad"])) {

            $url = ControladorPlantilla::url() . "especialidades";
            $tabla = "especialidades";
            $dato = $_GET["id_especialidad"];

            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidad($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "La especialidad se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
