<?php

require_once "../controllers/contratosEmpleados.controller.php";
require_once "../models/contratosEmpleados.model.php";

class AjaxContratosEmpleados{

    /*********************************************************
	***** EDICIÓN DE CONTRATO ADMINISTRADOR - TRAER DATA *****
	**********************************************************/	

	public $idContrato;

	public function ajaxMostrarContratoEmpleados(){

		$item = "id";
		$valor = $this->idContrato;

		$respuesta = ControladorContratoEmpleados::ctrMostrarContratoEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

    /******************************************************
	***** TRAER CONTRATO DESDE EMPLEADOS - TRAER DATA *****
	*******************************************************/	

	public $idContratoEmpleado;

	public function ajaxMostrarContratoDesdeEmpleados(){

		$item = "id_admin";
		$valor = $this->idContratoEmpleado;

		$respuesta = ControladorContratoEmpleados::ctrMostrarContratoEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

	/********************************************
	****** ACTIVAR - DESACTIVAR - CONTRATO ******
	*********************************************/

	public $idContratoEst;
	public $estadoAdmin;

	public function ajaxActivarContratos(){

		$tabla = "contratos";

		$item1 = "id";
		$valor1 = $this->idContratoEst;

		$item2 = "estado";
		$valor2 = $this->estadoAdmin;

		$respuesta = ModeloContratoEmpleados::mdlHabilitarContrato($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta); /**Como estamos usando AsyncAwait, todo debe devolver como JSON para las Promises */

	}

} /**Clase */

/**************************************************************************
***** EDICIÓN DE CONTRATO ADMINISTRADOR/EMPLEADOS - EJECUCIÓN DE AJAX *****
***************************************************************************/
if(isset($_GET["idContrato"])){

	$editar = new AjaxContratosEmpleados();
	$editar -> idContrato = $_GET["idContrato"];
	$editar -> ajaxMostrarContratoEmpleados();

}

/**************************************************************************
***** EDICIÓN DE CONTRATO ADMINISTRADOR/EMPLEADOS - EJECUCIÓN DE AJAX *****
***************************************************************************/
if(isset($_GET["idContratoEmpleado"])){

	$verContrato = new AjaxContratosEmpleados();
	$verContrato -> idContratoEmpleado = $_GET["idContratoEmpleado"];
	$verContrato -> ajaxMostrarContratoDesdeEmpleados();

}

/***************************************************
***** ACTIVAR O DESACTIVAR - EJECUCIÓN DE AJAX *****
****************************************************/	

if(isset($_GET["idContratoEst"])){

	$activarContratos = new AjaxContratosEmpleados();
	$activarContratos -> idContratoEst = $_GET["idContratoEst"];
	$activarContratos -> estadoAdmin = $_GET["estadoAdmin"];
	$activarContratos -> ajaxActivarContratos();

}


?>