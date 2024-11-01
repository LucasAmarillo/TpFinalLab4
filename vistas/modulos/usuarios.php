<?php
$usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);

$cantidad = count($usuarios);
?>
<div class="row">
    <div class="col-12">
        <h1>Usuarios</h1>
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
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($usuarios as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td> <?php echo $value["nombre"] ?></td>
                                    <td> <?php echo $value["email"] ?> </td>

                                    <td><a href="editar_usuario/<?php echo $value["id_usuario"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminarUsuario" id_usuario=<?php echo $value["id_usuario"]; ?>><i class="fas fa-trash"></i></button>
                                    </td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Usuarios no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php

// $eliminar = new ModeloUsuarios();
// $eliminar->ctrEliminarUsuario();

?>