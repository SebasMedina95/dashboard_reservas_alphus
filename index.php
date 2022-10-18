<?php 

/**Plantilla y rutas generales de acceso */
require_once "controllers/constant/plantilla.controller.php";
require_once "models/plantilla.model.php";
require_once "controllers/constant/ruta.controller.php";

/**Empleados */
require_once "controllers/empleados.controller.php";
require_once "models/empleados.model.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlanilla();

?>