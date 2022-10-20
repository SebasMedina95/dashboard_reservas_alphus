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

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

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

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/********************************************************
	*********** ELIMINAR EL EMPLEADO/ADMINISTRADOR **********
	*********************************************************/

	public $idEliminar;

	public function ajaxEliminarEmpleado(){

		$respuesta = ControladorEmpleados::ctrEliminarAdministrador($this->idEliminar);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

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

/********************************************************
************ ELIMINAR EMPLEADO/ADMINISTRADOR ************
*********************************************************/

if(isset($_GET["idEliminar"])){

	$eliminar = new AjaxEmpleados();
	$eliminar -> idEliminar = $_GET["idEliminar"];
	$eliminar -> ajaxEliminarEmpleado();

}

?>