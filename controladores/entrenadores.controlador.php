<?php


class ControladorEntrenadores
{

    // mostrar Entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }
    static public function ctrAgregarEntrenador()
    {

        $tabla = "entrenadores";

        if (isset($_POST["nombre"])) {

            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_contratacion" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"]
            );
            $url = ControladorPlantilla::url() . "entrenadores";
            $respuesta = ModeloEntrenadores::mdlAgregarEntrenador($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El entrenadores se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }
    public function ctrEditarEntrenador()
    {
        $tabla = "entrenadores";
        if (isset($_POST["id_entrenador"])) {
            $datos = array(
                "id_entrenador" => $_POST["id_entrenador"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_contratacion" => $_POST["fecha_contratacion"],
                "id_plan" => $_POST["tipo"],
                "estado" => $_POST["estado"]

            );

            // echo "<pre>";
            // print_r($datos);
            // echo "</pre>";
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
    static public function ctrEliminarEntrenador()
    {

        if (isset($_GET["id_entrenador"])) {

            $url = ControladorPlantilla::url() . "entrenador";
            $tabla = "entrenador";
            $dato = $_GET["id_entrenador"];

            $respuesta = ModeloEntrenadores::mdlEliminarEntrenador($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El entrenador se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
