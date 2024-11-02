<?php
$url = ControladorPlantilla::url();
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

$cantidad = count($entrenadores);
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Listado de entrenadores <img src="vistas/assets/img/entrenador.png" style="width: 3%;" class="mt-4" alt=" entrenador"> </h1>

        <div class="card">

            <div class="card-header">
                <a href="agregar_producto" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Especialidad</th>
                                <th>Fecha de contratación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($entrenadores as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td><?php echo $value["nombre"]; ?></td>
                                    <td><?php echo $value["apellido"]; ?></td>
                                    <td><?php echo $value["dni"]; ?></td>
                                    <td><?php echo $value["telefono"]; ?></td>
                                    <td><?php echo $value["email"]; ?></td>
                                    <td><?php echo $value["id_especialidad"]; ?></td>
                                    <td><?php echo $value["fecha_contratacion"]; ?></td>
                                    <td><?php echo ($value["estado"] == 1) ? "Activo" : "Inactivo"; ?></td>
                                    <td>
                                        <a href="editar_entrenador/<?php echo $value["id_entrenador"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminarEntrenador" id_entrenador="<?php echo $value["id_entrenador"]; ?>"> <i class="fas fa-trash"></i></button>
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