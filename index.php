<?php 

/**Plantilla y rutas generales de acceso */
require_once "controllers/constant/plantilla.controller.php";
require_once "models/plantilla.model.php";
require_once "controllers/constant/ruta.controller.php";

/**Empleados */
require_once "controllers/empleados.controller.php";
require_once "models/empleados.model.php";

/**Cargos Empleados:  */
require_once "controllers/cargos.controller.php";
require_once "models/cargos.model.php";

/**Conceptos Contables para Fichas:  */
require_once "controllers/conceptos.controller.php";
require_once "models/conceptos.model.php";

/**Contratos de Empleados */
require_once "controllers/contratosEmpleados.controller.php";
require_once "models/contratosEmpleados.model.php";

/**Banner de Interfaz */
require_once "controllers/banner.controller.php";
require_once "models/banner.model.php";

/**Planes del Hotel para Interfaz */
require_once "controllers/planes.controller.php";
require_once "models/planes.model.php";

/**Categorías del Hotel para Interfaz */
require_once "controllers/categorias.controller.php";
require_once "models/categorias.model.php";

/**Habitaciones del Hotel para Interfaz */
require_once "controllers/habitaciones.controller.php";
require_once "models/habitaciones.model.php";

/**Reservas del Hotel para Interfaz */
require_once "controllers/reservas.controller.php";
require_once "models/reservas.model.php";

/**Testimonios del Hotel para Interfaz */
require_once "controllers/testimonios.controller.php";
require_once "models/testimonios.model.php";

/**Usuarios del Hotel para Interfaz */
require_once "controllers/usuarios.controller.php";
require_once "models/usuarios.model.php";

/**Atracciones / Recorridos del Hotel para Interfaz */
require_once "controllers/atracciones.controller.php";
require_once "models/atracciones.model.php";

/**INICIO / Gráficas Estadísticas del Hotel para Interfaz */
require_once "controllers/inicio.controller.php";
require_once "models/inicio.model.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlanilla();

?>