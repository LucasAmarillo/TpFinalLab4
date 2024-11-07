<?php

class ControladorPagos
{

    // mostrar Planes
    static public function ctrMostrarPagos($item, $valor)
    {
        $respuesta = ModeloPagos::mdlMostrarPagos($item, $valor);
        return $respuesta;

    }



    static public function ctrAgregarPagos()
    {

        $tabla = "pagos";

        if (isset($_POST["id_cliente"])) {

            $datos = array(
                "id_cliente" => $_POST["id_cliente"],
                "fecha_pago" => $_POST["fecha_pago"],
                "monto" => $_POST["monto"],
                "metodo_pago" => $_POST["metodo_pago"],
                "id_plan" => $_POST["id_plan"],
                "estado" => $_POST["estado"]
            );
            $url = ControladorPlantilla::url() . "clientes";
            $respuesta = ModeloPagos::mdlAgregarPago($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El Pago se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    static public function ctrEliminarPagos(){
        return;
    }
}