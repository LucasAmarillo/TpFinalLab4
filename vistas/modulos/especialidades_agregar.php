<?php

$entrenador = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

// print_r($plan); verifica si vienen datos 
// return; corta la ejecucion
?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header mx-auto">
            <h2 class=" mb-0">Agregar especialidad <img src="<?php echo $url; ?>vistas/assets/img/mancuerna.png" alt="Editar cliente" style="margin-left: 20px; width: 100px; vertical-align: middle;"></h2>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">
                <div class="container-fluid mx-auto justify-content-center">
                    <div class="mb-1 col-4 justify-content-center">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="" required>
                    </div>
                    <div class="mb-1 col-4 justify-content-center">
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
                    <a href="<?php echo $url; ?>/index.php?pagina=entrenadores" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Regresar
                    </a>
                    <button class="btn btn-info btnEditaCliente justify-content-center" type="submit">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>