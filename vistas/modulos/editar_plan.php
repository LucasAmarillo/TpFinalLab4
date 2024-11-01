<?php

$item = "id_plan";
$valor = $rutas[1];

$plan = ControladorPlanes::ctrMostrarPlanes($item, $valor);
$categorias = Controladorcategorias::ctrMostrarcategorias();

if ($plan) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header">
                <h2 class=" mb-0">Editar planes <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar planes" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $plan["nombre"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $plan["codigo"]; ?>" placeholder="Código" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $plan["descripcion"]; ?>" placeholder="Descripción" required>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración</label>
                        <input type="number" id="duracion" name="duracion" class="form-control" value="<?php echo $plan["duracion"]; ?>" placeholder="Duración" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad_sesiones" class="form-label">Cantidad de sesiones semanales</label>
                        <input type="number" id="cantidad_sesiones" name="cantidad_sesiones" class="form-control" value="<?php echo $plan["cantidad_sesiones"]; ?>" placeholder="Cantidad de sesiones" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control"
                            value=" <?php
                                    if ($plan["estado"] == 1)
                                        echo "Activo";
                                    else
                                        echo "Inactivo";
                                    ?>" placeholder="Estado" required>
                    </div>

                    <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

                    <?php
                    $editar = new ControladorPlanes();
                    $editar->ctrEditarPlan();
                    ?>

                    <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Plan no disponible</h3>
<?php } ?>