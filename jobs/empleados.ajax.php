<?php

require_once "../controllers/empleados.controller.php";
require_once "../models/empleados.model.php";

class AjaxEmpleados{

    /*************************************************
	***** EDICIÓN DEL ADMINISTRADOR - TRAER DATA *****
	**************************************************/	

	public $idAdministrador;

	public function ajaxMostrarEmpleados(){

		$item = "id";
		$valor = $this->idAdministrador;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

	/*************************************************
	****** ACTIVAR - DESACTIVAR - ADMINISTRADOR ******
	**************************************************/

	public $idAdmin;
	public $estadoAdmin;

	public function ajaxActivarEmpleados(){

		$tabla = "administradores";

		$item1 = "id";
		$valor1 = $this->idAdmin;

		$item2 = "estado";
		$valor2 = $this->estadoAdmin;

		$respuesta = ModeloEmpleados::mdlHabilitarEmpleado($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

	}

	/***********************************************
	********* VISUALIZAR ELIMINIACIÓN DATA *********
	************************************************/
	// public $idAdministradorElim;

	// public function ajaxMostrarAdministradoresElim(){

	// 	$item = "id";
	// 	$valor = $this->idAdministradorElim;

	// 	$respuesta = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

	// 	echo json_encode($respuesta);

	// }

	/***********************************************
	*********** ELIMINAR EL ADMINISTRADOR **********
	************************************************/

	// public $idEliminar;

	// public function ajaxEliminarAdministrador(){

	// 	$respuesta = ControladorAdministradores::ctrEliminarAdministrador($this->idEliminar);

	// 	echo $respuesta;

	// }

}

/***************************************************
***** EDICIÓN DEL EMPLEADO - EJECUCIÓN DE AJAX *****
****************************************************/
if(isset($_GET["idAdministrador"])){

	$editarEmpleado = new AjaxEmpleados();
	$editarEmpleado -> idAdministrador = $_GET["idAdministrador"];
	$editarEmpleado -> ajaxMostrarEmpleados();

}

/********************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
*********************************************************/	

if(isset($_GET["estadoAdmin"])){

	$activarEmpleado = new AjaxEmpleados();
	$activarEmpleado -> idAdmin = $_GET["idAdmin"];
	$activarEmpleado -> estadoAdmin = $_GET["estadoAdmin"];
	$activarEmpleado -> ajaxActivarEmpleados();

}

/***********************************************
********* VISUALIZAR ELIMINIACIÓN DATA *********
************************************************/
// if(isset($_POST["idAdministradorElim"])){

// 	$elimPrev = new AjaxEmpleados();
// 	$elimPrev -> idAdministradorElim = $_POST["idAdministradorElim"];
// 	$elimPrev -> ajaxMostrarAdministradoresElim();

// }

/***********************************************
************ ELIMINAR ADMINISTRADOR ************
************************************************/

// if(isset($_POST["idEliminar"])){

// 	$eliminar = new AjaxEmpleados();
// 	$eliminar -> idEliminar = $_POST["idEliminar"];
// 	$eliminar -> ajaxEliminarAdministrador();

// }

?>