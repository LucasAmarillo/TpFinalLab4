<?php


class ControladorEntrenadores
{

    // mostrar Entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }
    public function ctrEditarEntrenador()
    {
        $tabla = "entrenadores";
        if (isset($_POST["id_entrenador"])) {
            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion"],
                "estado" => $_POST["estado"]

            );

            echo "<pre>";
            print_r($datos);
            echo "</pre>";
            //            return;

            $url = ControladorPlantilla::url() . "entrenadores";

            $respuesta = ModeloEntrenadores::mdlEditarEntrenador($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El entrenador se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
}