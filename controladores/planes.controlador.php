<?php


class ControladorPlanes
{

    // mostrar Planes
    static public function ctrMostrarPlanes($item, $valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    }

    //agregar Planes VERRRR

    static public function ctrAgregarPlan()
    {
        if (isset($_POST["nombre"])) {

            $tabla = "planes"; //nombre de la tabla

            $datos = array(
                "codigo" => $_POST["codigo"],
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "cantidad_sesiones" => $_POST["cantidad_sesiones"],
                "id_entrenador" => $_POST["id_entrenador"],
                "estado" => $_POST["estado"],
            );

            // print_r($datos);

            // return;

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlAgregarPlan($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El plan se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    /*=============================================
EDITAR DATOS
=============================================*/
    static public function ctrEditarPlan()
    {
        $tabla = "plan_entrenamiento";
        if (isset($_POST["id_plan"])) {
            $datos = array(
                "nombre" => $_POST["nombre"],
                "codigo" => $_POST["codigo"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "cantidad_sesiones" => $_POST["cantidad_sesiones"],
                "estado" => $_POST["estado"],

            );
            $url = ControladorPlantilla::url() . "planes";

            $respuesta = ModeloPlanes::mdlEditarPlan($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El plan se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }

    /*=============================================
ELIMINAR VERRRR
=============================================*/
    // static public function ctrEliminarPlan()
    // {

    //     if (isset($_GET["id_plan_eliminar"])) {

    //         $url = ControladorPlantilla::url() . "planes";
    //         $tabla = "plan_entrenamiento";
    //         $dato = $_GET["id_plan_eliminar"];

    //         $respuesta = ModeloPlanes::mdlEliminarPlan($tabla, $dato);

    //         if ($respuesta == "ok") {
    //             echo '<script>
    //             fncSweetAlert("success", "El plan se eliminó correctamente", "' . $url . '");
    //             </script>';
    //         }
    //     }
    // }
}
