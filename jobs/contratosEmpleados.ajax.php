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

    /*********************************************************
	***** EDICIÓN DE CONTRATO ADMINISTRADOR - TRAER DATA *****
	**********************************************************/	

	public $idContratoEmpleado;

	public function ajaxMostrarContratoDesdeEmpleados(){

		$item = "id_admin";
		$valor = $this->idContratoEmpleado;

		$respuesta = ControladorContratoEmpleados::ctrMostrarContratoEmpleados($item, $valor);

		echo json_encode($respuesta);

	}

} /**Clase */

/****************************************************************
***** EDICIÓN DE CONTRATO ADMINISTRADOR/EMPLEADOS - EJECUCIÓN DE AJAX *****
*****************************************************************/
if(isset($_GET["idContrato"])){

	$editar = new AjaxContratosEmpleados();
	$editar -> idContrato = $_GET["idContrato"];
	$editar -> ajaxMostrarContratoEmpleados();

}

/****************************************************************
***** EDICIÓN DE CONTRATO ADMINISTRADOR/EMPLEADOS - EJECUCIÓN DE AJAX *****
*****************************************************************/
if(isset($_GET["idContratoEmpleado"])){

	$verContrato = new AjaxContratosEmpleados();
	$verContrato -> idContratoEmpleado = $_GET["idContratoEmpleado"];
	$verContrato -> ajaxMostrarContratoDesdeEmpleados();

}


?>