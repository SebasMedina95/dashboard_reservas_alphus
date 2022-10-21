<?php

class ControladorContratoEmpleados{

    /*****************************************************
	************* MOSTRAR CONTRATOS EMPLEADO *************
	******************************************************/

	static public function ctrMostrarContratoEmpleados($item, $valor){

		$tabla = "contratos";

		$respuesta = ModeloContratoEmpleados::mdlMostrarContratoEmpleados($tabla, $item, $valor);

		return $respuesta;

	}

}

?>