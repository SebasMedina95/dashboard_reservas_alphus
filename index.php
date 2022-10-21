<?php 

/**Plantilla y rutas generales de acceso */
require_once "controllers/constant/plantilla.controller.php";
require_once "models/plantilla.model.php";
require_once "controllers/constant/ruta.controller.php";

/**Empleados */
require_once "controllers/empleados.controller.php";
require_once "models/empleados.model.php";

/**Cargos Empleados:  */
//require_once "controllers/cargos.controller.php";
require_once "models/cargos.model.php";

/**Contratos de Empleados */
require_once "controllers/contratosEmpleados.controller.php";
require_once "models/contratosEmpleados.model.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlanilla();

?>