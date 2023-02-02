<?php

require_once "../controllers/empleados.controller.php";
require_once "../models/empleados.model.php";

require_once "../controllers/contratosEmpleados.controller.php";
require_once "../models/contratosEmpleados.model.php";

require_once "../controllers/conceptos.controller.php";
require_once "../models/conceptos.model.php";

class AjaxFichaContrato{

    /********************************************
	***** INFORMACIÓN DE ADMIN - TRAER DATA *****
	*********************************************/	

	public $idEmpleadoFicha;

	public function ajaxMostrarEmpleados(){

		$item = "id";
		$valor = $this->idEmpleadoFicha;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}
    
    /*****************************************
	****** ACTIVAR - DESACTIVAR - FICHA ******
	******************************************/

	public $idFichaCapBoton;
	public $estadoFicha;

	public function ajaxActivarFicha(){

		$tabla = "ficha";

		$item = "id"; /**Columna */
        $itemEdit = $this->idFichaCapBoton; /**Ficha */
		$valorEdit = $this->estadoFicha;   /** Nuevo Estado */

		$respuesta = ModeloContratoEmpleados::mdlAjaxActivarFicha($tabla, $item, $itemEdit, $valorEdit);

		echo $respuesta;

	}

}

/***************************************************
***** INFORMACIÓN DE ADMIN - EJECUCIÓN DE AJAX *****
****************************************************/
if(isset($_POST["idEmpleadoFicha"])){

	$traerAdmin = new AjaxFichaContrato();
	$traerAdmin -> idEmpleadoFicha = $_POST["idEmpleadoFicha"];
	$traerAdmin -> ajaxMostrarEmpleados();

}

/********************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
*********************************************************/	

if(isset($_POST["estadoFicha"])){

	$activarFichaAdmin = new AjaxFichaContrato();
	$activarFichaAdmin -> idFichaCapBoton = $_POST["idFichaCapBoton"];
	$activarFichaAdmin -> estadoFicha = $_POST["estadoFicha"];
	$activarFichaAdmin -> ajaxActivarFicha();

}

?>