<?php

$clientes = ControladorClientes::ctrMostrarClientes(null, null);
// $plan = ControladorPlanes::ctrMostrarPlanes(null, null);
// echo "<pre>";
// print_r($clientes);
// echo "</pre>";

$cantidad = count($clientes);
?>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <h1 class="text-center mt-3">Clientes</h1>

            <div class="card-header">
                <a href="clientes_agregar" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellido</th>
                                <th class="text-center">DNI</th>
                                <th class="text-center">Fecha de Nacimiento</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Plan</th>
                                <th class="text-center">Fecha de inscripción</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($clientes as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td class="text-center"> <?php echo $value["nombre"] ?></td>
                                    <td class="text-center"> <?php echo $value["apellido"] ?> </td>
                                    <td class="text-center"> <?php echo $value["dni"] ?> </td>
                                    <td class="text-center"> <?php echo date('d-m-Y', strtotime($value["fecha_nacimiento"])); ?> </td>
                                    <td class="text-center"> <?php echo $value["direccion"] ?> </td>
                                    <td class="text-center"> <?php echo $value["telefono"] ?> </td>
                                    <td class="text-center"> <?php echo $value["email"] ?> </td>
                                    <td class="text-center"> <?php echo $value["plan"] ?> </td>
                                    <td class="text-center"> <?php echo date('d-m-Y', strtotime($value["fecha_inscripcion"])) ?> </td>
                                    <td class="text-center"
                                        <?php
                                        // Si el estado es 1 se pinta la celda de verda, si es 0 se pinta de rojo
                                        if ($value["estado"] == 1) {
                                            echo "style='background-color: #77a345; color: #FFFFFF'; font-weight: bold;";
                                        } else {
                                            echo "style='background-color: #FF0000; color: #FFFFFF'; font-weight: bold;";
                                        }
                                        ?>>
                                        <?php
                                        // Aca se muestra el estado con texto
                                        if ($value["estado"] == 1) {
                                            echo "Activo";
                                        } else {
                                            echo "Inactivo";
                                        }
                                        ?>
                                    </td>

                                    <td><a href="clientes_editar/<?php echo $value["id_cliente"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                        <button
                                            class="btn btn-danger btnEliminar" data-id="<?php echo $value["id_cliente"]; ?>" data-modulo="cliente"
                                            id_cliente=<?php echo $value["id_cliente"]; ?>><i class="fas fa-trash"></i></button>
                                    </td>


                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Clientes no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php

$eliminar = new ControladorClientes();
$eliminar->ctrEliminarCliente();

?>