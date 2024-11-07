<?php

$item = "id_entrenador";
$valor = $rutas[1];

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);
$especialid = ControladorEspecialidades::ctrMostrarEspecialidades(null, null);

// print_r($entrenador);
// return;

if ($entrenador) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Editar entrenador <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar entrenador" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">
                    <div class="row container-fluid">
                        <div class="col-6">
                            <div class="mb-3 col-8 mx-auto">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" placeholder="Nombre"
                                    value="<?php echo $entrenador["nombre"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" id="dni" name="dni" class="form-control" tabindex="3" placeholder="DNI"
                                    value="<?php echo $entrenador["dni"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" tabindex="5" placeholder="Email"
                                    value="<?php echo $entrenador["email"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="fecha_contratacion" class="form-label">Fecha de contratación</label>
                                <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" tabindex="7" placeholder="Fecha de contratación"
                                    value="<?php echo date("Y-m-d", strtotime($entrenador["fecha_contratacion"])); ?>" required>
                            </div>
                        </div><!--Fin col 1-->
                        <div class="col-6">
                            <div class="mb-3 col-8 mx-auto">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" tabindex="2" placeholder=" Apellido"
                                    value="<?php echo $entrenador["apellido"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" tabindex="4" placeholder="Telefono"
                                    value="<?php echo $entrenador["telefono"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="especialidad" class="form-label">Especialidad</label>
                                <input type="text" id="especialidad" name="especialidad" class="form-control" tabindex="6" placeholder="Especialidad"
                                    value="<?php echo $$especialid["tipo"]; ?>" required>
                            </div>
                            <div class="mb-3 col-8 mx-auto">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" tahibindex="8" name="estado" id="example-select" required>
                                    <option value="1" <?php if ($entrenador["estado"] == 1) echo 'selected'; ?>>Activo</option>
                                    <option value="0" <?php if ($entrenador["estado"] == 0) echo 'selected'; ?>>Inactivo</option>
                                </select>
                            </div>
                        </div><!--Fin col 2-->
                    </div>
                    <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">

                    <?php
                    $editar = new ControladorEntrenadores();
                    $editar->ctrEditarEntrenador();
                    ?>
                    <div class="mb-3 col-4 mx-auto text-center">
                        <a href="<?php echo $url; ?>/index.php?pagina=entrenadores" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                        </a>
                        <button class="btn btn-info justify-content-center" type="submit" tabindex="9"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Entrenador no disponible</h3>
<?php } ?>