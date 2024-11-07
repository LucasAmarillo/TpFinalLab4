<?php
$url = ControladorPlantilla::url();
$planes = ControladorPlanes::ctrMostrarPlanes(null, null);
// echo "<pre>";
// print_r($planes);
// echo "</pre>";

$cantidad = count($planes);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <h1 class="text-center mt- 3">Planes de entrenamiento <img src="<?php echo $url; ?>vistas/assets/img/plan.png" style="width: 3%;" class="mt-1" alt="planes"></h1>

            <div class="card-header">
                <a href="planes_agregar" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Duracion(Semanas)</th>
                                <th class="text-center">Cantidad de sesiones</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($planes as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td class="text-center"><?php echo $value["codigo"]; ?></td>
                                    <td class="text-center"><?php echo $value["nombre"]; ?></td>
                                    <td class="text-center"><?php echo $value["descripcion"]; ?></td>
                                    <td class="text-center"><?php echo $value["duracion"]; ?></td>
                                    <td class="text-center"><?php echo $value["cantidad_sesiones"]; ?></td>
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
                                        <a href="planes_editar/<?php echo $value["id_plan"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminar" data-id="<?php echo $value["id_plan"]; ?>" data-modulo="plan" id_plan=<?php echo $value["id_plan"]; ?>> <i class="fas fa-trash"></i></button>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Planes no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php

$eliminar = new ControladorPlanes();
$eliminar->ctrEliminarPlan();

?>