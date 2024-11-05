<?php


$item = "id_plan";
$valor = $rutas[1];

$plan = ControladorPlanes::ctrMostrarPlanes(null, null);
$cliente = ControladorClientes::ctrMostrarClientes(null, null);
$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

echo $cliente["nombre"];

// echo "<pre>";
// print_r($cliente);
// echo "</pre>";

if ($plan) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class="mb-0">Editar plan <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar plan" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">
                    <div class="mb-1 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $cliente["nombre"]; ?>" required>
                    </div>
                    <!-- <div class="mb-1 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<6?php echo $plan["nombre"]; ?>" required>
                    </div>
                    <div class="mb-1 col-4 mx-auto">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción"
                            value="<6?php echo $plan["descripcion"]; ?>" required>
                    </div>
                    <div class="mb-1 col-4 mx-auto">
                        <label for="duracion" class="form-label">Duración(semanas)</label>
                        <input type="number" id="duracion" name="duracion" class="form-control" placeholder="Duración(semanas)"
                            value="<6?php echo $plan["duracion"]; ?>" required>
                    </div>
                    <div class="mb-1 col-4 mx-auto">
                        <label for="cantidad_sesiones" class="form-label">Cantidad de sesiones</label>
                        <input type="number" id="cantidad_sesiones" name="cantidad_sesiones" class="form-control" placeholder="Cantidad de sesiones"
                            value="<6?php echo $plan["cantidad_sesiones"]; ?>" required>
                    </div>
                    <div class="mb-1 col-4 mx-auto">
                        <label for="id_entrenador" class="form-label">Entrenador</label>
                        <select class="form-select" name="id_entrenador" id="example-select" required>
                            <option value="">Selecciona un entrenador</option>
                            <6?php foreach ($entrenador as $es => $value) { ?>
                                <option value="<6?php echo (int)$value["id_entrenador"]; ?>"><6?php echo $value["nombre_entrenador"]; ?></option>
                            <6?php } ?>
                        </select>
                    </div>
                    <div class="mb-1 col-4 mx-auto">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="example-select" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div> -->

                    <?php
                    $editar = new ControladorPlanes();
                    $editar->ctrEditarPlan();
                    ?>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Plan no disponible</h3>
<?php } ?>