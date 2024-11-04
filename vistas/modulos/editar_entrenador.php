<?php

$item = "id_entrenador";
$valor = $rutas[1];

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

// print_r($entrenador);

if ($entrenador) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Editar entrenador <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar entrenador" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-3 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $entrenador["nombre_entrenador"]; ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                            value="<?php echo $entrenador["apellido"]; ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI"
                            value="<?php echo $entrenador["dni"]; ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono"
                            value="<?php echo $entrenador["telefono"]; ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                            value="<?php echo $entrenador["email"]; ?>" required>
                    </div>

                    <div class="mb-3 col-4 mx-auto">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" id="especialidad" name="especialidad" class="form-control" placeholder="Especialidad"
                            value="<?php echo $entrenador["tipo"]; ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <label for="fecha_contratacion" class="form-label">Fecha de contratación</label>
                        <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" placeholder="Fecha de contratación"
                            value="<?php echo date("Y-m-d", strtotime($entrenador["fecha_contratacion"])); ?>" required>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
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