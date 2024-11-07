<?php

$item = "id_especialidad";
$valor = $rutas[1];

$especialidad = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);

// print_r($espe);
// return;

if ($especialidad) {
?>
    2
    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Editar especialidad <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar espe" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">
                    <div class="row container-fluid">
                        <div class="col-6">
                            <div class="mb-3 col-8 mx-auto">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                                    value="<?php echo $especialidad["nombre"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" name="estado" id="example-select" required>
                                    <option value="1" <?php if ($entrenador["estado"] == 1) echo 'selected'; ?>>Activo</option>
                                    <option value="0" <?php if ($entrenador["estado"] == 0) echo 'selected'; ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_especialidadr" value="<?php echo $especialidad["id_especia$especialidad"]; ?>">

                    <?php
                    $editar = new ControladorEspecialidades();
                    $editar->ctrEditarEspecialidad();
                    ?>
                    <div class="mb-3 col-4 mx-auto text-center">
                        <a href="<?php echo $url; ?>/index.php?pagina=especialidades" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                        </a>
                        <button class="btn btn-info justify-content-center" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Especialidad no disponible</h3>
<?php } ?>