<?php

require_once "../controllers/conceptos.controller.php";
require_once "../models/conceptos.model.php";

class AjaxConceptosContables{

    /*****************************************************
	***** EDICIÓN DEL CONCEPTO CONTABLE - TRAER DATA *****
	******************************************************/	

	public $idConceptoContable;

	public function ajaxMostrarConceptos(){

		$item = "id";
		$valor = $this->idConceptoContable;

		$respuesta = ControladorConceptos::ctrMostrarConceptos($item, $valor);

		echo json_encode($respuesta);

	}

	/***************************************************
	****** ACTIVAR - DESACTIVAR - CONCEPTO NÓMINA ******
	****************************************************/

	public $idConceptoContableGest;
	public $estadoConcepto;

	public function ajaxActivarConcepto(){

		$tabla = "conceptos";

		$item1 = "id";
		$valor1 = $this->idConceptoContableGest;

		$item2 = "estado";
		$valor2 = $this->estadoConcepto;

		$respuesta = ModeloConceptos::mdlHabilitarConcepto($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

}

/************************************************************
***** EDICIÓN DEL CONCEPTO CONTABLE - EJECUCIÓN DE AJAX *****
*************************************************************/
if(isset($_GET["idConceptoContable"])){

	$editar = new AjaxConceptosContables();
	$editar -> idConceptoContable = $_GET["idConceptoContable"];
	$editar -> ajaxMostrarConceptos();

}

/********************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
*********************************************************/	

if(isset($_GET["estadoConcepto"])){

	$activarConcepto = new AjaxConceptosContables();
	$activarConcepto -> idConceptoContableGest = $_GET["idConceptoContableGest"];
	$activarConcepto -> estadoConcepto = $_GET["estadoConcepto"];
	$activarConcepto -> ajaxActivarConcepto();

}


?>