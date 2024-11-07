<?php

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
$plan = ControladorPlanes::ctrMostrarPlanes(null, null);
// print_r($plan); verifica si vienen datos 
// return; corta la ejecucion
?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header mx-auto">
            <h2 class=" mb-0">Agregar entrenador <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar cliente" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="row container-fluid">
                    <div class="col-6">
                        <div class="mb-1 col-8 mx-auto">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" tabindex="1" placeholder=" Nombre"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" id="dni" name="dni" class="form-control" tabindex="3" placeholder="DNI"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" tabindex="5" placeholder="Email"
                                value="" required>
                        </div>
                    </div><!-- FIN col 1 -->
                    <div class="col-6">
                        <div class="mb-1 col-8 mx-auto">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" tabindex="2" placeholder="Apellido"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" tabindex="4" placeholder="Telefono"
                                value="" required>
                        </div>
                        <div class="mb-1 col-8 mx-auto">
                            <label for="fecha_contratacion" class="form-label">Fecha de contratación</label>
                            <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" tabindex="9" placeholder="Fecha de contratación"
                                value="" required>
                        </div>
                    </div><!-- FIN col 2 -->
                    <div class="mb-1 col-4 mx-auto">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" tabindex="10" name="estado" id="example-select" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div><!-- FIN row -->
                <?php

                $agregar = new ControladorEntrenadores();
                $agregar->ctrAgregarEntrenador();
                ?>

                <div class="mt-2 col-8 mx-auto text-center">
                    <a href="<?php echo $url; ?>/index.php?pagina=entrenadores" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Regresar
                    </a>
                    <button class="btn btn-info btnAgregaEntrenador justify-content-center" type="submit" tabindex="11"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>

            </form>
        </div>

    </div>
</div>