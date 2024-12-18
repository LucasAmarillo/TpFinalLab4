<?php

class ControladorClientes
{
    // *** MOSTRAR CLIENTES ***

    static public function ctrMostrarClientes($item, $valor)
    {
        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    }
    public function ctrEditarCliente()
    {
        $tabla = "clientes";
        if (isset($_POST["id_cliente"])) {
            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "fecha_nacimiento" => $_POST["fecha_nacimiento"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "id_plan" => $_POST["id_plan"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion"],
                "estado" => $_POST["estado"],
                "id_cliente" => $_POST["id_cliente"]

            );


            $url = ControladorPlantilla::url() . "clientes";

            $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert(
                "success",
                "El cliente se actualizó correctamente",
                "' . $url . '"
                );
                </script>';
            }
        }
    }
    static public function ctrAgregarCliente()
    {

        $tabla = "clientes";

        if (isset($_POST["nombre"])) {

            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "dni" => $_POST["dni"],
                "fecha_nacimiento" => $_POST["fecha_nacimiento"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "id_plan" => $_POST["id_plan"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion"],
                "estado" => $_POST["estado"]
            );
            $url = ControladorPlantilla::url() . "clientes";
            $respuesta = ModeloClientes::mdlAgregarCliente($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El cliente se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }
    static public function ctrEliminarCliente()
    {

        if (isset($_GET["id_cliente"])) {

            $url = ControladorPlantilla::url() . "clientes";
            $tabla = "clientes";
            $dato = $_GET["id_cliente"];

            $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El cliente se eliminó correctamente", "' . $url . '");
                </script>';
            }
        }
    }
}
