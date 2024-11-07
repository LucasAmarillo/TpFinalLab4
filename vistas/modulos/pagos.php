<?php

$url = ControladorPlantilla::url();
$pagos = ControladorPagos::ctrMostrarPagos(null, null);


$cantidad = count($pagos);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header">
                <a href="pagos_agregar" class="btn btn-info">Agregar</a>
            </div> -->
            
            <h1 class="text-center mt-3">Membresias Pagos</h1>
            <?php if ($cantidad > 0) { ?>
                
                <div class="card-body text-center">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Fecha Pago</th>
                            <th>Monto</th>
                            <th>Metodo</th>
                            <th>Estado</th>

                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dni</th>
                            <th>Plan Entren.</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $key => $value) { ?>
                        <tr style="background-color:#000888">
                            <td><?php echo $value["fecha_pago"]; ?></td>
                            <td><?php echo $value["monto"]; ?></td>
                            <td><?php echo $value["metodo_pago"]; ?></td>

                            <td class="text-center" <?php
                                    if ($value["estado"] == 1) {
                                        echo "style='background-color: #77a345; color: #FFFFFF; font-weight: bold;'";
                                    } else {
                                        echo "style='background-color: #FF0000; color: #FFFFFF; font-weight: bold;'";
                                    }
                                    ?>>
                                <?php echo $value["estado"] == 1 ? "Completado" : "Pendiente"; ?>
                            </td>

                            <td><?php echo $value["nombre_cliente"]; ?></td>
                            <td><?php echo $value["apellido"]; ?></td>
                            <td><?php echo $value["dni"]; ?></td>
                            <td><?php echo $value["nombre_plan"]; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btnEliminarPago"> <i class="fas fa-trash"></i></button>

                                <button class="btn btn-primary"
                                    onclick="imprimirPago('<?php echo htmlspecialchars(json_encode($value)); ?>')">
                                    <i class="fas fa-print"></i></button>



                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php } else { ?>
            <h3>Pagos no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>






<?php



$eliminar = new ControladorPagos();
$eliminar->ctrEliminarPagos();

?>



<div id="pagoImprimir" style="display:none;">
    <div style="text-align: center; margin: 30px; font-family: Arial, sans-serif;">
        <img src="" alt="Logo o imagen" style="max-width: 200px; margin-bottom: 20px;">
        <h2 style="font-size: 24px; color: #333;">Detalles del Pago</h2>

        <div style="border: 1px solid #ddd; padding: 15px; margin: 20px 0; background-color: #f9f9f9;">
            <p><strong>Fecha Pago:</strong> <span id="fecha_pago" style="font-weight: normal;"></span></p>
            <p><strong>Monto:</strong> <span id="monto" style="font-weight: normal;"></span></p>
            <p><strong>Método de Pago:</strong> <span id="metodo_pago" style="font-weight: normal;"></span></p>
            <p><strong>Estado:</strong> <span id="estado" style="font-weight: normal;"></span></p>
            <p><strong>Nombre Cliente:</strong> <span id="nombre_cliente" style="font-weight: normal;"></span></p>
            <p><strong>Apellido Cliente:</strong> <span id="apellido_cliente" style="font-weight: normal;"></span></p>
            <p><strong>DNI:</strong> <span id="dni_cliente" style="font-weight: normal;"></span></p>
            <p><strong>Plan Entrenamiento:</strong> <span id="plan_entrenamiento" style="font-weight: normal;"></span>
            </p>
        </div>
    </div>
</div>


<script>
function imprimirPago(data) {

    const pago = JSON.parse(data);


    document.getElementById('fecha_pago').innerText = pago.fecha_pago;
    document.getElementById('monto').innerText = pago.monto;
    document.getElementById('metodo_pago').innerText = pago.metodo_pago;
    document.getElementById('estado').innerText = pago.estado == 1 ? "Completado" : "Pendiente";
    document.getElementById('nombre_cliente').innerText = pago.nombre_cliente;
    document.getElementById('apellido_cliente').innerText = pago.apellido;
    document.getElementById('dni_cliente').innerText = pago.dni;
    document.getElementById('plan_entrenamiento').innerText = pago.nombre_plan;


    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Imprimir Detalles del Pago</title></head><body>');
    printWindow.document.write(document.getElementById('pagoImprimir').innerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>