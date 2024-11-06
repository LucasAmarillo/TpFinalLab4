<?php

$item = "id_entrenador";
$valor = $rutas[1];

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

echo "<pre>";
print_r($entrenador["nombre_especialidad"]);
echo "</pre>";



if ($entrenador) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Detalle entrenador<img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar entrenador" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-3 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <h2><?php echo $entrenador["nombre"]; ?></h2>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <div class="mb-1 col-4 mx-auto">
                            <label for="id_especialidad" class="form-label">Especialidades</label>
                            <select class="form-select" name="id_especialidad" id="example-select" required>
                                <?php foreach ($entrenador as $es => $value) { ?>
                                    <option value="<?php echo (int)$value["id_especialidad"]; ?>"><?php echo $entrenador["nombre_especialidad"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class=" mb-3 col-4 mx-auto">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="example-select" required>
                            <option value="1" <?php if ($entrenador["estado"] == 1) echo 'selected'; ?>>Activo</option>
                            <option value="0" <?php if ($entrenador["estado"] == 0) echo 'selected'; ?>>Inactivo</option>
                        </select>
                    </div>

                    <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">

                    <?php
                    $editar = new ControladorEntrenadores();
                    //$editar->ctrEditarEntrenador();
                    ?>
                    <div class="mb-3 col-4 mx-auto text-center">
                        <button class="btn btn-info justify-content-center" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Entrenador no disponible</h3>
<?php } ?>