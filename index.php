<?php

require_once 'controladores/controlador.plantilla.php';

require_once 'controladores/controlador.usuarios.php';
require_once 'modelos/modelo.usuarios.php';

require_once 'controladores/controlador.entrenadores.php';
require_once 'modelos/modelo.entrenadores.php';

require_once 'controladores/controlador.clientes.php';
require_once 'modelos/modelo.clientes.php';

require_once 'controladores/controlador.planes.php';
require_once 'modelos/modelo.planes.php';

$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
