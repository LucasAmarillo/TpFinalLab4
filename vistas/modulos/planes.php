<?php
$url = ControladorPlantilla::url();
$planes = ControladorPlanes::ctrMostrarPlanes(null, null);

$cantidad = count($planes);
?>
<div class="row">
    <div class="col-12">
        <h1>Planes de entrenamiento</h1>
        <div class="card">

            <div class="card-header">
                <a href="agregar_producto" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Duracion(Semanas)</th>
                                <th>Cantidad de sesiones</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($planes as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td><?php echo $value["codigo"]; ?></td>
                                    <td><?php echo $value["nombre"]; ?></td>
                                    <td><?php echo $value["descripcion"]; ?></td>
                                    <td><?php echo $value["duracion"]; ?></td>
                                    <td><?php echo $value["cantidad_sesiones"]; ?></td>
                                    <td><?php echo ($value["estado"] == 1) ? "Activo" : "Inactivo"; ?></td>
                                    <td><a href="editar_plan/<?php echo $value["id_plan"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminarPlan" id_plan=<?php echo $value["id_plan"]; ?>><i class="fas fa-trash"></i></button>
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

// $eliminar = new ModeloUsuarios();
// $eliminar->ctrEliminarUsuario();

?>