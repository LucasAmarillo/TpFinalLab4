<?php


class ControladorEntrenadores
{

    // mostrar Entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }

    //agregar Entrenadores

    public function ctrAgregarEntrenador()
    {
        if (isset($_POST["nombre"])) {

            $tabla = "entrenador"; //nombre de la tabla

            $datos = array(
                "nombre" => $_POST["nombre"],
                "codigo" => $_POST["codigo"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "cantidad_sesiones" => $_POST["cantidad_sesiones"],
                "estado" => $_POST["estado"],
            );

            //print_r($datos);

            //return;

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlAgregarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El entrenador se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }


    // Edicion de datos de entrenador

    public function ctrEditarEntrenador()
    {
        $tabla = "entrenador";
        if (isset($_POST["id_entrenador"])) {
            $datos = array(
                "nombre" => $_POST["nombre"],
                "codigo" => $_POST["codigo"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "cantidad_sesiones" => $_POST["cantidad_sesiones"],
                "estado" => $_POST["estado"],

            );
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


    //    Eliminar entrenador

    static public function ctrEliminarEntrenador()
    {

        if (isset($_GET["id_entreandor_eliminar"])) {

            $url = ControladorPlantilla::url() . "entrenador";
            $tabla = "entrenador";
            $dato = $_GET["id_entrenador_eliminar"];

            $respuesta = ModeloEntrenadores::mdlEliminarEntrenador($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El entrenador se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
