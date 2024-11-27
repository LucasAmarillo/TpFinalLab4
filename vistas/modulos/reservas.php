<?php

$habitacion = ControladorHabitaciones::ctrMostrarHabitaciones(null, null);

// foreach ($habitacion as $key => $value) {
//     print_r($value['tipo']);
// }



?>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <h1 class="text-center mt-3">Reservas</h1>
        </div>
    </div>
</div>
<div class="col-lg-12 mt-4">
    <div class="card">
        <div class="row container-fluid mx-auto align-items-center">
            <form action="" method="post">
                <div class="mb-1 col-4 mx-auto d-flex">
                    <div class="flex-grow-1 justify-content-center">
                        <label for="buscar_dni" class="form-label mt-2">Buscar por DNI</label>
                        <input type="text" id="buscar_dni" name="buscar_dni" class="form-control" tabindex="3" placeholder="Buscar por DNI">
                        <button class="btn btn-info btnBuscarReserva mt-2" type="submit" tabindex="17"><i class="fa-solid fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        $respuesta = ControladorReservas::ctrBuscarReservas();
        // echo "<pre>";
        // print_r($respuesta);
        // echo "</pre>";
        $saldo = $respuesta["total_cobrar"] - $respuesta["deposito"];
        // print_r($respuesta);
        if ($respuesta) {
                echo '<div class="row">
                        <div class="card-body">
                            <div class="row container-fluid mx-auto">
                                <div class="col-4 mx-auto">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th> 
                                                <th class="text-center" scope="col">Datos del huésped</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="text-center"  scope="row">Huesped:</th>
                                                <td>' . $respuesta["nombre"] . ' ' . $respuesta["apellido"] . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">DNI:</th>
                                                <td>' . $respuesta["dni"] . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Fecha de ingreso:</th>   
                                                <td>' . date("d-m-Y", strtotime($respuesta["fecha_checkIn"])) . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Fecha de salida:</th>
                                                <td>' . date("d-m-Y", strtotime($respuesta["fecha_checkOut"])) . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Cantidad Pax:</th>
                                                <td>' . $respuesta["cantidad_pax"] . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Habitación:</th>
                                                <td>' . $respuesta["numero"] . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Total:</th>
                                                <td>$ ' . number_format($respuesta["total_cobrar"],2) . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Seña:</th>
                                                <td>$ ' . number_format($respuesta["deposito"],2) . '</td>
                                            </tr>
                                            <tr>
                                                <th class="text-center" scope="row">Saldo:</th>
                                                <td>$ ' . number_format($saldo,2) . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>';
                    if ($respuesta["cantidad_pax"] > 1) {
                        for ($i = 0; $i < $respuesta["cantidad_pax"]-1; $i++) {
                            echo '<div class="row container-fluid mx-auto">
                            <div class="mb-1 col-4 mx-auto">
                            <input type="text" id="nombre_acompanante" name="nombre_acompanante" class="form-control" tabindex="3" placeholder="Nombre del acompañante">
                            </div>
                            <div class="mb-1 col-4 mx-auto">
                            <input type="text" id="apellido_acompanante" name="apellido_acompanante" class="form-control" tabindex="3" placeholder="Apellido del acompañante">
                            </div>
                            </div>';
                        }
                        echo '
                        <div class="mt-2 col-12 mx-auto text-center">
                        <a href="' . $url . '/index.php?pagina=checkin" class="btn btn-info col-2"><i class="fa-solid fa-floppy-disk"></i> Guardar acompañante</a>
                        </div>';

                    }
                    echo '
                        <div class="mt-2 col-8 mx-auto text-center">
                        <a href="' . $url . '/index.php?pagina=habitaciones" class="btn btn-secondary col-2"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                        <a href="' . $url . '/index.php?pagina=checkin" class="btn btn-info col-2"><i class="fa-solid fa-floppy-disk"></i> Realizar Check in</a>
                    </div>';
                    
            } else {  
                echo '
                <div class="row">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row container-fluid mx-auto">
                                <div class="col-4 mx-auto">
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                                            value="" required>
                                    </div>
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                                            value="" required>
                                    </div>
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="dni" class="form-label">DNI</label>
                                        <input type="text" id="dni" name="dni" class="form-control" placeholder="Documento de identidad"
                                            value="" required>
                                    </div>
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="fecha_checkIn" class="form-label">Fecha de ingreso</label>
                                        <input type="date" id="fecha_checkIn" name="fecha_checkIn" class="form-control" placeholder="Fecha de ingreso"
                                            value="" required>
                                    </div>
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="fecha_checkOut" class="form-label">Fecha de egreso</label>
                                        <input type="date" id="fecha_checkOut" name="fecha_checkOut" class="form-control" placeholder="fecha de egreso"
                                            value="" required>
                                    </div>
                                    <div class="mb-1 col-8 mx-auto">
                                        <label for="id_habitacion" class="form-label">Tipo de habitación</label>
                                        <select class="form-select" tabindex="11" name="id_habitacion" id="example-select" required>
                                            <option value="">Seleccione un tipo de habitación</option>'; ?>
                                            <?php 
                                            foreach ($habitacion as $es => $value) { ?>
                                                <option value="<?php echo (int)$value["id_habitacion"]; ?>"><?php echo $value["tipo"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- Fin row general-->
                            <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]; ?>">


                            <div class="mb-3 col-4 mx-auto text-center">
                                <a href="<?php echo $url; ?>/index.php?pagina=clientes" class="btn btn-secondary">
                                    <i class="fa-solid fa-arrow-left"></i> Regresar
                                </a>
                                <button class="btn btn-info btnReserva justify-content-center" type="submit" tabindex="17"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            </div>
                        </form>
                </div>
            </div>
        <?php } ?>
        <?php
        // ************* instancia de reserva *************
        // $editar = new ControladorReservas();
        // $editar->ctrEditarReserva();
        ?>
        <script>
            const fecha_checkIn = document.getElementById("fecha_checkIn");
            const fecha_checkOut = document.getElementById("fecha_checkOut");

            const hoy = new Date();
            hoy.setDate(hoy.getDate() + 1);  // Establecer el día de mañana
            fecha_checkIn.min = hoy.toISOString().split("T")[0];
            
            const maxCheckIn = new Date(hoy);
            maxCheckIn.setMonth(hoy.getMonth() + 5);  // Sumar 5 meses
            fecha_checkIn.max = maxCheckIn.toISOString().split("T")[0];

            fecha_checkIn.addEventListener("change", function() {
                const checkIn = new Date(fecha_checkIn.value);  // Obtenie la fecha de check-in seleccionada
                checkIn.setDate(checkIn.getDate() + 1);  // Hace que la fecha de check-out sea después del check-in
                fecha_checkOut.min = checkIn.toISOString().split("T")[0];  // Establece la fecha mínima de check-out
                fecha_checkOut.max = maxCheckIn.toISOString().split("T")[0];  // Establece la misma fecha máxima para check-out
            });
        </script>

    </div>
</div>

