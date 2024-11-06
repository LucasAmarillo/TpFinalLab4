<?php

$plan = ControladorPlanes::ctrMostrarPlanes(null, null);

// print_r($plan); verifica si vienen datos 
// return; corta la ejecucion
?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header mx-auto">
            <h2 class=" mb-0">Agregar cliente <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar cliente" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="row container-fluid">
                    <div class="col-6">
                        <div class="mb-1 col-8 mx-auto">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="fecha_inscripcion" class="form-label">Fecha de inscripcion</label>
                            <input type="date" id="fecha_inscripcion" name="fecha_inscripcion" class="form-control" placeholder="Fecha de inscripción"
                                value="" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-1 col-8 mx-auto">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiennto"
                                value="?>" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="id_plan" class="form-label">Plan</label>
                            <select class="form-select" name="id_plan" id="example-select" required>
                                <option value="">Selecciona un plan</option>
                                <?php foreach ($plan as $es => $value) { ?>
                                    <option value="<?php echo (int)$value["id_plan"]; ?>"><?php echo $value["nombre"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" name="estado" id="example-select" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <?php

                    $agregar = new ControladorClientes();
                    $agregar->ctrAgregarCliente();
                    ?>

                    <div class="mt-2 col-8 mx-auto text-center">
                        <a href="<?php echo $url; ?>/index.php?pagina=clientes" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Regresar
                        </a>
                        <button class="btn btn-info btnEditaCliente justify-content-center" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

            </form>
        </div>
    </div>

</div>
</div>