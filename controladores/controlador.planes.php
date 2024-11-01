<?php


class ControladorPlanes
{

    // mostrar productos
    static public function ctrMostrarPlanes($item, $valor)
    {

        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    }

    //agregar productos

    public function ctrAgregarPlan()
    {
        if (isset($_POST["nombre"])) {

            $tabla = "plan_entrenamiento"; //nombre de la tabla

            $datos = array(
                "nombre" => $_POST["nombre"],
                "stock" => $_POST["stock"],
                "precio" => $_POST["precio"],
                "id_categoria" => $_POST["categoria"]
            );

            //print_r($datos);

            //return;

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
    public function ctrEditarPlan()
    {
        $tabla = "plan_entrenamiento";
        if (isset($_POST["id_plan"])) {
            $datos = array(
                "nombre" => $_POST["nombre"],
                "stock" => $_POST["stock"],
                "precio" => $_POST["precio"],
                "id_categoria" => $_POST["categoria"],
                "id_producto" => $_POST["id_producto"]
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
ELIMINAR
=============================================*/
    static public function ctrEliminarPlan()
    {

        if (isset($_GET["id_producto_eliminar"])) {

            $url = ControladorPlantilla::url() . "planes";
            $tabla = "plan_entrenacimiento";
            $dato = $_GET["id_producto_eliminar"];

            $respuesta = ModeloPlanes::mdlEliminarPlan($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El plan se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
