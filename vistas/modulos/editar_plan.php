<?php

$item = "id_plan";
$valor = $rutas[1];

$plan = ControladorPlanes::ctrMostrarPlanes($item, $valor);

// print_r($plan);

if ($plan) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Editar planes <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar planes" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-2 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $plan["plan"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $plan["codigo"]; ?>" placeholder="Código" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $plan["descripcion"]; ?>" placeholder="Descripción" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="entrenador_nombre" class="form-label">Nombre del entrenador</label>
                        <input type="text" id="entrenador_nombre" name="entrenador_nombre" class="form-control" value="<?php echo $plan["entrenador_nombre"]; ?>" placeholder="Nombre del entrenador" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="entrenador_apellido" class="form-label">Apellido del entrenador</label>
                        <input type="text" id="entrenador_apellido" name="entrenador_apellido" class="form-control" value="<?php echo $plan["entrenador_apellido"]; ?>" placeholder="Apellido del entrenador" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="duracion" class="form-label">Duración del entrenamiento(semanas)</label>
                        <input type="number" id="duracion" name="duracion" class="form-control" value="<?php echo $plan["duracion"]; ?>" placeholder="Duración del entrenamiento(semanas)" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="cantidad_sesiones" class="form-label">Cantidad de sesiones semanales</label>
                        <input type="number" id="cantidad_sesiones" name="cantidad_sesiones" class="form-control" value="<?php echo $plan["cantidad_sesiones"]; ?>" placeholder="Cantidad de sesiones" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="example-select" required>
                            <option value="1" <?php if ($plan["estado"] == 1) echo 'selected'; ?>>Activo</option>
                            <option value="0" <?php if ($plan["estado"] == 0) echo 'selected'; ?>>Inactivo</option>
                        </select>
                    </div>

                    <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

                    <?php
                    $editar = new ControladorPlanes();
                    $editar->ctrEditarPlan();
                    ?>
                    <div class="mb-2 col-4 mx-auto text-center">
                        <button class="btn btn-info justify-content-center" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Plan no disponible</h3>
<?php } ?>