<?php
$url = ControladorPlantilla::url();
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

// echo "<pre>";
// print_r($entrenadores);
// echo "</pre>";
// return;

$cantidad = count($entrenadores);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <h1 class="text-center">Listado de entrenadores <img src="vistas/assets/img/entrenador.png" style="width: 3%;" class="mt-2" alt="entrenador"> </h1>

            <div class="card-header mt-1 mb-1">
                <a href="entrenadores_agregar" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellido</th>
                                <th class="text-center">DNI</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Especialidad</th>
                                <th class="text-center">Fecha de contratación</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($entrenadores as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td class="text-center"><?php echo $value["nombre_entrenador"]; ?></td>
                                    <td class="text-center"><?php echo $value["apellido"]; ?></td>
                                    <td class="text-center"><?php echo $value["dni"]; ?></td>
                                    <td class="text-center"><?php echo $value["telefono"]; ?></td>
                                    <td class="text-center"><?php echo $value["email"]; ?></td>
                                    <td class="text-center"><?php echo $value["nombre_especialidad"]; ?>
                                        <a href="detalle_entrenador/<?php echo $value["id_entrenador"] ?>" class="btn btn-success" style="float: right;, margin-left: 5px"><i class="fas fa-plus"></i></a>
                                    </td>
                                    <td class="text-center"><?php echo date("d/m/Y", strtotime($value["fecha_contratacion"])); ?></td>
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
                                    <td class="text-center">
                                        <a href="entrenadores_editar/<?php echo $value["id_entrenador"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminar" data-id="<?php echo $value["id_entrenador"]; ?>" data-modulo="entrenador" id_entrenador="<?php echo $value["id_entrenador"]; ?>"> <i class="fas fa-trash"></i></button>
                                        
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Entrenadores no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php

$eliminar = new ControladorEntrenadores();
$eliminar->ctrEliminarEntrenador()

?>