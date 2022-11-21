<?php

require_once "../controllers/planes.controller.php";
require_once "../models/planes.model.php";

class AjaxPlanes{

    /******************************************
	****** EDICIÓN DEL PLAN - TRAER DATA ******
	*******************************************/	

	public $idPlan;

	public function ajaxMostrarPlanes(){

		$item = "id";
		$valor = $this->idPlan;

		$respuesta = ControladorPlanes::ctrMostrarPlanes($item, $valor);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

    /******************************************
	****** ACTIVAR - DESACTIVAR - PLANES ******
	*******************************************/

	public $idPlanGest;
	public $estadoPlan;

	public function ajaxActivarPlanes(){

		$tabla = "planes";

		$item1 = "id";
		$valor1 = $this->idPlanGest;

		$item2 = "estado";
		$valor2 = $this->estadoPlan;

		$respuesta = ModeloPlanes::mdlHabilitarPlanes($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

	/*************************************
	*********** ELIMINAR PLAN **********
	**************************************/

	public $idPlanElim;
    public $rutaImg;

	public function ajaxEliminarPlan(){

		$respuesta = ControladorPlanes::ctrEliminarPlan($this->idPlanElim , $this->rutaImg);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

}

/*************************************************
****** EDICIÓN DEL PLAN - EJECUCIÓN DE AJAX ******
**************************************************/
if(isset($_GET["idPlan"])){

	$editarPlanes = new AjaxPlanes();
	$editarPlanes -> idPlan = $_GET["idPlan"];
	$editarPlanes -> ajaxMostrarPlanes();

}

/***************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
****************************************************/	

if(isset($_GET["estadoPlan"])){

	$activarPlanes = new AjaxPlanes();
	$activarPlanes -> idPlanGest = $_GET["idPlanGest"];
	$activarPlanes -> estadoPlan = $_GET["estadoPlan"];
	$activarPlanes -> ajaxActivarPlanes();

}

/******************************************
***** ELIMINACIÓN - EJECUCIÓN DE AJAX *****
*******************************************/	

if(isset($_GET["rutaImg"])){

	$eliminarPlanes = new AjaxPlanes();
	$eliminarPlanes -> idPlanElim = $_GET["idPlanElim"];
	$eliminarPlanes -> rutaImg = $_GET["rutaImg"];
	$eliminarPlanes -> ajaxEliminarPlan();

}

?>