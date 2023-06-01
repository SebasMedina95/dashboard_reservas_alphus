<?php

class ControladorReservas{

    /*=============================================
	MOSTRAR USUARIOS-RESERVAS CON INNER JOIN
	=============================================*/

	static public function ctrMostrarReservas($item, $valor){

		$tabla1 = "usuarios";
		$tabla2 = "reservas";

		$respuesta = ModeloReservas::mdlMostrarReservas($tabla1, $tabla2, $item, $valor);

		return $respuesta;

	}

}

