<?php


class ControladorContratoAdmins{

    /*****************************************************
	************* MOSTRAR CONTRATOS EMPLEADO *************
	******************************************************/

	static public function ctrMostrarContratoAdmins($item, $valor){

		$tabla = "contratos";

		$respuesta = ModeloContratoEmpleados::mdlMostrarContratoEmpleados($tabla, $item, $valor);

		return $respuesta;

	}

}