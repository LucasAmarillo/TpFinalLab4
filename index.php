<?php

require_once 'controladores/plantilla.controlador.php';

require_once 'controladores/clientes.controlador.php';
require_once 'modelos/clientes.modelo.php';

require_once 'controladores/entrenadores.controlador.php';
require_once 'modelos/entrenadores.modelo.php';

require_once 'controladores/especialidades.controlador.php';
require_once 'modelos/especialidades.modelo.php';

require_once 'controladores/especialidades.controlador.php';
require_once 'modelos/especialidades.modelo.php';

require_once 'controladores/planes.controlador.php';
require_once 'modelos/planes.modelo.php';

require_once 'controladores/pagos.controlador.php';
require_once 'modelos/pagos.modelo.php';

require_once 'controladores/usuarios.controlador.php';
require_once 'modelos/usuarios.modelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
