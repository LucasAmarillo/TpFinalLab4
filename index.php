<?php

require_once 'controladores/controlador.plantilla.php';

require_once 'controladores/usuarios.controlador.php';
require_once 'modelos/modelo.usuarios.php';

require_once 'controladores/controlador.categorias.php';
require_once 'modelos/modelo.categorias.php';

require_once 'controladores/controlador.planes.php';
require_once 'modelos/modelo.planes.php';



$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
