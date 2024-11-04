<?php

$item = "id_cliente";
$valor = $rutas[1];

$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

// print_r($cliente);

if ($cliente) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header mx-auto">
                <h2 class=" mb-0">Editar cliente <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar cliente" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-2 col-4 mx-auto">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $cliente["nombre"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                            value="<?php echo $cliente["apellido"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI"
                            value="<?php echo $cliente["dni"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiennto"
                            value="<?php echo date("Y-m-d", strtotime($cliente["fecha_nacimiento"])); ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección"
                            value="<?php echo $cliente["direccion"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono"
                            value="<?php echo $cliente["telefono"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                            value="<?php echo $cliente["email"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="plan" class="form-label">Plan</label>
                        <input type="text" id="plan" name="plan" class="form-control" placeholder="Email"
                            value="<?php echo $cliente["plan"]; ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="fecha_inscripcion" class="form-label">Fecha de inscripcion</label>
                        <input type="date" id="fecha_inscripcion" name="fecha_inscripcion" class="form-control" placeholder="Fecha de inscripción"
                            value="<?php echo date("Y-m-d", strtotime($cliente["fecha_inscripcion"])); ?>" required>
                    </div>
                    <div class="mb-2 col-4 mx-auto">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="example-select" required>
                            <option value="1" <?php if ($cliente["estado"] == 1) echo 'selected'; ?>>Activo</option>
                            <option value="0" <?php if ($cliente["estado"] == 0) echo 'selected'; ?>>Inactivo</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]; ?>">


                    <?php
                    $editar = new ControladorClientes();
                    $editar->ctrEditarCliente();
                    ?>
                    <div class="mb-3 col-4 mx-auto text-center">
                        <button class="btn btn-info justify-content-center" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Plan no disponible</h3>
<?php } ?>