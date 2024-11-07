<?php

$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

// echo "<pre>";
// print_r($especialidades);
// echo "</pre>";

$cantidad = count($especialidades);
?>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <h1 class="text-center mt-3">Listado de especialidades</h1>

            <div class="card-header">
                <a href="especialidades_agregar" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($especialidades as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td class=""> <?php echo $value["nombre"] ?></td>
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

                                    <td class="text-center"><a href="especialidad_editar/<?php echo $value["id_especialidad"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btnEliminar" data="3" data-modulo="especialidades" id_especialidad=<?php echo $value["id_especialidad"] ?>><i class="fas fa-trash"></i></button>
                                    </td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Especialidades no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php

$eliminar = new ControladorEspecialidades();
$eliminar->ctrEliminarEspecialidad();

?>