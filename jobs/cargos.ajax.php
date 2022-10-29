<?php

require_once "../controllers/cargos.controller.php";
require_once "../models/cargos.model.php";

class AjaxCargos{

    /**************************************************
	***** EDICIÓN DEL CARGO EMPLEADO - TRAER DATA *****
	***************************************************/	

	public $idCargo;

	public function ajaxMostrarCargos(){

		$item = "id";
		$valor = $this->idCargo;

		$respuesta = ControladorCargos::ctrMostrarCargos($item, $valor);

		echo json_encode($respuesta);

	}

    /******************************************
	****** ACTIVAR - DESACTIVAR - CARGOS ******
	*******************************************/

	public $idCargoEmp;
	public $estadoCargo;

	public function ajaxActivarCargo(){

		$tabla = "cargos_empleado";

		$item1 = "id";
		$valor1 = $this->idCargoEmp;

		$item2 = "estado";
		$valor2 = $this->estadoCargo;

		$respuesta = ModeloCargos::mdlHabilitarCargo($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

	}

    /***********************************************
	********* VISUALIZAR ELIMINIACIÓN DATA *********
	************************************************/
	public $idCargoElim;

	public function ajaxMostrarCargoElim(){

		$item = "id";
		$valor = $this->idCargoElim;

		$respuesta = ControladorCargos::ctrMostrarCargos($item, $valor);

		echo json_encode($respuesta);

	}

	/************************************************
	*********** ELIMINAR EL CARGO EMPLEADO **********
	*************************************************/

	public $idEliminarCargo;

	public function ajaxEliminarCargo(){

		$respuesta = ControladorCargos::ctrEliminarCargo($this->idEliminarCargo);

		echo json_encode($respuesta);

	}

} /**Clase */

/*********************************************************
***** EDICIÓN DEL CARGO EMPLEADO - EJECUCIÓN DE AJAX *****
**********************************************************/
if(isset($_GET["idCargo"])){

	$editar = new AjaxCargos();
	$editar -> idCargo = $_GET["idCargo"];
	$editar -> ajaxMostrarCargos();

}

/********************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
*********************************************************/	

if(isset($_GET["idCargoEmp"])){

	$activarCargo = new AjaxCargos();
	$activarCargo -> idCargoEmp = $_GET["idCargoEmp"];
	$activarCargo -> estadoCargo = $_GET["estadoCargo"];
	$activarCargo -> ajaxActivarCargo();

}

/***********************************************
********* VISUALIZAR ELIMINIACIÓN DATA *********
************************************************/
if(isset($_GET["idCargoElim"])){

	$elimPrev = new AjaxCargos();
	$elimPrev -> idCargoElim = $_GET["idCargoElim"];
	$elimPrev -> ajaxMostrarCargoElim();

}

/***********************************************
************ ELIMINAR ADMINISTRADOR ************
************************************************/

if(isset($_GET["idEliminarCargo"])){

	$eliminar = new AjaxCargos();
	$eliminar -> idEliminarCargo = $_GET["idEliminarCargo"];
	$eliminar -> ajaxEliminarCargo();

}


?>